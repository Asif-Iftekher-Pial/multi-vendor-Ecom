<?php

namespace App\Http\Middleware;

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
        if (Auth::guard('admin')->check()) {
            
                return $next($request);
         }
        //      else {
        //         $status = User::find(auth()->user()->id); //this will find query will authorized logged in user by his ID 
        //         $status->update([
        //             'status' => 'inactive'
        //         ]);

        //         Auth::logout();

        //         return redirect()->route('login')->with('success', 'You are not Admin');
        //     }
        else {
            return redirect()->route('admin.login.form');
        }
    }
}
