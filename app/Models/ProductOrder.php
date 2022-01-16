<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOrder extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'order_id',
        'quantity',
    ];
   
   
}
