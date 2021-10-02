<?php

namespace App\Http\Controllers\Frontend\checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function checkout1()
    {
        $user=Auth::user();
        //dd($user);
        return view('FrontEnd.Layouts.checkout.checkout1',compact('user'));
    }
}
