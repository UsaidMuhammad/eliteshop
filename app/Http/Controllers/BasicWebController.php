<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

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
    
    public function menItem($ProductID)
    {
        $product = App\MenProducts::where("ProductID",$ProductID)->get();
        if (count($product)==0) {
            return view("errors/404");
        }

        $data = [
            'title' => [
                0 => $product[0]->ProductName,
                1 => ""
            ],
            'product' => $product,
            '_type' => 'men'
        ];
        return view("web.single", $data);
    }

    public function womenItem($ProductID)
    {
        $product = App\WomenProducts::where("ProductID",$ProductID)->get();
        if (count($product)==0) {
            return view("errors/404");
        }

        $data = [
            'title' => [
                0 => $product[0]->ProductName,
                1 => ""
            ],
            'product' => $product,
            '_type' => 'women'
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
            return \DB::table('men')->where("Status",1)->get();
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

    public function mensGetJSON($category)
    {
        $men =  App\Men::where("CategoryName",$category)->where('Status',1)->get();
        if (count($men)==0) {
            return response()->json(array('msg'=> "Cannot process request"), 404);
        }
        $products = App\MenProducts::where('CategoryID',$men[0]->CategoryID)->where('Status',1)->get();
    
        return response()->json($products, 200);
    }
    


    public function womensCategory($category)
    {
        $women = \Cache::remember('womenGet', 24*60, function () {
            return \DB::table('women')->where("Status",1)->get();
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
    
        return view("web.womens", $data);
    }

    public function womensGetJSON($category)
    {
        $women =  App\Women::where("CategoryName",$category)->where('Status',1)->get();
        if (count($women)==0) {
            return response()->json(array('msg'=> "Cannot process request"), 404);
        }
        $products = App\WomenProducts::where('CategoryID',$women[0]->CategoryID)->where('Status',1)->get();
    
        return response()->json($products, 200);
    }
}
