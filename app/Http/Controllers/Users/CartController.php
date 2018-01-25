<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
class CartController extends Controller
{
    public function cartindex()
    {   
        $data["cart"]=\Cart::instance('Shopping')->content();
        return view('web.cart',$data);
    }

    public function cartadd()
    {   
        $id = \Request::get("_id");
        $_type = \Request::get("_type");
        $item = [];
        
        if ($_type == "men") {
            $item = App\MenProducts::where("ProductID",$id)->get();
            
            if(count($item)!=0)
            {
                \Cart::instance('Shopping')->add($item[0]->ProductID, $item[0]->ProductName, \Request::get("quantity"), $item[0]->ProductPrice,['Image'=>\Request::get('_image'),'_type'=>$_type]);
                return redirect()->back()->with("status", "Added to Cart");
            }
            else
            {
                return redirect('404');
            }
        } else if ($_type == "women") {
            $item = App\WomenProducts::where("ProductID",$id)->get();
            if(count($item)!=0)
            {
                \Cart::instance('Shopping')->add($item[0]->ProductID, $item[0]->ProductName, \Request::get("quantity"), $item[0]->ProductPrice,['Image'=>\Request::get('_image'),'_type'=>$_type]);
                return redirect()->back()->with("status", "Added to Cart");
            }
            else
            {
                return redirect('404');
            }
        }
    }

    public function cartupdate()
    {   
        if (\Request::has("Delete")) {
            \Cart::instance('Shopping')->remove(\Request::get('rowId'));
        }

        if (\Request::has("Update")) {
            \Cart::instance('Shopping')->update(\Request::get('rowId'), \Request::get('quantity'));
        }
        return redirect('cart');
        
    }
}
