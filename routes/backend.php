<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\Brand\BrandController;
use App\Http\Controllers\Backend\Order\OrderController;
use App\Http\Controllers\Backend\Coupon\CouponController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Settings\SettingsController;
use App\Http\Controllers\Backend\shipping\ShippingController;
// Backend routes





// Route::get('/index',[TestController::class,'index'])->name('test');

Route::prefix('app')->group(function () {


    Route::prefix('admin')->group(function () {
        Route::get('/login',[AdminLoginController::class, 'showloginForm'])->name('admin.login.form');
        Route::post('/adminLogin',[AdminLoginController::class, 'login'])->name('admin.login');
        Route::get('/adminLogout',[AdminLoginController::class, 'adminlogout'])->name('admin.logout');

    });


    Route::get('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/dologin', [LoginController::class, 'dologin'])->name('dologin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



      //Dashboard
        Route::get('/', [LoginController::class, 'dashboard'])->name('dashboard');





    Route::group(['middleware' => 'admin'], function () {

        // admin and employee access

       
         //banner section
         Route::resource('/banner', BannerController::class);
         Route::post('banner_status', [BannerController::class, 'bannerStatus'])->name('banner.status');
 
         //Employee or Seller Add section
         
         Route::get('sellerAdd',[UserController::class,'sellerAdd'])->name('sellerAdd');
 
 
         
          //shipping section
          Route::resource('/shipping', ShippingController::class);
          Route::post('shipping_status', [ShippingController::class, 'shippingStatus'])->name('shipping.status');

          Route::get('settings',[SettingsController::class, 'settings'])->name('settings');
          Route::put('settings',[SettingsController::class, 'settingsUpdate'])->name('setting.update');
        // admin and employee access End
    });


        //user add section
        Route::resource('/user', UserController::class);
        Route::post('user_status', [UserController::class, 'userStatus'])->name('user.status');

         //coupon section
         Route::resource('/coupon', CouponController::class);
         Route::post('coupon_status', [CouponController::class, 'couponStatus'])->name('coupon.status');
 

   

    
        //category section
        Route::resource('/category', CategoryController::class);
        Route::post('category_status', [CategoryController::class, 'categoryStatus'])->name('category.status');
        Route::post('category/{id}/child', [CategoryController::class, 'getChildByParentID']);

        //User profile update section
        Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
        Route::patch('/profile/picture', [UserController::class, 'profilepicture'])->name('profilepicture');
        Route::patch('/profile/password', [UserController::class, 'changepassword'])->name('changepassword');
        Route::patch('/profile/basicinfo', [UserController::class, 'basicinfo'])->name('basicinfo');



        //Brand section
        Route::resource('/brand', BrandController::class);
        Route::post('brand_status', [BrandController::class, 'brandStatus'])->name('brand.status');
        
        //product section
        Route::resource('/product', ProductController::class);
        Route::post('product_status', [ProductController::class, 'productStatus'])->name('product.status');
        // product attribute
        Route::post('product-attribute/{id}',[ProductController::class,'addProductAttribute'])->name('product.attribute');
        Route::delete('product-attribute-delete/{id}',[ProductController::class,'addProductAttributeDelete'])->name('product.attribute.destroy');
    

        //order Management
        Route::resource('order', OrderController::class);
        Route::post('order-status/{id}',[OrderController::class,'orderStatus'])->name('order.status');
   
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['web','auth:admin,seller']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});