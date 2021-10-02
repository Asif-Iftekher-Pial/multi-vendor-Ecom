<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable=[
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
        'email',
        'phone',
        'country',
        'address',
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

    ];
}
