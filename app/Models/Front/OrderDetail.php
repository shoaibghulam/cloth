<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use\app\Models\User;
use App\Models\Vendor\Book;



class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    public function order(){
        return $this->belongsTo(Order::class, 'order_id','id');
    }
    public function book(){
        return $this->belongsTo(Book::class, 'book_id','id');
    }
    
}
