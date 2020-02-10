<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;

use App\Enquiry as Enquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\EnquiryMail;

class HomeController extends Controller {
    
    public function __construct() {
        $this->middleware('guest.user');
    }

    public function index() {
        if(config('app.locale')=='en'){
            return view('frontend.index');
        }elseif (config('app.locale')=='es') {
            return view('frontend.index_es');
        }else{
            return view('frontend.index');
        }
    }
    
    public function submitEnquiry(Request $request) {
        $data = $request->all();
        
        $rules = array(
            'fullname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        );
        
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->all());
        }
        
        $enquiry = new Enquiry;
        $enquiry->fullname = $data['fullname'];
        $enquiry->email = $data['email'];
        $enquiry->subject = $data['subject'];
        $enquiry->message = $data['message'];
        $enquiry->save();

        //send enquiry mail to admin
        Mail::to(config('settings.admin.email'))->send(new EnquiryMail($enquiry));

        $array = array();
        $array['success'] = true;
        if(config('app.locale')=='en'){
            $array['message'] = 'Your message has been submitted successfully!';
        }elseif (config('app.locale')=='es') {
            $array['message'] = 'Su mensaje ha sido enviado exitosamente!';
        }else{
            $array['message'] = 'Your message has been submitted successfully!';
        }
        return response()->json($array);
    }
}
