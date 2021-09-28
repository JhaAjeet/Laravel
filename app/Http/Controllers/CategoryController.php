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
        //fatch data from database
        // $categories = Categories::all();

        // if you want to fetch lattest product is first then use this lattest method
        $categories = Categories::latest()->paginate(5);
        //delete trash

        $trashCat = Categories::onlyTrashed()->latest()->paginate(3);

        //using query builder read data
        //$categories = DB::table('categories')->latest()->get();

        // Laravel pagination 
        //$categories = DB::table('categories')->latest()->paginate(5);

        //Query table join table
        // $categories = DB::table('categories')
        //         ->join('users','categories.user_id','users.id')
        //         ->select('categories.*','users.name')
        //         ->latest()->paginate(5);

        return view('Admin.Category', compact('categories','trashCat'));
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
    public function Edit($id){
        // $categories = Categories::find($id);
        $categories = DB::table('categories')->where('id',$id)->first();
        return view('Admin.Edit',compact('categories'));
    }

    public function Update(Request $request ,$id){
        // $update = Categories::find($id)->update([
        //     'categories_name' => $request->categories_name,
        //     'user_id' => Auth::user()->id

        // ]);

        $data = array();
        $data['categories_name'] = $request->categories_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

         return redirect()->route('category')->with('sucess','categories Update  sucessfully');
    }

    public function Trash($id){
        $delete = Categories::find($id)->delete();
        return redirect()->back()->with('sucess','category softdelete sucessfully');
    }

    public function Restore($id){
        $delete = Categories::withTrashed()->find($id)->restore();
         return redirect()->route('category')->with('sucess','categories Restore  sucessfully');

    }
}
