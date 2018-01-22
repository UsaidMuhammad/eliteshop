<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class OrderController extends Controller
{
    // returns main view with all users
    public function indexpending()
    {   
        $data['orders']= App\Order::where('Status','<>','5')->get();
        $data['type'] = "Orders";    
        return view("admin.order.index",$data);
    }

    //edits users
    public function edit($id)
    {  
        $data['item']= App\Order::where('OrderID',$id)->first();
        $data['type']= "Orders";
        if (empty($data["item"])) { //checks to validate false urls
            return redirect("admin/orders/pending");
        } else {
            $data['products'] = [];
            $data['array'] = unserialize($data['item']->ProductsArray);
            
            foreach ($data['array'] as $key ) {
                if($key['_type']== 'men')
                {
                    $data['products'][] = App\MenProducts::where('ProductID',$key['id'])->first();
                }
                else if($key['_type']=='women')
                {
                    $data['products'][] = App\WomenProducts::where('ProductID',$key['id'])->first();
                }
            }
            $data['user']= App\Users::where('UserID',$data['item']->UserID)->first();
            return view("admin.order.edit", $data);
        }
        
    }

    public function update($id)
    {       
        $order = App\Order::find($id);

        $order->Status = \Request::get('Status');
        $order->save();

        return redirect()->back();
    }     
       

    public function delete()
    {
        \DB::table('order')
                ->whereIn('OrderID', \Request::get('IDs'))
                ->delete();
        return redirect()->back();
    }

    public function indexcompleted()
    {   
        $data['orders']= App\Order::where('Status','=','5')->get();
        $data['type'] = "Orders Completed";    
        return view("admin.order.index",$data);
    }
}
