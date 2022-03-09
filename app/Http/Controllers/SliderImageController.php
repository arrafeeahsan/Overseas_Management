<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImage;

class SliderImageController extends Controller
{
    public function index(){
        return view('sliderimage/sliderimageadd');
    }

    public function store(Request $req){
        $data = new SliderImage;

        $data->image_status      = $req->imagestatus;


        if ($req -> hasFile('sliderimage')) {
            $file = $req -> file ('sliderimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/sliderimage/', $filename);
            $data->slider_image = $filename;
        } 
        
        $data->save();

        return response() -> json([
            'status'=>200,
            'message' => 'Slider Image Data Added Successfully'
        ]);
    }

    public function listview(Request $request){
        $data = SliderImage::all();

        if($request -> ajax()){
            return response()->json([
                'image'=>$data,
            ]);
        }

        return view('sliderimage/sliderimagelist', ['images' => $data]);
    }

    public function edit($id){
        $data = SliderImage::find($id);
        
        if($data){
            return response()->json([
                'status'=>200,
                'image'=>$data,
                
            ]);
        }
    }

    public function update(Request $req, $id){
        $data = SliderImage::find($id);
        

        $data->image_status      = $req->imagestatus;

        if ($req -> hasFile('sliderimage')) {

            // $path = 'uploads/sliderimage/'.$data->slider_image;
            // if(File::exists($path)){
            //     File::delete($path);
            // }

            $file = $req -> file ('sliderimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->move('uploads/sliderimage/', $filename);
            $data->slider_image = $filename;
        } 
        
        $data->save();
        

        return response() -> json([
            'status'=>200,
            'message' => 'Slider Image Data Updated Successfully'
        ]);
    }

    public function destroy($id){
        SliderImage::find($id)->delete($id);
 
         return redirect('slider-image-list')->with('status', 'Deleted successfully!');
    }

}
