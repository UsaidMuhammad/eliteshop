<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class CarouselController extends Controller
{

    //returns mens products index page with data
    public function index()
    {
        $data['carousel']= App\Carousel::get();
        $data['type'] = 'Carousel';
        return view("admin.carousel.index", $data);
    }

    //returns the add men index page
    public function add()
    {
        $data['type'] = "Carousel";
        return view("admin.carousel.add", $data);
    }

    //creates a new men category
    public function create()
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "Image" => "required|image",
            ],
            "validName" => [
                "Image" => "Carousel Image",
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {
            $carousel = new App\Carousel;

            $carousel->Heading = \Request::get("Heading");
            $carousel->Description = \Request::get("Description");
            $carousel->Status = \Request::get("status");
            $carousel->save();

            $carouselID = \DB::getPdo()->lastInsertId();

            if (\Request::hasFile("Image")) {
                $file = \Request::file('Image');

                if (!empty($file)) {
                    $filename = $carouselID . '_' . str_random(5) . "." . $file->getClientOriginalExtension();

                    $path = public_path('assets/uploads/carousel/'. $filename);

                    \Image::make($file->getRealPath())->resize(1920, 800)->save($path);

                    \DB::table('carousel')
                    ->where('CarouselID', $carouselID)
                    ->update(["Image"=>$filename]);
                }
            }

            return redirect("admin/carousel");
        }
    }

    //edits the category
    public function edit($CarouselID)
    {
        $data['carousel']= App\Carousel::find($CarouselID);
        $data['type'] = 'Carousel';
        return view("admin.carousel.edit", $data);
    }

    public function update($CarouselID)
    {
        $validationValues = [
            "msg" => [
                "required" => 'please enter :attribute',
            ],
            "valid" => [
                "Image" => "required|image",
            ],
            "validName" => [
                "Image" => "Carousel Image",
            ]
        ];

        $v = \Validator::make(\Request::all(), $validationValues['valid'], $validationValues["msg"]);

        $v->setAttributeNames($validationValues['validName']);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        else
        {

            $carousel = App\Carousel::find($CarouselID);

            $carousel->Heading = \Request::get("Heading");
            $carousel->Description = \Request::get("Description");
            $carousel->Status = \Request::get("status");
            $carousel->save();

            if (\Request::hasFile("Image")) {
                $file = \Request::file('Image');

                if (!empty($file)) {
                    $filename = $CarouselID . '_' . str_random(5) . "." . $file->getClientOriginalExtension();

                    $path = public_path('assets/uploads/carousel/'. $filename);

                    \Image::make($file->getRealPath())->resize(1920, 800)->save($path);

                    \File::delete(public_path('assets/uploads/carousel/').$carousel->Image);

                    \DB::table('carousel')
                        ->where('CarouselID', $CarouselID)
                        ->update(["Image"=>$filename]);
                }
            }

            return redirect("admin/carousel");
        }
    }

    public function delete()
    {
        foreach ( \Request::get('IDs') as $id) {
            $carousel = App\Carousel::where('CarouselID', $id)->first();
            \File::delete(public_path('assets/uploads/carousel/').$carousel['Image']);
        } 

        \DB::table('carousel')
                ->whereIn('CarouselID', \Request::get('IDs'))
                ->delete();

        return redirect("admin/carousel");
    }
}
