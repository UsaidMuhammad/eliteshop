<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SigninController extends Controller
{


    //return main view
    public function signInPage()
    {
        return view("admin.signin");
    }


    public function signInFunction()
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "username" => "required",
                "password" => "required"
            ],
            "validName" => [
                "username" => "Username",
                "password" => "Password"
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {
            //get the data with where clause
            $user = \App\Admin::where("Username", \Request::get("username"))
                            ->first();
            
            if (!$user)
            {   
                $data["data"] = "Incorrect username or password";
                return view("admin.signin", $data);
            }
            else if(
                \Hash::check(
                    \Request::get("password"),
                    $user->Password)
                )
            {
                \Session::put('FirstName', $user->FirstName);
                \Session::put('LastName', $user->LastName);
                \Session::put("IsAdminLoggedIn", true);
                return redirect("admin/dashboard");
            }
            else
            {
                $data["data"] = "Incorrect username or password";
                return view("admin.signin", $data);
            }
        }    
    }//end sign in function

    public function logout()
    {
        \Session::forget('FirstName');
        \Session::forget('LastName');
        \Session::forget("IsAdminLoggedIn");
        return redirect("admin/signin");
    }
}
