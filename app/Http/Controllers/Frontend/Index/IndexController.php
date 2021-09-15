<?php

namespace App\Http\Controllers\Frontend\Index;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){

        $banners=Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->limit('5')->get();
        $categories=Categorie::where(['status'=>'active','is_parent'=>1])->limit('3')->orderBy('id','DESC')->get();

        $newArrivals=Product::where(['status'=>'active','conditions'=>'new'])->orderBy('id','DESC')->limit('10')->get();
        //dd($newArrivals);

        return view('FrontEnd.Layouts.home.index',compact('banners','categories','newArrivals'));
    }

    public function productCategory($slug)
    
    {
        //return $slug;
        $categories=Categorie::with('products')->where('slug',$slug)->first();
        //dd($categories);
        return view('FrontEnd.Layouts.categorizedProduct.productCategory',compact('categories'));
    }

    public function productDetail($slug)
    {
        //dd($slug);
        $productDetails=Product::with('related_products')->where('slug',$slug)->first();
        //dd($productDetails);
        if ($productDetails) {
            return view('FrontEnd.Layouts.productDetails.productDetails',compact('productDetails'));
        } else {
            return view('FrontEnd.Layouts.errors.404');
        }
        
    }
}
