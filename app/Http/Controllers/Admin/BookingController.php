<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Datatable\SSP;
use App\Helpers\Common;
use App\Service;
use App\User;
use App\Booking;
use App\BookingDetail;
use Validator;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\BookingStatusMail;

class BookingController extends Controller {

    /**
     * Booking Model
     * @var Booking
     */
    protected $booking;
    protected $pageLimit;
    protected $serviceList;

    /**
     * Inject the models.
     * @param Booking $booking
     */
    public function __construct(Booking $booking) {
        $this->booking = $booking;
        $this->pageLimit = config('settings.pageLimit');
        $this->serviceList = ['' => trans('admin/booking.select_service')] + Service::pluck('title', 'id')->all();
        $this->userList = ['' => trans('admin/booking.select_user')] + User::select(DB::raw("CONCAT(firstname, ' ',lastname) as name"), 'id')->pluck('name', 'id')->toArray();
    }

    /**
     * Display a listing of bookings
     *
     * @return Response
     */
    public function index(Request $request) {
        //reset search
        if ($request->isMethod('post')) {
            $request->session()->forget('SEARCH');
        }
        if ($request->has('reset')) {
            $request->session()->forget('SEARCH');
            return redirect(ADMIN_SLUG.'/booking');
        }
        //end code
        
        if ($request->get('search_by') != '') {
            session(['SEARCH.SEARCH_BY' => trim($request->get('search_by'))]);
        }

        if ($request->get('search_txt') != '') {
            session(['SEARCH.SEARCH_TXT' => trim($request->get('search_txt'))]);
        }

        if ($request->get('service_id') != '') {
            session(['SEARCH.SERVICE_ID' => trim($request->get('service_id'))]);
        }

        if ($request->get('user_id') != '') {
            session(['SEARCH.USER_ID' => trim($request->get('user_id'))]);
        }

        if ($request->get('search_date') != '') {
            session(['SEARCH.SEARCH_DATE' => trim($request->get('search_date'))]);
        }
        
        $query = Booking::select('*');
        if ($request->session()->get('SEARCH.SEARCH_BY') != '') {
            $query = Booking::select('*');

            if ($request->session()->get('SEARCH.SEARCH_BY') == 'service') {
                $query->where('service_id', $request->session()->get('SEARCH.SERVICE_ID'));
            }

            if ($request->session()->get('SEARCH.SEARCH_BY') == 'user') {
                $query->where('user_id', $request->session()->get('SEARCH.USER_ID'));
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
                $date = date('Y-m-d', strtotime($request->session()->get('SEARCH.SEARCH_DATE')));

                $queryDate = BookingDetail::select('booking_id');
                $queryDate->where(DB::raw("date(start_time)"), '=', $date);
                $bookingIdArray = $queryDate->orderBy('start_time', 'DESC')->get()->toArray();
                $query->whereIn('id', $bookingIdArray);
            }

            $bookings = $query->orderBy('created_at', 'desc')->paginate($this->pageLimit);
        }else{
            $userId = request()->segment(3);
            if ($userId) {
                $bookings = $query->userBy($userId)->orderBy('created_at', 'DESC')->paginate($this->pageLimit);
            } else {
                $bookings = $query->orderBy('created_at', 'DESC')->paginate($this->pageLimit);
            }
        }
//        $bookings = $query->orderBy('created_at', 'DESC')->toSql();
//        echo $bookings;
//        $bindings = $query->getBindings();
//        dd($bindings);
        $serviceList = $this->serviceList;
        $userList = $this->userList;
        return view('admin/bookingList', compact('bookings', 'serviceList', 'userList'));
    }

    /**
     * Display the specified booking.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $booking = Booking::findOrFail($id);
        return view('admin/bookingDetails', compact('booking'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Booking::destroy($id);

        session()->flash('success_message', trans('admin/booking.booking_delete_message'));
        $array = array();
        $array['success'] = true;
        //$array['message'] = 'Booking deleted successfully!';
        echo json_encode($array);
    }

    public function changeBookingStatus(Request $request) {
        $data = $request->all();

        $booking = Booking::find($data['id']);
        $booking->status = $data['value'];
        $booking->save();

        if ($data['value'] == 'cancel') {
            $user = User::find($booking->user->id);
            $user->credit = $user->credit + $booking->amount;
            $user->save();
        }

        $userEmail = $booking->user->email;
        //send booking mail to user and bcc to admin
        Mail::to($userEmail)->send(new BookingStatusMail($booking));

        session()->flash('success_message', trans('admin/booking.booking_status_message'));
        $array = array();
        $array['success'] = true;
        $array['message'] = trans('admin/booking.booking_status_message');
        echo json_encode($array);
    }

    /**
     *  export transactions-list.csv
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=bookings-list.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Service', 'Name', 'Email', 'Mobile', 'Credits', 'Date', 'Booking Status'));

        $bookings = Booking::orderBy('created_at', 'DESC')->get();
        foreach ($bookings as $data) {
            $date = '';
            $spots = $data->bookingDetail;
            foreach ($spots as $key => $spot) {
                $date .= ' (' . ($key + 1) . ') ' . date('d-m-Y h:i A', strtotime($spot->start_time)) . 'to' . date('d-m-Y h:i A', strtotime($spot->end_time));
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

}
