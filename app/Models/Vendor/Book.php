<?php

namespace App\Models\Vendor;

use App\Models\Admin\Language;
use App\Models\Admin\Publisher;
use App\Models\author;
use App\Models\Comment;
use App\Models\Front\Rating;
use App\Models\SubCategory;
use App\Models\category;
use App\Models\Wishlist;
use App\Models\Admin\Vendor;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Book extends Model
{
    use HasFactory;
    public function author(){
        return $this->belongsTo(author::class,'author_id','id');
    }
    public function language(){
        return $this->belongsTo(Language::class,'language_id','id');
    } public function publisher(){
        return $this->belongsTo(Publisher::class,'publisher_id','id');
    } public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
    public function categoryy(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function rating(){
        return $this->hasMany(Rating::class);
    }
    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }
   
    
}
