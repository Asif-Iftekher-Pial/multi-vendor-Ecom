<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dashboard()
    {
        return view('Backend.Layouts.home');
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
            
        }

        return back()->withErrors([
            'email' => 'The provided credentials does not match our records.',
        ]);

    }
    public function logout()
    {
        $status=User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
        $status->update([
            'status'=> 'inactive'
        ]);
        Auth::logout();
       
        return redirect()->route('login')->with('success','Logout successful');
    }
}
