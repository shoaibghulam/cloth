<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function books(){
        return $this->hasMany(Book::class,);
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class,'category_id');
    }
}
