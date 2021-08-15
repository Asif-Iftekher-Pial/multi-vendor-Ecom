<?php

use App\Http\Controllers\Backend\LoginController;
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


    Route::get('/',[LoginController::class,'dashboard'])->name('dashboard');

    Route::get('/login', [LoginController::class,'login'])->name('login');

    Route::post('/dologin',[LoginController::class,'dologin'])->name('dologin');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');

});