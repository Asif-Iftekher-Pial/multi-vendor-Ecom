<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function dashboard()
    {
        $total_products=Product::count();
        $total_categories=Categorie::count();
        $total_brands=Brand::count();
        $orders=Order::orderBy('id', 'DESC')->limit(10)->get();
        
        //dd($orders);
        return view('Backend.Layouts.home',compact('total_products','total_categories','total_brands','orders'));
    }
    //
    public function showloginForm()
    {
        return view('Backend.Layouts.Authentication.adminLoginForm');
    }
    public function login(Request $request)
    {
        $credentials=$request->only('email','password');

        
        if(Auth::guard('admin')->attempt($credentials))
        {
            $request->session()->regenerate();
            $status=Admin::where('id','=',Auth::guard('admin')->user()->id);
            //dd($status);
                $status->update([
                    'status'=> 'active'
                ]);
            //dd($request->all());
            
            return redirect()->intended(route('dashboard'))->with('success','You are logged in as admin!');
        }
        return back()->withErrors([
            'email' => 'Admin credentials does not match our records.',
        ]);
       
    }
    public function adminlogout()
    {
        $status=Admin::where('id','=',Auth::guard('admin')->user()->id);
        //dd($status);
            $status->update([
                'status'=> 'inactive'
            ]);
        Auth::logout();
        session()->flush();
       
       
        return redirect()->route('admin.login.form')->with('success','Logout successful');
    }
}

