<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerMiddleware
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
        if (Auth::guard('seller')->check()) {

            return $next($request);
        } else {
            dd('seller checked from middleware');
            $status = Admin::where('id', '=', Auth::guard('admin')->user()->id); //this will find query will authorized logged in user by his ID 
            //dd($status);
            $status->update([
                'status' => 'inactive'
            ]);
            Auth::logout();
            session()->flush();
            return redirect()->route('login')->with('success', 'You are not Seller');
        }
    }
    
}
