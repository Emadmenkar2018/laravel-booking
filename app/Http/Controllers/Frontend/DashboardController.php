<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    
    protected $auth;
    
    public function __construct() {
        $this->auth = auth()->guard('user');
    }

    public function index() {
        $userId  = $this->auth->user()->id;
        $services = \App\Service::count();
        $bookings = \App\Booking::where('user_id',$userId)->count();
        $transactions = \App\Transaction::where('user_id',$userId)->count();
        return view('frontend.dashboard',compact('services','bookings', 'transactions'));
    }
}
