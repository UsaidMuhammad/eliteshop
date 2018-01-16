<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicWebController extends Controller
{
    public function home()
    {
        return view("web.index");
    }

    public function disabled()
    {
        return view("users.disabled");
    }
    
    public function about()
    {
        $data = [
            'title' => [
                0 => "About",
                1 => "Us"
            ]
        ];
    
        return view("web.about", $data);
    }

    public function contact()
    {
        $data = [
            'title' => [
                0 => "Contact",
                1 => "Us"
            ]
        ];
    
        return view("web.contact", $data);
    }
    
    public function item()
    {
        $data = [
            'title' => [
                0 => "",
                1 => ""
            ]
        ];
        return view("web.single", $data);
    }
    
    public function mens()
    {
        $data = [
            'title' => [
                0 => "men's",
                1 => "wear"
            ]
        ];
    
        return view("web.mens", $data);
    }

    public function mensCategory($category)
    {
        $men = \Cache::remember('menGet', 24*60, function () {
            return \DB::table('men')->get();
        });

        $dbHasValue = false;

        foreach ($men as $value) {
            if ($value->CategoryName == $category) {
                $dbHasValue = true;
                break;  
            }
        }

        if (!$dbHasValue) {
            return view('errors.404');
        }
        $data = [
            'title' => [
                0 => "men's",
                1 => $category,
            ]
        ];
    
        return view("web.mens", $data);
    }
    
    public function womens()
    {
        $data = [
            'title' => [
                0 => "women's",
                1 => "wear"
            ]
        ];
        return view("web.womens", $data);
    }

    public function womensCategory($category)
    {
        $women = \Cache::remember('womenGet', 24*60, function () {
            return \DB::table('women')->get();
        });

        $dbHasValue = false;

        foreach ($women as $value) {
            if ($value->CategoryName == $category) {
                $dbHasValue = true;
                break;  
            }
        }

        if (!$dbHasValue) {
            return view('errors.404');
        }
        $data = [
            'title' => [
                0 => "women's",
                1 => $category,
            ]
        ];
    
        return view("web.mens", $data);
    }
}
