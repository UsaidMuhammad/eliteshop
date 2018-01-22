<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkoutindex()
    {
        $data["cart"]=\Cart::instance('Shopping')->content();
        return view('web.checkout', $data);
    }
}
