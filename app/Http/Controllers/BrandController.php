<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;


class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->paginate(5);
        return view('Admin.Brand.index',compact('brands'));
    }

    public function AddBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes : jpg,jpeg,png|',
        ],
        [
            'brand_name.required' => 'Enter valid brand name',
            'brand_image.min' => 'Brand longer then 4 cher',
        
        ]);
    

    $image = $request->file('brand_image');

    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/brand/';
    $last_img = $up_location.$img_name;
    $image->move($up_location,$img_name);

    Brand::insert([
        'brand_name' => $request->brand_name,
        'brand_image' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return redirect()->back()->with('sucess','image inserted sucessfully');
}


public function Edit($id){
 $brands = Brand::find($id);
 return view('Admin.Brand.edit',compact('brands'));
}


public function Update(Request $request, $id){
    $validated = $request->validate([
            'brand_name' => 'required|min:4',
           
        ],
        [
            'brand_name.required' => 'Enter valid brand name',
            'brand_image.min' => 'Brand longer then 4 cher',
        
        ]);
    
    $old_image = $request->old_image;

    $image = $request->file('brand_image');

    if ($image) {
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($image->getClientOriginalExtension());
    $img_name = $name_gen.'.'.$img_ext;
    $up_location = 'image/brand/';
    $last_img = $up_location.$img_name;
    $image->move($up_location,$img_name);

    unlink($old_image);

    Brand::find($id)->update([
        'brand_name' => $request->brand_name,
        'brand_image' => $last_img,
        'created_at' => Carbon::now()
    ]);

    return redirect()->back()->with('sucess','brand image update sucessfully');
    } else {
        Brand::find($id)->update([
        'brand_name' => $request->brand_name,
        'created_at' => Carbon::now()
    ]);

    return redirect()->back()->with('sucess','brand image update sucessfully');
    }


}


}
