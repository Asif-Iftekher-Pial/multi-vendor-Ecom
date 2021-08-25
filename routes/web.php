<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\Brand\BrandController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\User\UserController;
use Illuminate\Support\Facades\Route;

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



// Route::get('/index',[TestController::class,'index'])->name('test');

Route::prefix('admin')->group(function () {


    Route::get('/', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');

    Route::get('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/dologin', [LoginController::class, 'dologin'])->name('dologin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



    //admin and Employee both can access this group
    Route::group(['middleware' => 'admin.employee'], function () {

        //banner section
        Route::resource('/banner', BannerController::class);
        Route::post('banner_status', [BannerController::class, 'bannerStatus'])->name('banner.status');


        //category section
        Route::resource('/category', CategoryController::class);
        Route::post('category_status', [CategoryController::class, 'categoryStatus'])->name('category.status');
        Route::post('category/{id}/child', [CategoryController::class, 'getChildByParentID']);
    });



    //only Admin can access this group
    Route::group(['middleware' => 'admin'], function () {

        //user add section
        Route::resource('/user', UserController::class);
        Route::post('user_status', [UserController::class, 'userStatus'])->name('user.status');
       

    });

    //authenticated users can access
    Route::middleware(['auth'])->group(function () {


    //User profile update section
     Route::get('/user/profile', [UserController::class, 'userprofile'])->name('profile');



     //Brand section
     Route::resource('/brand', BrandController::class);
     Route::post('brand_status', [BrandController::class, 'brandStatus'])->name('brand.status');
 
     //product section
     Route::resource('/product', ProductController::class);
     Route::post('product_status', [ProductController::class, 'productStatus'])->name('product.status');
 
    });

   
    
});
