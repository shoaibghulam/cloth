<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Wishlist;
use Nikolag\Square\Traits\HasCustomers;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasCustomers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function comment()
    {
        return $this->hasMany(Comment::class,'user_id');
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class,'user_id','id');
    }
    public function order()
    {
        return $this->hasMany(Order::class,'customer_id','id');
    }
}
