<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class UsersController extends Controller
{
    public function index()
    {
        return view("users.register");
    }

    public function register()
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "name" => "required",
                "email" => "required|email|max:50|unique:users",
                "address" => "required",
                "cell" => "required|max:20",
                "password" => "required|min:6",
            ],
            "validName" => [
                "name" => "Username",
                "email" => "Email",
                "address" => "Address",
                "cell" => "Cell Number",
                "password" => "Password"
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        $data = \Request::all();
        
        if ($v->fails()) {
            return redirect("users/register")->withErrors($v->errors())->withInput();
        }
        else if( $data["password"] != $data["confirm_password"])
        {
            return redirect("/users/register")->with("status", "Your passwords do not match");
        }
        else 
        {
            $user = new App\Users;

            $user->Name = $data["name"];
            $user->Email = $data["email"];
            $user->Password = \Hash::make($data["password"]);
            $user->Address = $data["address"];
            $user->Cell = $data["cell"];
            $user->Status = 1;
            $user->DateAdded = new \DateTime;
            $user->DateModified = new \DateTime;
            $user->save();

            return redirect("/users/login");
        }
    }

    public function logInGet()
    {
        return view("users.login");
    }
    
    public function logInPost()
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "email" => "required|email|max:50",
                "password" => "required|min:6",
            ],
            "validName" => [
                "email" => "Email",
                "password" => "Password"
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        $data = \Request::all();
        
        if ($v->fails()) {
            return redirect("/users/login")->withErrors($v->errors())->withInput();
        }
        else 
        {
           
            $user = \App\Users::where("Email", \Request::get("email"))->first();
          
            if (!$user)
            {
                $data["data"] = "Incorrect Email or Password";
                return view("users.login", $data);
            } 
            else if (\Hash::check(\Request::get("password"), $user->Password))
            {
                \Session::put("UserID", $user->UserID);
                \Session::put("Name", $user->Name);
                \Session::put("Email", $user->Email);
                \Session::put("Address", $user->Address);
                \Session::put("Cell", $user->Cell);
                \Session::put("IsUserLoggedIn", true);
                return redirect("/");
            }
            else
            {
                $data["data"] = "Incorrect Email or Password";
                return view("users.login", $data);
            }
        }
    }

    public function logout()
    {
        \Session::forget("UserID");
        \Session::forget("Name");
        \Session::forget("Email");
        \Session::forget("Address");
        \Session::forget("Cell");
        \Session::forget("IsUserLoggedIn");
        \Cart::destroy();
        return redirect("/");
    }
}
