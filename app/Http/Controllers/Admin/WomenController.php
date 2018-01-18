<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class WomenController extends Controller
{
    //returns women index page with data
    public function index()
    {
        $data['women']= \Cache::remember('womenGetAdmin', 24*60, function () {
            return App\Women::get();
        });
        $data['type'] = "Women Categories";  
        return view("admin.women.womenindex", $data);
    }

    //returns the add women index page
    public function add()
    {
        $data['type'] = "Women Categories";  
        return view("admin.women.womenadd", $data);
    }

    //creates a new women category
    public function create()
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "CategoryName" => "required|max:50",
            ],
            "validName" => [
                "CategoryName" => "Category Name",
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {
            $user = new App\Women;

            $user->CategoryName = \Request::get("CategoryName");
            $user->Status = \Request::get("status");
            $user->save();

            \Cache::forget('womenGet');
            return redirect("admin\women\category\list");
        }
    }

    //edits the category
    public function edit($id)
    {
        $data['women']= App\Women::where("CategoryID",$id)->first();
        if (empty($data['women'])) {
            return redirect('admin\women\category\list');
        }
        $data['type'] = "Women Categories";  
        return view("admin.women.womenedit", $data);
    }

    public function update($id)
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "CategoryName" => "required|max:50",
            ],
            "validName" => [
                "CategoryName" => "Category Name",
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {
            $user = App\Women::find($id);

            $user->CategoryName = \Request::get("CategoryName");
            $user->Status = \Request::get("status");
            $user->save();

            \Cache::forget('womenGet');
            \Cache::forget('womenGetAdmin');
            return redirect("admin/women/category/list");
        }
    }

    public function delete()
    {
        \DB::table('women')
                ->whereIn('CategoryID', \Request::get('IDs'))
                ->delete();
                
        \Cache::forget('womenGet');
        return redirect("admin\women\category\list");
    }
}
