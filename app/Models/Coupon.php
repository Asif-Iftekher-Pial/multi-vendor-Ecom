<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'type',
        'status',
        'value'
    ];

    public function discount($total)
    {
        return $total;
    }
}
