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

    public function productCategory( Request $request, $slug)
    
    {
        //return $slug;
        $categories=Categorie::with('products')->where('slug',$slug)->first();
        //dd($categories);

        //sorting by asc,Desc
        $sort='';
        if($request->sort !=null){
            $sort=$request->sort;
        }

        if($categories==null){
            return view('FrontEnd.Layouts.errors.505');
        }
        else{
            if($sort=='priceAsc'){ //if product is sort by offer price with ASC
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','ASC')->paginate(12);
            }
            elseif($sort=='priceDesc'){ //if product is sort by Offer price with Desc
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','DESC')->paginate(12);
            }
             elseif($sort=='discAsc'){ //if product is sort by Discounted price with ASC
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','ASC')->paginate(12);
            }
             elseif($sort=='discDesc'){ //if product is sort by Discounted price with Desc
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','DESC')->paginate(12);
            } 
            elseif($sort=='titleAsc'){ //if product is sort by Product Title with ASC
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','ASC')->paginate(12);
            }
            elseif($sort=='titleDesc'){ //if product is sort by Product Title with Desc
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','DESC')->paginate(12);
            }
            else{
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->paginate(12);
            }
        }
        $route='product-category';

        // moredata load with ajax

        if($request->ajax()){
            $view=view('FrontEnd.Layouts.categorizedProduct.singleProducts',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('FrontEnd.Layouts.categorizedProduct.productCategory',compact('categories','route','products'));
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
