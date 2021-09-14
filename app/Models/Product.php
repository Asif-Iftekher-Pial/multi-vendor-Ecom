<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
