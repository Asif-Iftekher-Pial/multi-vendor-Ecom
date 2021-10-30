<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dashboard()
    {
        $total_products=Product::count();
        $total_categories=Categorie::count();
        $total_brands=Brand::count();
        $orders=Orders::orderBy('id', 'DESC')->limit(10)->get();
        
        //dd($orders);
        return view('Backend.Layouts.home',compact('total_products','total_categories','total_brands','orders'));
    }

    public function login()
    {
        return view('Backend.Layouts.Authentication.Login');
    }

    public function dologin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password' =>'required|min:6'
        ]);

        // dd($request->all());

        $credentials=$request->only('email','password');

        if(Auth::guard('seller')->attempt($credentials))
        {
            $request->session()->regenerate();
            $status=Seller::where('id','=',Auth::guard('seller')->user()->id);
            //dd($status);
                $status->update([
                    'status'=> 'active'
                ]);
            //dd($request->all());
            return redirect()->intended(route('dashboard'))->with('success','You are logged in as Seller!');
        }
        return back()->withErrors([
            'email' => 'Seller credentials does not match our records.',
        ]);
    }
    public function logout()
    {
        $status=Seller::where('id','=',Auth::guard('seller')->user()->id);
        //dd($status);
            $status->update([
                'status'=> 'inactive'
            ]);
        Auth::logout();
        session()->flush();
       
        return redirect()->route('login')->with('success','Logout successful');
       
    }
}
