<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardControler;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// auth
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login.store');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// rego
Route::get('/register',[RegisterController::class, 'index'])->name('register');
    Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/category/{mockupNameKey}',[HomeController::class, 'category'])->name('category');
Route::get('/subcategory/{subcategoryKey}', [HomeController::class, 'subcategory'])->name('subcategory');
// Route::get('/subcategory/{key}/items', [HomeController::class, 'fetchSubcategoryItems'])->name('subcategory.items');

Route::get("/register",[RegisterController::class, 'index'])->name('register');


// ajax controller
Route::get("/wilayah/search",[AjaxController::class,'searchWilayah'])->name("ajax.wilayah.search");
Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get("/detail/{modelId}",[HomeController::class, 'detail'])->name('detail');

});

// 
Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::get('/dashboard',[DashboardControler::class, 'index'])->name('dashboard');
    Route::resource('umkm', UmkmController::class);
    Route::get("/umkm/show/{id}",[UmkmController::class,'show']);
    Route::get('/approved',[ApprovalController::class, 'index'])->name('approved.index');
    Route::put('/approved/{id}',[ApprovalController::class, 'update'])->name('approved');
    Route::put("/unapprov/{id}",[ApprovalController::class,'inactive'])->name('unapprov');
    Route::resource('/category', CategoryController::class);
    Route::delete('/category/delete/{id}',[CategoryController::class,"destroy"]);
    Route::resource('/subcategory', SubCategoryController::class);
    Route::delete('/subcategory/delete/{id}',[SubCategoryController::class,"destroy"]);

});