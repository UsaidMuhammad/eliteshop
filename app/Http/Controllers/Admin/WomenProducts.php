<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class WomenProducts extends Controller
{

    //returns Womens products index page with data
    public function index($catID)
    {
        $data['products']= App\WomenProducts::where('CategoryID',$catID)->get();        
        $Women= App\Women::where('CategoryID',$catID)->get();
        $data['type'] = "Women ".$Women[0]->CategoryName." products";
        $data["CategoryID"] = $catID;
        return view("admin.women.products.productindex", $data);
    }

    //returns the add Women index page
    public function add($catID)
    {
        $Women= App\Women::where('CategoryID',$catID)->get();
        $data['type'] = "Women ".$Women[0]->CategoryName." products";
        $data["CategoryID"] = $catID;  
        return view("admin.women.products.productadd", $data);
    }

    //creates a new Women category
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
            $product = new App\WomenProducts;

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

                    \DB::table('women_products')
                    ->where('ProductID', $prodID)
                    ->update(["ProductImage"=>$filename]);
                }
            }

            return redirect("admin/women/".$catID."/products/list");
        }
    }

    //edits the category
    public function edit($catID,$prodID)
    {
        $data['products']= App\WomenProducts::where("ProductID",$prodID)->first();
        if (empty($data['products'])) {
            return redirect('admin/women/'.$catID.'/products/list');
        }
        $Women= App\Women::where('CategoryID',$catID)->get();
        $data['type'] = "Women ".$Women[0]->CategoryName." products";
        $data['CategoryID'] = $catID;
        return view("admin.women.products.productedit", $data);
    }

    public function update($catID,$prodID)
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
            $product = App\WomenProducts::find($prodID);

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

                    \DB::table('women_products')
                        ->where('ProductID', $prodID)
                        ->update(["ProductImage"=>$filename]);
                }
            }

            return redirect("admin/women/".$catID."/products/list");
        }
    }

    public function delete($catID)
    {
        foreach ( \Request::get('IDs') as $id) {
            $Women_products = App\WomenProducts::where('ProductID', $id)->first();
            \File::delete(public_path('assets/uploads/products/').$Women_products['ProductImage']);
            \File::delete(public_path('assets/uploads/products_thumb/').$Women_products['ProductImage']);
        } 

        \DB::table('women_products')
                ->whereIn('ProductID', \Request::get('IDs'))
                ->delete();

        return redirect("admin/women/".$catID."/products/list");
    }
}
