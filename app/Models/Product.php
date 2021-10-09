<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'summary',
        'description',
        'stock',
        'cat_id',
        'photo',
        'price',
        'offer_price',
        'discount',
        'size',
        'conditions',
        'vendor_id',
        'status',
        'brand_id',
        'cat_id',
        'child_cat_id',
        'vendor_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function related_products()
    {
        return $this->hasMany(Product::class,'cat_id','cat_id')->where('status','active')->limit('10');
    }

    // cart controller 
    public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();  //self is a function that return data to its self model
    }
     
  

}
