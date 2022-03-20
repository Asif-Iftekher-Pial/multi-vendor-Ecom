<?php

namespace App\Http\Controllers\Frontend\auth;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
            'gender' => 'required',
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
            'gender' => $request->gender,
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

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            Session::put('user',$request->email);
            $status = User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
                $status->update([
                     'status' => 'active'
                 ]);
            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'))->with('success', 'Successfully logged in');
            }
            else{
                return redirect()->route('home')->with('success', 'Successfully logged in');
            }
        }
        else{
            return back()->with('error','Wrong email or password'); 
        }

        // $credentials = $request->only('email', 'password');  //only email and passoword are now stored in credentials variable

        // // dd($credentials);
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     $status = User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
        //     $status->update([
        //         'status' => 'active'
        //     ]);

        //     // return redirect()->session()->get('url.intended')??'/';
        //      return redirect()->route('home');
        //     //dd($request);
        //     // if(session()->has('url.intended')) {
        //     //    //dd('okey');
        //     //     session()->put('url.intended', URL::previous());
            
        //     // } else {
        //     //     return redirect()->route('home');
        //     // }
        // } else
        //     return back()->withErrors([
        //         'email' => 'The provided information did not match our records.',
        //     ]);



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
        $user = Auth::user();
        //dd($user);
        return view('FrontEnd.Layouts.auth.myAccount', compact('user'));
    }
    public function myaddress()
    {
        $user = Auth::user();

        return view('FrontEnd.Layouts.auth.myAddress', compact('user'));
    }

    public function myaccountdetail()
    {
        $user = Auth::user();

        return view('FrontEnd.Layouts.auth.myAccountDetails', compact('user'));
    }

    public function editbillingaddress(Request $request, $id)
    {
        //dd($id);
        $user = User::where('id', $id)->update([
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->postcode,
        ]);
        if ($user) {
            return redirect()->back()->with('success', 'biling address updated successfully');
        } else {
            return back()->withErrors(['error', 'Something went wrong']);
        }
        //dd($user);

    }
    public function editshippingaddress(Request $request, $id)
    {
        $user = User::where('id', $id)->update([
            'scountry' => $request->scountry,
            'saddress' => $request->saddress,
            'scity' => $request->scity,
            'sstate' => $request->sstate,
            'spostcode' => $request->spostcode,
            'phone' => $request->phone,
        ]);
        if ($user) {
            return redirect()->back()->with('success', 'Shipping address updated successfully');
        } else {
            return back()->withErrors(['error', 'Something went wrong']);
        }
        //dd($user);
    }

    public function editUserAccount(Request $request, $id)
    {
        //dd($id);
        if ($request->OldPassword == null && $request->NewPassword == null && $request->NewPasswordConfirm == null) //when only full name and user name update without password
        {
            $request->validate([
                'fullname' => 'string|required',
                'username' => 'string|required'
            ]);
            //dd('everything okey');
            $user = User::where('id', $id)->update([
                'full_name' => $request->fullname,
                'username' => $request->username,

            ]);
            if ($user) {
                return redirect()->back()->with('success', 'Account Updated successfully');
            } else {
                return back()->withErrors(['error', 'Something went wrong']);
            }
        } //when all field is updating 
        else {

            //dd('oke');

            if (!Hash::check($request->input('OldPassword'), auth()->user()->password)) {  //check if the current password is matching or not 
                // dd('password does not matched');

                return back()->withErrors([
                    'error' => 'Old Password does not matched.',
                ]);
            } else {

                $request->validate([
                    'fullname' => 'required|string',
                    'username' => 'required|string',
                    'OldPassword' => [
                        'required', 'string',
                        'min:8',               // must be at least 12 characters in length
                        'regex:/[a-z]/',       // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[0-9]/',     // must contain a special character
                    ],

                    'NewPassword' => [
                        'required', 'string',
                        'min:8',               // must be at least 12 characters in length
                        'regex:/[a-z]/',       // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[0-9]/',     // must contain a special character
                    ],
                    'NewPasswordConfirm' => 'required|same:NewPassword'   //Confirm Newpassword will be match with NewConfirmpassword

                ]);


                if (Hash::check($request->input('NewPassword'), auth()->user()->password)) { // if user type NewPassword is same as  the OldPAssword
                    return back()->withErrors(['error', 'New password can not be the old password']);
                } else {

                    $user = User::where('id', $id)->update([
                        'full_name' => $request->fullname,
                        'username' => $request->username,
                        'password' => bcrypt($request->NewPassword),
                    ]);
                    if ($user) {
                        return redirect()->back()->with('success', 'All user information is Updated successfully');
                    } else {
                        return back()->withErrors(['Something went wrong']);
                    }
                }
            }
        }
    }
    public function myOrderlist()
    {
        // $user = Auth::user();
        $orderlist=Order::where('user_id',auth()->user()->id)->where('payment_status','unpaid')->get();
        $PaidOrderList=Order::where('user_id',auth()->user()->id)->where('payment_status','paid')->get();
       
        //dd($PaidOrderList);

        return view('FrontEnd.Layouts.auth.orderlist', compact('orderlist','PaidOrderList'));
    }

}
