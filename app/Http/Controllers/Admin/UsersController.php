<?php

namespace App\Http\Controllers\Admin;

//use App\User;
use App\Http\Controllers\Controller;
use App;

class UsersController extends Controller
{
    // returns main view with all users
    public function index()
    {   
        $data['users']= App\Users::get();
        $data['type'] = "Users";    
        return view("admin.users.usersindex",$data);
    }

    //edits users
    public function edit($id)
    {  
        $data['item']= App\Users::where('UserID',$id)->first();
        $data['type']= "Users";
        if (empty($data["item"])) { //checks to validate false urls
            return redirect("admin/users");
        } else {
            return view("admin.users.usersedit", $data);
        }
        
    }

    public function update($id)
    {       
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
                "name" => "Name",
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
            $user->Status = \Request::get("status");
            $user->DateModified = new \DateTime;
            $user->save();

            return redirect("admin\users");
        }
    }

    public function delete()
    {
        \DB::table('users')
                ->whereIn('UserID', \Request::get('IDs'))
                ->delete();
                
        return redirect("admin\users");
    }

    public function passGet($id)
    {
        $data["UserID"] = App\Users::where('UserID',$id)->first();  
        if (empty($data["UserID"])) {
            return redirect("admin/users");
        }
        return view("admin.users.userspass", $data);
    }

    public function passPost($id)
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "password" => "required|min:6",
            ],
            "validName" => [
                "password" => "Password"
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        $data = \Request::all();
        
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else if( $data["password"] != $data["confirm_password"])
        {
            return redirect()->back()->with("status", "Your passwords do not match");
        }
        else
        {
            $user = App\Users::find($id);

            $user->Password = \Hash::make($data["password"]);
            $user->DateModified = new \DateTime;
            $user->save();

            return redirect("admin/users");
        }
    }
}