<?php

namespace App\Http\Controllers\Admin;

//use App\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // returns the dashboard
    public function index()
    {
        return view("admin.dashboard");
    }
    
}