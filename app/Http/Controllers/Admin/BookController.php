<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Language;
use App\Models\Admin\Publisher;
use App\Models\SubCategory;
use App\Models\Vendor\Book;
use App\Models\author;
use App\Models\category;

use setasign\Fpdi\Fpdi as FPDI;
use Auth;
use Validator;
class BookController extends Controller
{
    public function booklist(){
        $books=Book::with('subcategory','language','publisher','author','categoryy')->get();
        $languages=Language::all();
        $publishers=Publisher::all();
        $authors=author::all();
        $subcategories=SubCategory::all();
        $categories=category::all();
	    return view('admin.pages.book.book',['subcategories'=>$subcategories,'publishers'=>$publishers,'authors'=>$authors,'languages'=>$languages,'books'=>$books,'categories'=>$categories]);
    }
    public function change_book_status(Request $request){
        $book=Book::find($request->id);
        $book->status=$request->val;
        $book->save();
        return "Status Changed";
    }
}
