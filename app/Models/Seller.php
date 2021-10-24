<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $guard='sellers';
    protected $fillable=[
        'full_name',
        'username',
        'photo',
        'gender',
        'phone',
        'address',
        'status',
        'email',
        'email_verified_at',
        'password',
    ];


}
