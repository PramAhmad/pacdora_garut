<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

// rego
Route::get('/register',[RegisterController::class, 'index'])->name('register');
    Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/category/{mockupNameKey}',[HomeController::class, 'category'])->name('category');
Route::get('/subcategory/{subcategoryKey}', [HomeController::class, 'subcategory'])->name('subcategory');
// Route::get('/subcategory/{key}/items', [HomeController::class, 'fetchSubcategoryItems'])->name('subcategory.items');
Route::get("/detail/{modelId}",[HomeController::class, 'detail'])->name('detail');

Route::get("/register",[RegisterController::class, 'index'])->name('register');


// ajax controller
Route::get('/ajax/category',[HomeController::class, 'ajaxCategory'])->name('ajax.filter.category');