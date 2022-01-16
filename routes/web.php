<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Backend\Brand\BrandController;
use App\Http\Controllers\Frontend\Index\IndexController;
use App\Http\Controllers\Backend\Coupon\CouponController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\shipping\ShippingController;
use App\Http\Controllers\Frontend\checkout\CheckoutController;
use App\Http\Controllers\Frontend\wishlist\WishlistController;
use App\Http\Controllers\Frontend\auth\AuthenticationController;
use App\Http\Controllers\Frontend\ProductReview\ProductReviewController;

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

require __DIR__.'/frontend.php';
require __DIR__.'/backend.php';

