<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User as User;
use Auth;
use Hash;
use Validator;
use File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Frontend\RegisterMail;
use App\Mail\Frontend\RegisterMailAdmin;

class UserController extends Controller {

    protected $auth;

    public function __construct() {
        $this->middleware('auth.user', ['except' => ['create', 'store']]);
        //$this->middleware('guest.user', ['except' => ['index', 'update', 'destroy']]);
        $this->auth = auth()->guard('user');
    }

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index() {
        $profile = User::find($this->auth->user()->id);
        if ($profile) {
            return view('frontend.profile', compact('profile'));
        } else {
            return response()->view('errors.404', array(), 404);
        }
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create() {
        return view('frontend.register');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        );
        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            //return redirect()->back()->withErrors($validator)->withInput();
            //return $validator->messages()->toJson();
            //return response()->json($validator->messages()->toArray());
            return response()->json($validator->errors()->all());
        }

        $user = User::create($data);
        $user->password = \Hash::make($data['password']);
        $user->save();

        //return redirect()->route('frontend.login')->with('success_message', "Your account created successfully!");
        //send regstraion mail to user
        Mail::to($request->get('email'))->send(new RegisterMail($user));
        
        //send regstraion mail to admin
        Mail::to(config('settings.admin.email'))->send(new RegisterMailAdmin($user));

        $array = array();
        $array['success'] = true;
        $array['message'] = trans('user/register.account_create_message');
        return response()->json($array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {

        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        );

        $user = User::findOrFail($id);

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
         if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                
                $oldFile = USER_IMAGE_PATH.$user->image;
                
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
                
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = 'user_'.$id. '.'. $ext;
                $targetPath = USER_IMAGE_PATH;
                $file->move($targetPath, $filename);
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data['image'] = $filename;
        }else{
            $data['image'] = $user->image;
        }
        
        $user->update($data);
        return redirect()->back()->with('success_message', trans('user/profile.profile_update_message'));
    }

    /* Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);
        $oldFile = USER_IMAGE_PATH . $user->image;
        if (File::exists($oldFile)) {
            File::delete($oldFile);
        }
        User::destroy($id);
        return redirect('/')->with('success_message', 'Account deleted successfully!');
    }

    public function changePassword() {
        return view('frontend.changePassword');
    }

    public function updatePassword(Request $request) {
        $data = $request->all();
        $user = User::findOrFail($this->auth->user()->id);

        if (!Hash::check($data['old_password'], $user->password)) {
            return redirect()->back()->with('error_message', trans('user/changePassword.invalid_password_message'));
        } else {
            $rules = array(
                'password' => 'required|confirmed|min:6',
            );
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user->password = \Hash::make($data['password']);
            $user->save();
            return redirect()->back()->with('success_message', trans('user/changePassword.password_change_message'));
        }
    }
}
