<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor\Book;

class author extends Model
{

    use HasFactory;
    protected $table = 'authors';
    public function books(){
        return $this->hasMany(Book::class,);
    }
}
