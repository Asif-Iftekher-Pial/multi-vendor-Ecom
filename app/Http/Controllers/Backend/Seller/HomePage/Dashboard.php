<?php

namespace App\Http\Controllers\Backend\Seller\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function sellerdashboard(){
       // return "ok";
        return view('Backend.Layouts.Seller.Home.dashboard');
    }
}
