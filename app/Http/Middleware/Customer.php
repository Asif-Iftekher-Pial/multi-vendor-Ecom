<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Customer
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
        if(Auth::check()){
            if(Auth::user()->role=='customer')
            {
                return $next($request);
            }
           
            else
            {
                
                return redirect()->route('customer.login')->withErrors(['error','Please log in first']);
            }
            
        }else{
            return redirect()->route('customer.login')->withErrors(['error','Please log in first']);
        }
    }
}
