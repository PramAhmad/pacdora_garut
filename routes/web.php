<?php

use App\Http\Controllers\AjaxCategoryController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BestDesainController;
use App\Http\Controllers\BidangUsahaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardControler;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportUmkmController;
use App\Http\Controllers\HistoryModelsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\PendampinganController;
use App\Http\Controllers\ProfileSettingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TemplateUserController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UmkmProfileController;
use App\Models\HistoryModel;
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
Route::get('/pendampingan',[HomeController::class, 'pendampingan'])->name('pendampingan');
Route::get('/konsultasi',[HomeController::class, 'konsultasi'])->name('konsultasi');
Route::get('/tutorial',[HomeController::class, 'tutorial'])->name('tutorial');
Route::get('/bestdesain',[HomeController::class, 'bestdesain'])->name('bestdesain');



Route::get('/category/{mockupNameKey}',[HomeController::class, 'category'])->name('category');
Route::get('/subcategory/{subcategoryKey}', [HomeController::class, 'subcategory'])->name('subcategory');
// Route::get('/subcategory/{key}/items', [HomeController::class, 'fetchSubcategoryItems'])->name('subcategory.items');

Route::get("/register",[RegisterController::class, 'index'])->name('register');
Route::post('/contact',[ContactController::class, 'store'])->name('contact.store');

// export umkm


// ajax controller
Route::get("/wilayah/search",[AjaxController::class,'searchWilayah'])->name("ajax.wilayah.search");


Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get("/detail/{modelId}",[HomeController::class, 'detail'])->name('detail');
    Route::get('/profile',[UmkmProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit',[UmkmProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update/{id}',[UmkmProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/history',[UmkmProfileController::class, 'history'])->name('profile.history');
    // pendampingan store
    Route::post('/profile/pendampingan/store',[PendampinganController::class, 'store'])->name('pendampingan.store');
    Route::get('/profile/history/{id}',[UmkmProfileController::class, 'historyDetail'])->name('profile.history.detail');
    Route::get('/profile/history/{id}/edit',[UmkmProfileController::class, 'historyEdit'])->name('profile.history.edit');
    Route::put('/profile/history/{id}/update',[UmkmProfileController::class, 'historyUpdate'])->name('profile.history.update');
    Route::get("/template/select",[TemplateUserController::class, 'select'])->name('template.select');
    Route::post('/template/post/select',[TemplateUserController::class, 'selectStore'])->name('template.select.store');
    // Route::post('/history/store',[HistoryModelsController::class, 'store'])->name('history.store');
    Route::post('/export/{id}',[ExportController::class, 'index'])->name('export.pdf');

});

Route::get('/profile/design/{id}',[UmkmProfileController::class, 'design'])->name('profile.design')->middleware('auth');

// group route url to admin

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get("/subcategory/search/{id}",[AjaxCategoryController::class,'getSubCategory'])->name("ajax.subcategory");
        Route::get('/dashboard',[DashboardControler::class, 'index'])->name('dashboard');
        
        Route::resource('umkm', UmkmController::class);
        Route::get("/umkm/show/{id}",[UmkmController::class,'show']);
        Route::delete("/umkm/delete/{id}",[UmkmController::class,'destroy']);
    
        Route::get('/approved',[ApprovalController::class, 'index'])->name('approved.index');
        Route::get('/approval/{id}',[ApprovalController::class, 'show'])->name('approval.show');
        Route::put('/approval/{id}',[ApprovalController::class, 'update'])->name('approval.update');



        Route::resource('/category', CategoryController::class);
        Route::get('/category/edit/{id}',[CategoryController::class,"edit"]);
        Route::delete('/category/delete/{id}',[CategoryController::class,"destroy"]);

        Route::get('/subcategory/edit/{id}',[SubCategoryController::class,"edit"]);
        Route::delete('/subcategory/delete/{id}',[SubCategoryController::class,"destroy"]);
        Route::resource('/subcategory', SubCategoryController::class);


        Route::get('/bidangusaha',[BidangUsahaController::class, 'index'])->name('bidangusaha.index');
        Route::post('/bidangusaha/store',[BidangUsahaController::class, 'store'])->name('bidangusaha.store');
        Route::get('/bidangusaha/{id}/edit',[BidangUsahaController::class, 'edit']);
        Route::put('/bidangusaha/update/{id}',[BidangUsahaController::class, 'update']);
        Route::delete('/bidangusaha/delete/{id}',[BidangUsahaController::class, 'destroy']);

        Route::resource('/model', ModelsController::class);
        Route::get('/model/edit/{id}',[ModelsController::class,'edit']);
        Route::delete('/model/delete/{id}',[ModelsController::class,'destroy']);

        Route::resource('/history', HistoryModelsController::class);

        // template
        Route::get('/template',[TemplateUserController::class, 'index'])->name('template.index');
        Route::post('/template/store',[TemplateUserController::class, 'store'])->name('template.store');
        Route::get('/template/{id}/edit/',[TemplateUserController::class, 'edit'])->name('template.edit');
        Route::put('/template/update/{id}',[TemplateUserController::class, 'update'])->name('template.update');
        Route::delete('/template/delete/{id}',[TemplateUserController::class, 'destroy'])->name('template.destroy');
        Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
        Route::get('/contact/{id}',[ContactController::class, 'show'])->name('contact.show');
        Route::delete('/contact/delete',[ContactController::class, 'destroy'])->name('contact.destroy');
        Route::resource('/customer', CustomerController::class);
        Route::get('/customer/edit/{id}',[CustomerController::class, 'edit']);
        Route::delete('/customer/delete/{id}',[CustomerController::class, 'destroy']);
        Route::get('/export/umkm',[ExportUmkmController::class, 'umkm'])->name('umkm.export');
        Route::get('/profile',[ProfileSettingController::class, 'index'])->name('account.index');
        Route::put('/profile/update',[ProfileSettingController::class, 'update'])->name('account.update');  
        Route::get('/mitra',[MitraController::class, 'index'])->name('mitra.index');
        Route::get('/bestdesain',[BestDesainController::class, 'index'])->name('bestdesain.index');
        Route::post('/bestdesain/store',[BestDesainController::class, 'store'])->name('bestdesain.store');
        Route::put('/bestdesain/update/{id}',[BestDesainController::class, 'update'])->name('bestdesain.update');
        Route::get('/pendampingan',[PendampinganController::class, 'index'])->name('pendampingan.index');
        Route::get('/pendampingan/show/{id}',[PendampinganController::class, 'show'])->name('pendampingan.show');
        Route::delete('/pendampingan',[PendampinganController::class, 'destroy'])->name('pendampingan.destroy');
        Route::post('/mitra',[MitraController::class, 'store'])->name('mitra.store');
        Route::get('/mitra/{id}/show',[MitraController::class, 'show'])->name('mitra.show');
        Route::delete('/mitra/{id}',[MitraController::class, 'destroy'])->name('mitra.destroy');
        
    });
 
});