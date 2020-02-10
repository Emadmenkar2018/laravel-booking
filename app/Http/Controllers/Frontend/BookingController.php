<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;
use App\Schedule;
use App\Booking;
use App\BookingDetail;
use App\User;
use Validator;
use DateTime;
use DatePeriod;
use DateInterval;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\BookingMail;
use App\Mail\Admin\BookingStatusMail;

class BookingController extends Controller {
    
    protected $serviceList;
    protected $auth;
    
    public function __construct() {
        $this->auth = auth()->guard('user');
        $this->pageLimit = config('settings.pageLimitFront');
        $this->serviceList = ['' => 'Select Service'] + Service::pluck('title', 'id')->all();
    }

    public function index(Request $request) {
        
        //reset search
        if ($request->isMethod('post')) {
            $request->session()->forget('SEARCH');
        }
        //end code
        if ($request->has('reset')) {
            $request->session()->forget('SEARCH');
            return redirect('booking');
        }
        $serviceList = $this->serviceList;
        
        $user_id = $this->auth->user()->id;

        if ($request->get('search_by') != ''){
            session(['SEARCH.SEARCH_BY' => trim($request->get('search_by'))]);
        }
        
        if ($request->get('search_txt') != '') {
            session(['SEARCH.SEARCH_TXT' => trim($request->get('search_txt'))]);
        }
        
        if ($request->get('service_id') != '') {
            session(['SEARCH.SERVICE_ID' => trim($request->get('service_id'))]);
        }
        
        if ($request->get('search_date') != '') {
            session(['SEARCH.SEARCH_DATE' => trim($request->get('search_date'))]);
        }
        
        $query = Booking::select('*')->where('user_id',$user_id);
        if ($request->session()->get('SEARCH.SEARCH_BY') != '') {
            
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'service') {
                $query->where('service_id', $request->session()->get('SEARCH.SERVICE_ID'));
            }
            
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'name') {
                $query->where('full_name', 'LIKE', '%' . $request->session()->get('SEARCH.SEARCH_TXT') . '%');
            }
            
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'email') {
                $query->where('email', 'LIKE', '%' . $request->session()->get('SEARCH.SEARCH_TXT') . '%');
            }
            
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'phone') {
                $query->where('phone', 'LIKE', '%' . $request->session()->get('SEARCH.SEARCH_TXT') . '%');
            }
            
            if ($request->session()->get('SEARCH.SEARCH_BY') == 'booking_date') {
                $date = date('Y-m-d',strtotime($request->session()->get('SEARCH.SEARCH_DATE')));
                
                $queryDate = BookingDetail::select('booking_id');
                $queryDate->where(DB::raw("date(start_time)"),'=',$date);
                $bookingIdArray = $queryDate->orderBy('start_time', 'DESC')->get()->toArray();
                $query->whereIn('id', $bookingIdArray);
            }
            
            $bookings = $query->orderBy('created_at','desc')->paginate($this->pageLimit);
            
//            $bookings = $query->orderBy('created_at', 'DESC')->toSql();
//            echo $bookings;
//            $bindings = $query->getBindings();
//            dd($bindings);
            
            return view('frontend.bookingList',  compact('bookings','serviceList'));
        } else {
            $bookings = $query->orderBy('created_at','desc')->paginate($this->pageLimit);
        }

        return view('frontend.bookingList', compact('bookings','serviceList'));
    }

    /**
     * Store a newly created booking in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $rules = array(
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        );
        $data = $request->all();
        
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $service = Service::find($data['service_id']);
        $amount = $service->price * count($request->get('spots'));
        
        //check available credit before booking
        $user_id = $this->auth->user()->id;
        $credit = $this->auth->user()->credit;
        if($credit<$amount){
            return redirect()->back()->with('error_message',trans('user/booking.booking_error_message'))->withInput();
        }
        //end code
        
        $data['user_id'] = $this->auth->user()->id;
        $data['amount'] = $amount;
        $data['status'] = 'pending';
        
        $booking = Booking::create($data);
        $lastInsertId = $booking->id;
        //$lastInsertId = 2;
        
        //update user credit
        $newCredit = $credit - $amount;
        User::where('id', $user_id)->update(array('credit' => $newCredit));
        //end code
        
        //store booking spots
        if ($request->get('spots')) {
            $resevationDate = date('Y-m-d',$request->get('reservation_date'));
            //echo $resevationDate;
            for($i=0;$i< count($request->get('spots'));$i++){
                    $timeArray = explode('-', $data['spots'][$i]);
                    $start_time =  $resevationDate.' '.$timeArray[0];
                    $end_time =  $resevationDate.' '.$timeArray[1];
                    //echo $start_time."==".$end_time."<br>";
                    $c = new BookingDetail;
                    $c->booking_id = $lastInsertId;
                    $c->start_time = $start_time;
                    $c->end_time = $end_time;
                    $c->save();
            }
        }
        //end code
        
        //send booking mail to user and bcc to admin
        Mail::to($this->auth->user()->email)
                ->bcc(config('settings.admin.email'))
                ->send(new BookingMail($booking));
        
        return redirect('booking')->with('success_message', trans('user/booking.booking_success_message'));
    }
    
    /**
     *  export transactions-list.csv
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=bookings-list.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Service', 'Name', 'Email', 'Mobile', 'Credits', 'Date','Booking Status'));

        $user_id = $this->auth->user()->id;
        $bookings = Booking::where('user_id',$user_id)->orderBy('created_at','DESC')->get();
        foreach ($bookings as $data) {
            $date = '';
            $spots = $data->bookingDetail;
            foreach ($spots as $key => $spot){
                $date .= ' ('.($key+1).') '.date('d-m-Y h:i A', strtotime($spot->start_time)) .'to'. date('d-m-Y h:i A', strtotime($spot->end_time));
            }
            fputcsv($output, array(
                $data->service->title,
                $data->full_name,
                $data->email,
                $data->phone,
                $data->amount,
                $date,
                $data->status
                    )
            );
        }
        fclose($output);
        exit;
    }
    
    /**
     * check booking status and refund credit to user if their booking is still pending and date was passed.
     * 
     * @author Dhaval
     * @param  Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function cronBookingStatus(){
        //get pending bookings whose date has been passed
        $bookings = Booking::select('bookings.*','bd.start_time','bd.end_time')
                    ->join('bookings_details as bd','bookings.id','=','bd.booking_id')
                    ->where('status','pending')
                    ->where(DB::raw("date(start_time)"),'<=',date("Y-m-d"))->groupBy('bookings.id')->get();
        foreach ($bookings as $key => $booking){
            $booking->status = 'cancel';
            $booking->save();
            $user = User::find($booking->user_id);
            $user->credit = $user->credit + $booking->amount;
            $user->save();
            
            $userEmail = $user>email;
            //send booking mail to user and bcc to admin
            Mail::to($userEmail)->send(new BookingStatusMail($booking));
        }
    }
}