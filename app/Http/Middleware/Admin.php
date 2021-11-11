<?php

namespace App\Http\Middleware;

use App\Models\Seller;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check() ) {

            return $next($request);
        } else {
            dd('admin check from middleware ,This seller or employee account will be log out');
            $status = Seller::where('id', '=', Auth::guard('seller')->user()->id); //this will find query will authorized logged in user by his ID 
            //dd($status);
            $status->update([
                'status' => 'inactive'
            ]);
            Auth::logout();
            session()->flush();
            return redirect()->route('login')->with('success', 'You are not Admin');
        }
    }
}
