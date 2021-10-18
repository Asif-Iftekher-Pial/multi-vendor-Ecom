<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'rate',
        'review',
        'reason',
        'status',
    ];
    public function reviewproducts(){
        return $this->hasMany(User::class,'id','user_id')->where('status','active');
    }
}
