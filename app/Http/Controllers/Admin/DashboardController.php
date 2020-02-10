<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class DashboardController extends Controller {
    
    public function __construct() {
        
    }

    /**
     * Admin dashboard
     *
     */
    public function index() {
        $users = \App\User::count();
        $onlineUsers = \App\User::active()->online()->count();
        $services = \App\Service::count();
        $bookings = \App\Booking::count();
        $transactions = \App\Transaction::count();
        $enquiries = \App\Enquiry::count();
        
        return view('admin/dashboard',  compact('users','onlineUsers','bookings','transactions','services','enquiries'));
    }
}