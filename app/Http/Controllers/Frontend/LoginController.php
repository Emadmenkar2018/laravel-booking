<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class LoginController extends Controller {
    
    public function __construct() {
        $this->middleware('guest.user', ['except' => 'doLogout']);
    }

    /**
     * Display a login page
     * @return Response
     */
    public function getLogin() {
        return view('frontend.login');
    }

    /**
     * Check login with email and password.
     * @return redirect to member area or error_message if login fails
     */
    public function doLogin(Request $request) {
        $input = $request->all();
        $credentials = array(
            'email' => $input['email'],
            'password' => $input['password']
        );
        
        if(auth()->guard('user')->attempt($credentials)){
            $credentials = array(
                'email' => $input['email'],
                'password' => $input['password'],
                'status' => '1'
            );
            if(auth()->guard('user')->attempt($credentials)){
                User::where('id', auth()->guard('user')->user()->id)->update(['online'=>'1']);
                $array = array();
                $array['success'] = true;
                $array['warning'] = false;
                $array['message'] = trans('user/login.login_success_message');
                return response()->json($array);
                //return redirect('/');
            }else{
                auth()->guard('user')->logout();
                session()->flush();
                session()->regenerate();
                // authentication failure! lets go back to the login page
                $array = array();
                $array['success'] = false;
                $array['warning'] = true;
                $array['message'] = trans('user/login.login_block_message');
                return response()->json($array);
                //return redirect()->back()->with('error_message', 'Your account has been block by admin!');
            }
        }else{
            // authentication failure! lets go back to the login page
            $array = array();
            $array['success'] = false;
            $array['warning'] = false;
            $array['message'] = trans('user/login.login_invalid_message');
            return response()->json($array);
            //return redirect()->back()->with('error_message', 'Invalid email or password!');
        }
    }

    public function doLogout() {
        User::where('id', auth()->guard('user')->user()->id)->update(['online'=>'0']);
        auth()->guard('user')->logout();
        session()->flush();
        session()->regenerate();
        return redirect('/');
    }

}
