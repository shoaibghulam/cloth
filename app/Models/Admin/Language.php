<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor\Book;
class Language extends Model
{
    use HasFactory;
    public function books(){
        return $this->hasMany(Book::class,);
    }
}
