<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categories;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function index(){
        // $categories = Categories::all();
        $categories = Categories::latest()->get();
        return view('Admin.Category', compact('categories'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
        'categories_name' => 'required|unique:categories|max:255',
        
    ],
    [
        'categories_name.required' => 'Invalid Input',
        
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


        // insert data using query builder

        // $data = array();
        // $data['categories_name'] = $request->categories_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return redirect()->back()->with('sucess','categories insert sucessfully');



    }
}
