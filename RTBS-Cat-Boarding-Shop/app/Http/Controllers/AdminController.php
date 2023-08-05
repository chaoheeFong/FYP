<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
        public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function userManagement()
    {
        return view('admin.userManagement');
    }

    public function bookingManagement()
    {
        return view('admin.bookingManagement');
    }

    public function feedbackManagement()
    {
        return view('admin.feedbackManagement');
    }

    public function catStatusNotification()
    {
        return view('admin.catStatusNotification');
    }
}
