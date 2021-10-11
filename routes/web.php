<?php

use Illuminate\Support\Facades\Route;
// use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     //$users = User::all();
//     $users = DB::table('users')->get();
//     return view('dashboard',compact('users'));
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Admin.Theme.index');
})->name('dashboard');

// Category route 
Route::get('/all/categories',[CategoryController::class,'index'])->name('category');
Route::post('/add/categories',[CategoryController::class,'AddCat'])->name('store.categories');
Route::get('/category/edit/{id}',[CategoryController::class,'Edit']);
Route::post('/category/update/{id}',[CategoryController::class,'Update']);
Route::get('/softdelete/category/{id}',[CategoryController::class,'Trash']);
Route::get('/category/restore/{id}',[CategoryController::class,'Restore']);
Route::get('/category/delete/{id}',[CategoryController::class,'Delete']);

// For Brand Route
Route::get('/brands',[BrandController::class,'index'])->name('brand');
Route::post('/add/brand',[BrandController::class,'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);

// Multi Image Route
Route::get('/multi/image',[BrandController::class,'Multipic'])->name('multiimage');
Route::post('/add/multi',[BrandController::class,'AddMulti'])->name('store.image');

Route::get('/logout',[BrandController::class,'Logout'])->name('logout');