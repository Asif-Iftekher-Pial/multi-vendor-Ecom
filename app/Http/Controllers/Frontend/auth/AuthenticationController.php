<?php

namespace App\Http\Controllers\Frontend\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('FrontEnd.Layouts.auth.loginRegistration');
    }

    public function registration(Request $request)
    {
        // dd($request->all());
        $request->validate([

            'fullname' => 'required|string',
            'username' => 'required|string',
            'email' => 'email|required|unique:users,email',
            'password' => [
                'required', 'string',
                'min:8',               // must be at least 12 characters in length
                'regex:/[a-z]/',       // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',     // must contain a special character
            ],
            'confirmpassword' => 'required|same:password', //Confirm password will be match with password

        ]);

        User::create([

            'full_name' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);
        return redirect()->back()->with('success', 'Registration Successfull');
    }


    public function login(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);


        $credentials = $request->only('email', 'password');  //only email and passoword are now stored in credentials variable

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $status = User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
            $status->update([
                'status' => 'active'
            ]);

            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            }
            else{
                return redirect()->route('home');
            }

            
        }
        else
        return back()->withErrors([
            'email' => 'The provided information did not match our records.',
        ]);
    }


    public function logout()
    {
        $status = User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
        $status->update([
            'status' => 'inactive'
        ]);
       
        Auth::logout();

        return redirect()->route('customer.login')->with('success', 'Logout successful');
    }


    public function myaccount()
    {
        return view('FrontEnd.Layouts.auth.myAccount');
    }
    public function myaddress()
    {
        // $addressinfo=User::where('id',auth()->user()->id);
        //dd($addressinfo);
        return view('FrontEnd.Layouts.auth.myAddress');
    }

    public function myaccountdetail()
    {

        return view('FrontEnd.Layouts.auth.myAccountDetails');
    }
}
