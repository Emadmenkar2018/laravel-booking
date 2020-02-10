<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Chat;
use Validator;

class ChatController extends Controller {

    protected $auth;

    public function __construct() {
        $this->middleware('auth.user',['except' => ['logout']]);
        $this->auth = auth()->guard('user');
    }

    /**
     * Display a chatboard
     *
     * @return Response
     */
    public function index() {
        $user_id =  $this->auth->user()->id;
        
        Chat::where('user_id', $user_id)->where('message_type','out-msg')->update(['message_read' => '1']);
        
        $chatMessages = Chat::where('user_id',$user_id)->orderBy('created_at','ASC')->get();
        return view('frontend.chat',compact('chatMessages'));
    }

    /**
     * Store a chat in database
     *
     * @return Response
     */
    public function store(Request $request) {
        $data = $request->all();
        
        $chat = new Chat;
        $chat->user_id = $this->auth->user()->id;
        $chat->message_content = $data['message'];
        $chat->message_type = 'in-msg';
        $chat->save();
        return 'true';
    }
}

