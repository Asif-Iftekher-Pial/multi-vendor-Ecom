<?php

namespace App\Http\Controllers\Backend\Seller\Auth;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerLoginController extends Controller
{
    

    public function login()
    {
       // dd('ok');
        return view('Backend.Layouts.Seller.Auth.Login');
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
            return redirect()->intended(route('seller.home'))->with('success','You are logged in as Seller!');
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