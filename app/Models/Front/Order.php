<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Nikolag\Square\Traits\HasProducts;

class Order extends Model
{
    use HasFactory, HasProducts;
    protected $table = 'order';

    public function orderdetail(){
        return $this->hasMany(OrderDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'customer_id','id');
    }
}
