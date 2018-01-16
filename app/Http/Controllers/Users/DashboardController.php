<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function compOrders()
    {
        return view("users.dashboard.comporders"); 
    }

    public function pendOrders()
    {
        return view("users.dashboard.pending"); 
    }

    public function info()
    {
        return view("users.dashboard.userupdate"); 
    }

    public function pass()
    {
        return view("users.dashboard.passwordupdate"); 
    }

}
