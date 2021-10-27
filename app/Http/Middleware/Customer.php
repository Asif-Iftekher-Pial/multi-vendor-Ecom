<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use \App\Models\User;

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
            if(Auth::user())
            {
                return $next($request);
            }
           
            else
            {
                $status=User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
                $status->update([
                'status'=> 'inactive'
                ]);
                
                Auth::logout();
                
                return redirect()->route('customer.login')->withErrors(['Please log in first']);
            }
            
        }else{
            return redirect()->route('customer.login')->withErrors(['Please log in first']);
        }
    }
}
