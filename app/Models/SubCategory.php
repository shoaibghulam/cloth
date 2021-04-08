<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor\Book;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

    public function books(){
        return $this->hasMany(Book::class,);
    }

    public function categoryy()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }
}
