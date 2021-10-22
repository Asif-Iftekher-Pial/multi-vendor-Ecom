<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dashboard()
    {
        $total_products=Product::count();
        $total_categories=Categorie::count();
        $total_brands=Brand::count();
        //dd($total_products);
        return view('Backend.Layouts.home',compact('total_products','total_categories','total_brands'));
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

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role=='admin')
            {
                $status=User::where('id','=',auth()->user()->id);
                $status->update([
                    'status'=> 'active'
                ]);
                return redirect()->route('dashboard');
            }
            elseif(auth()->user()->role=='vendor')
            {
                $status=User::where('id','=',auth()->user()->id);
                $status->update([
                    'status'=> 'active'
                ]);
                return redirect()->route('dashboard');
            }
            else
            {
                $status=User::where('id','=',auth()->user()->id);
                $status->update([
                    'status'=> 'active'
                ]);
                return redirect()->route('dashboard');
            }
            
        }

        return back()->withErrors([
            'email' => 'Seller credentials does not match our records.',
        ]);

    }
    public function logout()
    {
        // $ok=auth()->guard('admin');
        // dd($ok);

        if(Auth::guard('admin'))
        {
            //dd('Admin');
            $status=Admin::where('id','=',Auth::guard('admin')->user()->id);
            //dd($status);
                $status->update([
                    'status'=> 'inactive'
                ]);
                Auth::logout();
       
                return redirect()->route('admin.login.form')->with('success','Admin Logout successful');
        } 
        elseif(Auth::guard('seller'))
        {
            //dd('Admin');
            $status=Seller::where('id','=',Auth::guard('seller')->user()->id);
            //dd($status);
                $status->update([
                    'status'=> 'inactive'
                ]);
                Auth::logout();
       
                return redirect()->route('login')->with('success','Vendor Logout successful');
        }
        else{
            return view('FrontEnd.Layouts.errors.404');
        }
        // $status=User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
        // $status->update([
        //     'status'=> 'inactive'
        // ]);
       
    }
}
