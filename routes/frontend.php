<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\Index\IndexController;
use App\Http\Controllers\Frontend\checkout\CheckoutController;
use App\Http\Controllers\Frontend\wishlist\WishlistController;
use App\Http\Controllers\Frontend\auth\AuthenticationController;
use App\Http\Controllers\Frontend\ProductReview\ProductReviewController;
// Frontend routes start



route::get('/', [IndexController::class, 'home'])->name('home');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/order-list/hosted-payment/{order_number}', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('hosted.payment');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END












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

        Route::get('/orderlist',[AuthenticationController::class,'myOrderlist'])->name('orderlist');
    });
});

Route::prefix('user/review')->group(function () {
    Route::middleware(['customer'])->group(function () {

        Route::post('product-review/{slug}', [ProductReviewController::class, 'productReview'])->name('product.review');
    });
});

// Cart 

Route::prefix('shopping')->group(function () {

    Route::post('cart/store', [CartController::class, 'cartStore'])->name('cart.store');
    Route::post('cart/delete', [CartController::class, 'cartDelete'])->name('cart.delete');
    Route::post('cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');
    Route::post('manage/cart/delete', [CartController::class, 'managecartDelete'])->name('managecart.delete');
    Route::get('cart', [CartController::class, 'cart'])->name('cart');

    // coupon section
    Route::post('coupon/add', [CartController::class, 'couponAdd'])->name('coupon.add');
});
//whishlists
Route::prefix('wishlists')->group(function () {
    Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('wishlist/store', [WishlistController::class, 'wishlistStore'])->name('wishlist.store');
    Route::post('wishlist/move-to-cart', [WishlistController::class, 'moveToCart'])->name('wishlist.move.cart');
    Route::post('wishlist/delete', [WishlistController::class, 'wishlistDelete'])->name('wishlist.delete');
});

//checkout section
Route::prefix('order')->group(function () {
    Route::middleware(['customer'])->group(function () {

        Route::get('checkout1', [CheckoutController::class, 'checkout1'])->name('checkout1');
        Route::post('checkout-first', [CheckoutController::class, 'checkout1Store'])->name('checkout1.store');
        Route::post('checkout-two', [CheckoutController::class, 'checkout2Store'])->name('checkout2.store');
        Route::post('checkout-three', [CheckoutController::class, 'checkout3Store'])->name('checkout3.store');
        Route::get('checkout-store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
        Route::get('complete/{order}', [CheckoutController::class, 'complete'])->name('complete');
    });
});

Route::prefix('shopping')->group(function () {

    Route::get('shop', [IndexController::class, 'shop'])->name('shop');
    Route::post('shop-filter', [IndexController::class, 'shopFilter'])->name('shop.filter');
});
// Brand
Route::get('/product-brand/{slug}/', [IndexController::class, 'productCategory'])->name('product.brand');

//Product Category
Route::get('/product-category/{slug}/', [IndexController::class, 'productCategory'])->name('product.category');

//product Detail
Route::get('/product-detail/{slug}/', [IndexController::class, 'productDetail'])->name('product.detail');

//search product and auto search 
Route::get('/autosearch', [IndexController::class, 'autoSearch'])->name('autosearch');
Route::get('/search', [IndexController::class, 'search'])->name('search');



Route::get('/viewProduct/{product_id}',[IndexController::class,'viewProduct']);

// Frontend routes end