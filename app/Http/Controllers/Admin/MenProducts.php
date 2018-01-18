<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class MenProducts extends Controller
{

    //returns mens products index page with data
    public function index($catID)
    {
        $data['products']= App\MenProducts::where('CategoryID',$catID)->get();        
        $men= App\Men::where('CategoryID',$catID)->get();
        $data['type'] = "Men ".$men[0]->CategoryName." products";
        $data["CategoryID"] = $catID;
        return view("admin.men.products.productindex", $data);
    }

    //returns the add men index page
    public function add($catID)
    {
        $men= App\Men::where('CategoryID',$catID)->get();
        $data['type'] = "Men ".$men[0]->CategoryName." products";
        $data["CategoryID"] = $catID;  
        return view("admin.men.products.productadd", $data);
    }

    //creates a new men category
    public function create($catID)
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "ProductName" => "required",
                "ProductImage" => "required|image",
                "ProductPrice" => "required|numeric",
            ],
            "validName" => [
                "ProductName" => "Product Name",
                "ProductImage" => "Product Image",
                "ProductPrice" => "Product Price",
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {
            $product = new App\MenProducts;

            $product->CategoryID = $catID;
            $product->ProductName = \Request::get("ProductName");
            $product->ProductDescription = \Request::get("ProductDescription");
            $product->ProductPrice = \Request::get("ProductPrice");
            $product->Status = \Request::get("status");
            $product->save();

            $prodID = \DB::getPdo()->lastInsertId();

            if (\Request::hasFile("ProductImage")) {
                $file = \Request::file('ProductImage');

                if (!empty($file)) {
                    $filename = $prodID . '_' . str_random(5) . "." . $file->getClientOriginalExtension();

                    $path = public_path('assets/uploads/products/'. $filename);
                    $path_thumb = public_path('assets/uploads/products_thumb/'. $filename);

                    \Image::make($file->getRealPath())->resize(1080, 1080)->save($path);
                    \Image::make($file->getRealPath())->resize(300, 300)->save($path_thumb);

                    \DB::table('men_products')
                    ->where('ProductID', $prodID)
                    ->update(["ProductImage"=>$filename]);
                }
            }

            return redirect("admin/men/".$catID."/products/list");
        }
    }

    //edits the category
    public function edit($catID,$prodID)
    {
        $data['products']= App\MenProducts::where("ProductID",$prodID)->first();
        if (empty($data['products'])) {
            return redirect('admin/men/'.$catID.'/products/list');
        }
        $men= App\Men::where('CategoryID',$catID)->get();
        $data['type'] = "Men ".$men[0]->CategoryName." products";
        $data['CategoryID'] = $catID;
        return view("admin.men.products.productedit", $data);
    }

    public function update($catID,$prodID)
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "ProductName" => "required",
                "ProductPrice" => "required|numeric",
            ],
            "validName" => [
                "ProductName" => "Product Name",
                "ProductImage" => "Product Image",
                "ProductPrice" => "Product Price",
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {
            $product = App\MenProducts::find($prodID);

            $product->CategoryID = $catID;
            $product->ProductName = \Request::get("ProductName");
            $product->ProductDescription = \Request::get("ProductDescription");
            $product->ProductPrice = \Request::get("ProductPrice");
            $product->Status = \Request::get("status");
            $product->save();

            if (\Request::hasFile("ProductImage")) {
                $file = \Request::file('ProductImage');

                if (!empty($file)) {
                    $filename = $prodID . '_' . str_random(5) . "." . $file->getClientOriginalExtension();

                    $path = public_path('assets/uploads/products/'. $filename);
                    $path_thumb = public_path('assets/uploads/products_thumb/'. $filename);

                    \Image::make($file->getRealPath())->resize(1080, 1080)->save($path);
                    \Image::make($file->getRealPath())->resize(300, 300)->save($path_thumb);

                    \File::delete(public_path('assets/uploads/products/').$product->ProductImage);
                    \File::delete(public_path('assets/uploads/products_thumb/').$product->ProductImage);

                    \DB::table('men_products')
                        ->where('ProductID', $prodID)
                        ->update(["ProductImage"=>$filename]);
                }
            }

            return redirect("admin/men/".$catID."/products/list");
        }
    }

    public function delete($catID)
    {
        foreach ( \Request::get('IDs') as $id) {
            $men_products = App\MenProducts::where('ProductID', $id)->first();
            \File::delete(public_path('assets/uploads/products/').$men_products['ProductImage']);
            \File::delete(public_path('assets/uploads/products_thumb/').$men_products['ProductImage']);
        } 

        \DB::table('men_products')
                ->whereIn('ProductID', \Request::get('IDs'))
                ->delete();

        return redirect("admin/men/".$catID."/products/list");
    }
}
