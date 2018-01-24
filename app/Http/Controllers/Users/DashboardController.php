<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function compOrders()
    {
        $data['item'] = App\Order::where([
            ['UserID','=',\Session::get('UserID')],
            ['Status','=','5'],
        ])->get();
       
        $data['products'] = []; // will hold products data found via $data['array']
        $data['array'] = []; // will hold arrays serialized data from from the order table

        for ($i=0; $i < count($data['item']); $i++) { 

            //create a new array each iteration
            $data['array'][] = unserialize($data['item'][$i]->ProductsArray);
            
            //for the values inside $i'th array 
            foreach ($data['array'][$i] as $key ) {
            
                // save the product data according the same sub array as $data['array']
                if($key['_type']== 'men')
                {
                    $data['products'][$i][] = App\MenProducts::where('ProductID',$key['id'])->first();
                }
                else if($key['_type']=='women')
                {
                    $data['products'][$i][] = App\WomenProducts::where('ProductID',$key['id'])->first();
                }
            }
        }

        return view("users.dashboard.comporders",$data); 
    }

    public function pendOrders()
    {
        $data['item'] = App\Order::where([
            ['UserID','=',\Session::get('UserID')],
            ['Status','<','5'],
        ])->get();
       
        $data['products'] = []; // will hold products data found via $data['array']
        $data['array'] = []; // will hold arrays serialized data from from the order table

        for ($i=0; $i < count($data['item']); $i++) { 

            //create a new array each iteration
            $data['array'][] = unserialize($data['item'][$i]->ProductsArray);
            
            //for the values inside $i'th array 
            foreach ($data['array'][$i] as $key ) {
            
                // save the product data according the same sub array as $data['array']
                if($key['_type']== 'men')
                {
                    $data['products'][$i][] = App\MenProducts::where('ProductID',$key['id'])->first();
                }
                else if($key['_type']=='women')
                {
                    $data['products'][$i][] = App\WomenProducts::where('ProductID',$key['id'])->first();
                }
            }
        }

        
        return view("users.dashboard.pending", $data); 
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
