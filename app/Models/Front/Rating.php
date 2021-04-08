<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class,'book_id','id');
    }

}
