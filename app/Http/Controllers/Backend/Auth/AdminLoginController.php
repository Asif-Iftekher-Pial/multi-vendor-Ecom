<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
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

