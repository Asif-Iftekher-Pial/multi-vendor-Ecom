<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone',
        'amount',
        'address',
        'status',
        'transaction_id',
        'currency',

        'user_id',
        'order_number',
        'product_id',
        'sub_total',
        'total_amount',
        'coupon',
        'delivery_charge',
        'quantity',
        'first_name',
        'last_name',
        'country',
        'city',
        'state',
        'note',
        'sfirst_name',
        'slast_name',
        'semail',
        'sphone',
        'scountry',
        'saddress',
        'scity',
        'sstate',
        'payment_method',
        'payment_status',
        'condition'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_orders')->withPivot('quantity');
    }

   
    public function myorderlist()
    {
        return $this->hasMany(ProductOrder::class, 'order_id', 'id');  //order detail_id is from order table column and id is from orderdetail table 
    
    }
}
