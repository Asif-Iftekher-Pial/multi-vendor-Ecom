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
    public function home()
    {

        $banners = Banner::where(['status' => 'active', 'condition' => 'banner'])->orderBy('id', 'DESC')->limit('5')->get();
        $categories = Categorie::where(['status' => 'active', 'is_parent' => 1])->limit('3')->orderBy('id', 'DESC')->get();

        $newArrivals = Product::where(['status' => 'active', 'conditions' => 'new'])->orderBy('id', 'DESC')->limit('10')->get();
        //dd($newArrivals);
        $allBrands = Brand::where(['status' => 'active'])->orderBy('id', 'DESC')->limit('10')->get();
        //dd($allBrands);

        //dd($modalProducts);
        return view('FrontEnd.Layouts.home.index', compact('banners', 'categories', 'newArrivals', 'allBrands'));
    }

    public function shop(Request $request)
    {
        //tutorial =https://www.youtube.com/watch?v=tZgQqwqF1cM&list=PLIFG3IUe1Zxo8Zvju3_kJJvoKSaIP_SC_&index=29
        $products = Product::query();
        if (!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $cat_ids = Categorie::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            //dd($cat_ids);
            $products = $products->whereIn('cat_id', $cat_ids);
            //dd($products);
        }
        //brand filter
        if (!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brand_ids = Brand::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            //dd($cat_ids);
            $products = $products->whereIn('brand_id', $brand_ids);
            //dd($products);
        }
         //size filter
         if (!empty($_GET['size'])) {
            $products = $products->where('size', $_GET['size']);
            //dd($products);
        }

        //filter by sort
        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'priceAsc') { //if product is sort by offer price with ASC
                $products = $products->where(['status' => 'active'])->orderBy('offer_price', 'ASC')->paginate(12);
            }
            if ($_GET['sortBy'] == 'priceDesc') { //if product is sort by Offer price with Desc
                $products = $products->where(['status' => 'active'])->orderBy('offer_price', 'DESC')->paginate(12);
            }
            if ($_GET['sortBy'] == 'discAsc') { //if product is sort by Discounted price with ASC
                $products = $products->where(['status' => 'active'])->orderBy('price', 'ASC')->paginate(12);
            }
            if ($_GET['sortBy'] == 'discDesc') { //if product is sort by Discounted price with Desc
                $products = $products->where(['status' => 'active'])->orderBy('price', 'DESC')->paginate(12);
            }
            if ($_GET['sortBy'] == 'titleAsc') { //if product is sort by Product Title with ASC
                $products = $products->where(['status' => 'active'])->orderBy('title', 'ASC')->paginate(12);
            }
            if ($_GET['sortBy'] == 'titleDesc') { //if product is sort by Product Title with Desc
                $products = $products->where(['status' => 'active'])->orderBy('title', 'DESC')->paginate(12);
            }
        } else {
            $products = $products->where(['status' => 'active'])->paginate(12);
        }
        $brands = Brand::where(['status' => 'active'])->with('products')->orderBy('title', 'ASC')->get();
        //dd($brands);
        $cats = Categorie::where(['status' => 'active', 'is_parent' => 1])->with('products')->orderBy('title', 'ASC')->get();
        //dd($cats);

        return view('FrontEnd.Layouts.categorizedProduct.shop', compact('products', 'cats', 'brands'));
    }

    public function shopFilter(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        // category filter
        $catUrl = ''; //lets take a variable catUrl
        if (!empty($data['category'])) { //check if requested data['category'] from view  is not empty  then-
            foreach ($data['category'] as $category) { //take all the collection of category as single category
                if (empty($catUrl)) {  //if  when catUrl is empty then 
                    $catUrl .= '&category=' . $category; //single category wil store is  catUrl
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }
        // category filter end

        // //sort filter
        $sortByUrl = "";
        if (!empty($data['sortBy'])) { //sortBy is name name of shop.blade file selection section 
            $sortByUrl .= '&sortBy=' . $data['sortBy'];
        }
        // //sort filter end


        // price filter
        // $price_range_Url="";
        // if(!empty($data['price_range'])){ 
        //     $price_range_Url .='&price='.$data['price_range'];
        // }
        // dd($price_range_Url);

        //filter by brand
        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) { //take all the collection of category as single category
                if (empty($brandUrl)) {  //if  when catUrl is empty then 
                    $brandUrl .= '&brand=' . $brand; //single category wil store is  catUrl
                } else {
                    $brandUrl .= ',' . $brand;
                }
            }
        }

        //filter by size

        $sizeUrl = "";
        if (!empty($data['size'])) {
            //dd($data);
            $sizeUrl .= '&size=' . $data['size'];
        }

        return \redirect()->route('shop', $catUrl . $sortByUrl . $brandUrl . $sizeUrl);  //$catUrl.$sortByUrl is called append data in browser url section 

    }

    public function productCategory(Request $request, $slug)
    {
        //return $slug;
        $categories = Categorie::with('products')->where('slug', $slug)->first();
        //dd($categories);

        //sorting by asc,Desc
        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }

        if ($categories == null) {
            return view('FrontEnd.Layouts.errors.505');
        } else {
            if ($sort == 'priceAsc') { //if product is sort by offer price with ASC
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'ASC')->paginate(12);
            } elseif ($sort == 'priceDesc') { //if product is sort by Offer price with Desc
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('offer_price', 'DESC')->paginate(12);
            } elseif ($sort == 'discAsc') { //if product is sort by Discounted price with ASC
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'ASC')->paginate(12);
            } elseif ($sort == 'discDesc') { //if product is sort by Discounted price with Desc
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'DESC')->paginate(12);
            } elseif ($sort == 'titleAsc') { //if product is sort by Product Title with ASC
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'ASC')->paginate(12);
            } elseif ($sort == 'titleDesc') { //if product is sort by Product Title with Desc
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'DESC')->paginate(12);
            } else {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->paginate(12);
            }
        }
        $route = 'product-category';

        // moredata load with ajax

        if ($request->ajax()) {
            $view = view('FrontEnd.Layouts.categorizedProduct.singleProducts', compact('products'))->render();
            return response()->json(['html' => $view]);
        }

        return view('FrontEnd.Layouts.categorizedProduct.productCategory', compact('categories', 'route', 'products'));
    }

    public function productDetail($slug)
    {
        //dd($slug);
        $productDetails = Product::with('related_products')->where('slug', $slug)->first();
        //dd($productDetails);
        if ($productDetails) {
            return view('FrontEnd.Layouts.productDetails.productDetails', compact('productDetails'));
        } else {
            return view('FrontEnd.Layouts.errors.404');
        }
    }
}
