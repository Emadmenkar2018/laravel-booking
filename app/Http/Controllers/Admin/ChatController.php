<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Datatable\SSP;
use App\User;
use App\Chat;


class ChatController extends Controller {

    /**
     * User Model
     * @var User
     */
    protected $user;
    protected $pageLimit;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
        $this->pageLimit = config('settings.pageLimit');
    }

    /**
     * Display a listing of user
     *
     * @return Response
     */
    public function index($id = null) {
        
        $user = $chatMessages = null;
        if($id){
            $user = User::findOrFail($id);
            Chat::where('user_id', $id)->where('message_type','in-msg')->update(['message_read' => '1']);
            $chatMessages = Chat::where('user_id',$id)->orderBy('created_at','ASC')->get();
        }
        
        // Grab all online user
        $users = User::active()->online()->get();

        // Show the page
        return view('admin/onlineList', compact('users','user','chatMessages'));
    }
    
    /**
     * Store a chat in database
     *
     * @return Response
     */
    public function store(Request $request) {
        $data = $request->all();
        
        $chat = new Chat;
        $chat->user_id = $data['id'];
        $chat->message_content = $data['message'];
        $chat->message_type = 'out-msg';
        $chat->save();
        return 'true';
    }
    
    /**
     * Display a chat history of user
     *
     * @return Response
     */
    public function history($id = null) {
        
        $user = $chatMessages = null;
        if($id){
            $user = User::findOrFail($id);
            Chat::where('user_id', $id)->where('message_type','in-msg')->update(['message_read' => '1']);
            $chatMessages = Chat::where('user_id',$id)->orderBy('created_at','ASC')->get();
        }else{
            return response()->view('errors.404', array(), 404);
        }
        
        // Show the page
        return view('admin/chatHistory', compact('user','chatMessages'));
    }
    
    /**
     * give message count of all online user which was not read by admin for notification
     *
     * @return int $msgCount
     */
    public function getNotificationCount() {
        $msgCount = Chat::where('message_read','0')->where('message_type','in-msg')->count();
        return $msgCount;
    }
}
