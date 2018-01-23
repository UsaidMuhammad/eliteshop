<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class CheckoutController extends Controller
{
    public function checkoutindex()
    {
        $data["cart"]=\Cart::instance('Shopping')->content();
        if (\Session::has('IsUserLoggedIn')) {
            $data['user'] = [
                'Name'=> \Session::get("Name"),
                'Email'=> \Session::get("Email"),
                'Address'=> \Session::get("Address"),
                'Cell'=> \Session::get("Cell"),
            ];
        }
        return view('web.checkout', $data);
    }

    public function checkoutPost()
    {
        //init empty array to store product data
        $Products = [];
        $cart = \Cart::instance('Shopping')->content();
        foreach ( $cart as $key) {
            $Products[] = [
                'id' => $key->id,
                'qty' => $key->qty,
                '_type' => $key->options->_type,
            ];
        }

        $order = new App\Order;

        $order->UserID = \Session::get('UserID');
        $order->ProductsArray = serialize($Products);
        $order->Address = \Request::get('address');
        $order->Status = 1;

        $order->save();

        \Cart::destroy();

        return redirect('users/pending');
    }
}
