<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categories;
use Auth;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    public function index(){
        return view('Admin.Category');
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
        'categories_name' => 'required|unique:categories|max:255',
        
    ],
    [
        'categories_name.required' => 'plz inter categories name',
        
    ]);
        // insert data in database 

        Categories::insert([
            'categories_name' => $request->categories_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // insert data using object

        // $categories = new Categories;
        // $categories->categories_name = $request->categories_name;
        // $categories->user_id = Auth::user()->id;
        // $categories->save();

        return redirect()->back()->with('sucess','categories insert sucessfully');



    }
}
