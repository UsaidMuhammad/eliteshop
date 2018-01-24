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
        $data['user'] = App\Users::find(\Session::get('UserID'));
        return view("users.dashboard.userupdate",$data); 
    }
    public function infoupdate()
    {       
        $id = \Session::get('UserID');

        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "Name" => "required|max:50",
                "Email" => "required|email|max:50",
                "Address" => "required",
                "Cell" => "required|max:20",
            ],
            "validName" => [
                "Name" => "Name",
                "Email" => "Email",
                "Address" => "Address",
                "Cell" => "Cell"
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {
            $user = App\Users::find($id);

            $user->Name = \Request::get("Name");
            $user->Email = \Request::get("Email");
            $user->Address = \Request::get("Address");
            $user->Cell = \Request::get("Cell");
            $user->save();

            return redirect()->back();
        }
    }

    public function pass()
    {
        return view("users.dashboard.passwordupdate"); 
    }

    public function passupdate()
    {       
        $id = \Session::get('UserID');
        $data = \Request::all();
        $user = App\Users::find($id);
    
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "password" => "required|min:6",
                "new_password" => "required|min:6",
                "retype_password" => "required|min:6",
            ],
            "validName" => [
                "password" => "Password",
                "new_password" => "New Password",
                "retype_password" => "Retype New Password",                
            ]
        ];

        $v = \Validator::make($data, $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else if (!\Hash::check($data['password'],$user->Password))
        {  
            return redirect()->back()->with("status", "Your current password is incorrect");
        }
        else if ($data['new_password'] != $data['retype_password'])
        {  
            return redirect()->back()->with("status", "Your new passwords do not match");
        }
        else
        {
            $user->Password = \Hash::make($data["password"]);
            $user->save();

            return redirect()->back()->with("status", "Your Password has been updated");
        }
    }

}
