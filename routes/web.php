<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\Brand\BrandController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Coupon\CouponController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\shipping\ShippingController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Frontend\auth\AuthenticationController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\checkout\CheckoutController;
use App\Http\Controllers\Frontend\Index\IndexController;
use App\Http\Controllers\Frontend\wishlist\WishlistController;
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









// Frontend routes start

route::get('/', [IndexController::class, 'home'])->name('home');

//authentication
Route::get('/login', [AuthenticationController::class, 'index'])->name('customer.login');
Route::post('/signup', [AuthenticationController::class, 'registration'])->name('customer.registration');
Route::post('/signin', [AuthenticationController::class, 'login'])->name('customer.signin');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('customer.logout');

//customer account and profile
Route::prefix('user/account')->group(function () {
    Route::middleware(['customer'])->group(function () {

    Route::get('/my-account', [AuthenticationController::class, 'myaccount'])->name('my.account');
    Route::get('/my-address', [AuthenticationController::class, 'myaddress'])->name('my.address');
    Route::get('/my-accoute-detail', [AuthenticationController::class, 'myaccountdetail'])->name('my.accountdetail');
    Route::post('/billing-address/{id}', [AuthenticationController::class, 'editbillingaddress'])->name('editbillingaddress');
    Route::post('/shipping-address/{id}', [AuthenticationController::class, 'editshippingaddress'])->name('editshippingaddress');

    // edit user account
    Route::post('/user-account/{id}', [AuthenticationController::class, 'editUserAccount'])->name('editUserAccount');
        
    });
    
});

// Cart 

Route::prefix('shopping')->group(function(){

    Route::post('cart/store',[CartController::class,'cartStore'])->name('cart.store');
    Route::post('cart/delete',[CartController::class,'cartDelete'])->name('cart.delete');
    Route::post('cart/update',[CartController::class,'cartUpdate'])->name('cart.update');
    Route::post('manage/cart/delete',[CartController::class,'managecartDelete'])->name('managecart.delete');
    Route::get('cart',[CartController::class,'cart'])->name('cart');

    // coupon section
    Route::post('coupon/add',[CartController::class,'couponAdd'])->name('coupon.add');


});


//whishlists
 Route::prefix('wishlists')->group(function(){
     Route::get('wishlist',[WishlistController::class,'wishlist'])->name('wishlist');
     Route::post('wishlist/store',[WishlistController::class,'wishlistStore'])->name('wishlist.store');
     Route::post('wishlist/move-to-cart',[WishlistController::class,'moveToCart'])->name('wishlist.move.cart');
     Route::post('wishlist/delete',[WishlistController::class,'wishlistDelete'])->name('wishlist.delete');
     
});

//checkout section
Route::prefix('order')->group(function () {
    Route::middleware(['customer'])->group(function () {

        Route::get('checkout1',[CheckoutController::class,'checkout1'])->name('checkout1');
        Route::post('checkout-first',[CheckoutController::class,'checkout1Store'])->name('checkout1.store');
        Route::post('checkout-two',[CheckoutController::class,'checkout2Store'])->name('checkout2.store');
        Route::post('checkout-three',[CheckoutController::class,'checkout3Store'])->name('checkout3.store');
        Route::get('checkout-store',[CheckoutController::class,'checkoutStore'])->name('checkout.store');
        Route::get('complete/{order}',[CheckoutController::class,'complete'])->name('complete');



    });
    
});

Route::prefix('shopping')->group(function () {

    Route::get('shop',[IndexController::class,'shop'])->name('shop');
    Route::post('shop-filter',[IndexController::class,'shopFilter'])->name('shop.filter');
});
// Brand
Route::get('/product-brand/{slug}/', [IndexController::class, 'productCategory'])->name('product.brand');

//Product Category
Route::get('/product-category/{slug}/', [IndexController::class, 'productCategory'])->name('product.category');

//product Detail
Route::get('/product-detail/{slug}/', [IndexController::class, 'productDetail'])->name('product.detail');

//search product and auto search 
Route::get('/autosearch',[IndexController::class, 'autoSearch'])->name('autosearch');
Route::get('/search',[IndexController::class, 'search'])->name('search');





// Frontend routes end





// Backend routes





// Route::get('/index',[TestController::class,'index'])->name('test');

Route::prefix('admin')->group(function () {



    Route::get('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/dologin', [LoginController::class, 'dologin'])->name('dologin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



    //admin ,Vendor and Employee both can access this group
    Route::group(['middleware' => 'admin.employee'], function () {

        //Dashboard
        Route::get('/', [LoginController::class, 'dashboard'])->name('dashboard');

        //banner section
        Route::resource('/banner', BannerController::class);
        Route::post('banner_status', [BannerController::class, 'bannerStatus'])->name('banner.status');


        //category section
        Route::resource('/category', CategoryController::class);
        Route::post('category_status', [CategoryController::class, 'categoryStatus'])->name('category.status');
        Route::post('category/{id}/child', [CategoryController::class, 'getChildByParentID']);

         //shipping section
         Route::resource('/shipping', ShippingController::class);
         Route::post('shipping_status', [ShippingController::class, 'shippingStatus'])->name('shipping.status');
 

    });



    //only Admin can access this group
    Route::group(['middleware' => 'admin'], function () {

        //user add section
        Route::resource('/user', UserController::class);
        Route::post('user_status', [UserController::class, 'userStatus'])->name('user.status');

         //coupon section
         Route::resource('/coupon', CouponController::class);
         Route::post('coupon_status', [CouponController::class, 'couponStatus'])->name('coupon.status');
 

    });

    //authenticated users can access
    Route::middleware(['auth'])->group(function () {


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
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
