<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Categorie;
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
    }

}
