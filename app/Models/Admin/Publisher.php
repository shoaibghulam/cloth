<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor\Book;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    public function books(){
        return $this->hasMany(Book::class,);
    }
}
