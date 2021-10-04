<?php

namespace App\Http\Controllers\Frontend\checkout;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    public function checkout1()
    {
        $user=Auth::user();
        //dd($user);
        return view('FrontEnd.Layouts.checkout.checkout1',compact('user'));
    }
    public function checkout1Store(Request $request)
    {
        //return $request->all();
        Session::put('checkout',[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'postcode'=>$request->postcode,
            'note'=>$request->note,

            // shipping address
            'sfirst_name'=>$request->sfirst_name,
            'slast_name'=>$request->slast_name,
            'semail'=>$request->semail,
            'sphone'=>$request->sphone,
            'scountry'=>$request->scountry,
            'saddress'=>$request->saddress,
            'scity'=>$request->scity,
            'sstate'=>$request->sstate,
            'spostcode'=>$request->spostcode,
            
        ]);

        $shippings= Shipping::where(['status'=>'active'])->orderBy('shipping_address','ASC')->get(); //shipping method will retrive and pass to the checkout2 for selecting shipng method


        return view('FrontEnd.Layouts.checkout.checkout2', compact('shippings'));
    }

    public function checkout2Store(Request $request)
    {
        //return $request->all();
        Session::push('checkout',[
            'delivery_charge'=>$request->delivery_charge,
        ]);
        return view('FrontEnd.Layouts.checkout.checkout3');
    }
    
    public function checkout3Store(Request $request)
    {
        //return $request->all();
        Session::push('checkout',[
            'payment_method'=>$request->payment_method,
            'payment_status'=>'paid',
        ]);
         //return Session::get('checkout')[0]['delivery_charge'];
        return view('FrontEnd.Layouts.checkout.checkout4');
    }
}
