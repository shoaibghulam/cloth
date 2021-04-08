<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $table = 'cart_details';


    public function cart()
    {
        return $this->belongsTo(Cart::class,'cart_id','id');
    }
}
