<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class MenController extends Controller
{
    //returns men index page with data
    public function index()
    {
        $data['men']= \Cache::remember('menGet', 24*60, function () {
            return App\Men::get();
        });
        $data['type'] = "Men Categories";
        return view("admin.men.menindex", $data);
    }

    //returns the add men index page
    public function add()
    {
        $data['type'] = "Men Categories";  
        return view("admin.men.menadd", $data);
    }

    //creates a new men category
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
            $user = new App\Men;

            $user->CategoryName = \Request::get("CategoryName");
            $user->Status = \Request::get("status");
            $user->save();

            \Cache::forget('menGet');
            return redirect("admin\men\category\list");
        }
    }

    //edits the category
    public function edit($id)
    {
        $data['men']= App\Men::where("CategoryID",$id)->first();
        if (empty($data['men'])) {
            return redirect('admin\men\category\list');
        }
        $data['type'] = "Men Categories";  
        return view("admin.men.menedit", $data);
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
            $user = App\Men::find($id);

            $user->CategoryName = \Request::get("CategoryName");
            $user->Status = \Request::get("status");
            $user->save();

            \Cache::forget('menGet');
            return redirect("admin\men\category\list");
        }
    }

    public function delete()
    {



        \DB::table('men')
                ->whereIn('CategoryID', \Request::get('IDs'))
                ->delete();

        \DB::table('men_products')
                ->whereIn('CategoryID', \Request::get('IDs'))
                ->delete();

        \Cache::forget('menGet');
        return redirect("admin\men\category\list");
    }
}
