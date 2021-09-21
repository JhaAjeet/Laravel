<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
        return view('Admin.Category');
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
        
    ],
    [
        'category_name.required' => 'plz input category name',
        
    ]
);

    }
}
