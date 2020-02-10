<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest.admin', ['except' => 'doLogout']);
    }

    /**
     * Display a login page
     * @return Response
     */
    public function getIndex() {
        return view('admin.login');
    }

    /**
     * Check login with username and password.
     * @return redirect to dashboard or error_message if login fails
     */
    public function doLogin(Request $request) {
        
        $input = $request->all();
        $credentials = array(
            'username' => $input['username'],
            'password' => $input['password']
        );
        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect(ADMIN_SLUG.'/dashboard');
        }
        // authentication failure! lets go back to the login page
        return redirect(ADMIN_SLUG)->with('error_message', trans('admin/login.invalid_login_message'))->withInput();
    }

    public function doLogout() {
        auth()->guard('admin')->logout();
        session()->flush();
        session()->regenerate();
        return redirect(ADMIN_SLUG)->with('success_message', trans('admin/login.logout_message'));
    }

}
