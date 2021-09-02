<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminEmployee
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
            if(Auth::user()->role=='admin' || Auth::user()->role=='employee' )
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
                return redirect()->route('login')->with('success','You are not Admin or Employee');
            }
            
        }else{
            return redirect()->route('login');
        }
    }
}
