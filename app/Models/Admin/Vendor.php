<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Vendor\Book;
use App\Models\Vendor\Video;


class Vendor extends Authenticatable
{
    use HasFactory;
    protected $table = 'vendors';
    public function book(){
        return $this->hasMany(Book::class,'vendor_id','id');
    }
    public function video()
    {
        return $this->hasMany(Video::class,'vendor_id','id');
    }
}
