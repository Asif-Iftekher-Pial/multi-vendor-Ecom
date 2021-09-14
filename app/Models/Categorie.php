<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','photo','is_parent','summary','parent_id','status'];


    public static function shiftChild($cat_id){
        return Categorie::whereIn('id',$cat_id)->update(['is_parent'=>1]); // চাইল্ড আইডি প্যারেন্ট আইডির ভ্যালু 1  তে আপডেট হবে ,তার মানে হচ্ছে চাইল্ড আইডি শিফট করে প্যারেন্ট আইডি হবে
    }

    public static function getChildByParentID($id){
        return Categorie::where('parent_id',$id)->pluck('title','id'); //প্যারেন্ট আইডির সাথে যেই চাইল্ড আইডী আছে সেটার নাম আর আইডী শূধু রিট্রিভ করবে pluck method এর মাধ্যমে
    }

    public function products()
    {
        return $this->hasMany(Product::class,'cat_id','id');
    }
}
