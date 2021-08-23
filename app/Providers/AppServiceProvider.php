<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        $total_banners=Banner::count();
        View::share('total_banners',$total_banners);
        
        $total_categories=Categorie::count();
        View::share('total_categories',$total_categories);
        
        $tottal_brands=Brand::count();
        View::share('tottal_brands',$tottal_brands);

        $tottal_products=Product::count();
        View::share('tottal_products',$tottal_products);
    }

}
