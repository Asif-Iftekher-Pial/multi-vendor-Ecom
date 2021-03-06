<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    
    protected $fillable = [
        'full_name',
        'username',
        'password',
        'photo',
        'phone',
        'address',
        'role',
        'status',
        'email',
        'password',
        'gender',

        'city',
        'country',
        'state',
        'postcode',
        'scity',
        'scountry',
        'sstate',
        'spostcode',
        'saddress',
    ];
    public function orderlist()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
