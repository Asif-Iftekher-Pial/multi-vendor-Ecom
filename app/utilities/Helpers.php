<?php

use App\Models\Product;
use App\Models\Settings;

class Helper{
    public static function userDefaultImage(){
        return asset('frontend/img/png/default.png');
    }

    public static function minPrice(){
        return floor(Product::min('offer_price'));
    }
    public static function maxPrice(){
        return floor(Product::max('offer_price'));
    }
}

//Settings info
if(!function_exists(('get_setting'))){
    function get_setting($key){
        return Settings::value($key);
    }
}