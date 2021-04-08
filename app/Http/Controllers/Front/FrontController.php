<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Language;
use App\Models\Admin\Publisher;
use App\Models\SubCategory;
use App\Models\Vendor\Book;
use App\Models\author; 
use App\Models\category;
use App\Models\Comment;
use App\Models\Wishlist;
use App\Models\Front\Rating;
use App\Models\Admin\Vendor;
use App\Models\Admin\Aboutus;
use App\Models\Admin\Terms;
use App\Models\Front\Order;
use App\Models\Front\OrderDetail;
use App\Models\Admin\Slider;
use App\Models\Vendor\Video;
use App\Models\Admin\Event;
use App\Models\Front\Cookie;
use App\Models\Admin\logo;


use Pusher\Pusher;


use ShoppingCart;

use App\Models\Admin\StoreInformation;

use DB;
use View;
use setasign\Fpdi\Fpdi as FPDI;
use Auth;
use Validator;
//use vendor;

class FrontController extends Controller
{
    //
    public function __construct(){
        // View::share('data',$data);
    }

   
    
    
    public function index(Request $request){

    
        $highest_price = Book::select(Book::raw('MIN(price) AS Min, MAX(price) AS Max'))->first();
        $books=Book::with('subcategory:id,name','language:id,name','publisher:id,name,company','vendor:id,firstname,lastname','subcategory.categoryy','rating');
        if ($request->category!='') {
            $category=$request->category;
            $books->whereHas('subcategory.categoryy',function($q) use ($category){
            $q->where('id',$category);
        });
        }
        if($request->price!=''){
            $str_arr = explode (",", $request->price);  
        $books->whereBetween('discounted_price',[$str_arr[0],$str_arr[1]]);
        }
        if($request->language!=''){
        
            $books->where('language_id',$request->language);
            }
            if($request->title!=''){
                
                $books->orderBy('title',$request->title);
                
                }
                if($request->publisher!=''){
        
                    $books->where('publisher_id',$request->publisher);
                    }
                    if($request->search!=''){
                        
                       $search= $request->search;
                    
            
                            $books->where('title','like','%'.$search.'%');
                            // ->orWhere('name','like','%'.$search.'%');
                        
                        }

                    

                            // dd( $request->all());
                    $books=$books->paginate(12);
                            
        $languages=Language::all();
        $publishers=Publisher::all();
        $authors=author::all();
        $subcategories=SubCategory::all();
        $book_counts=category::with(['subCategory'=>function($query){
        $query->withCount('books');
        }])->get();
        
        $publishers=Publisher::withCount('books')->get();
        $languages=Language::withCount('books')->get();
        
    
	return view('client.page.shop',['books'=>$books,'book_counts'=>$book_counts,'publishers'=>$publishers,'languages'=>$languages,'highest_price'=>$highest_price]);
    }
    public function product_detail($book_id){
        $book=Book::with('subcategory','language','publisher','vendor','comments','comments.user','rating.user')
        ->withCount('comments')->find($book_id);
        $rating=Rating::where('book_id',$book_id)->avg('rating');
        $related_books=Book::with('vendor')->where('sub_category_id',$book->sub_category_id)->take(5)->get();
        if (Auth::check()) {
            $forrating = OrderDetail::with('book','order:id,customer_id')->whereHas('order',function ($query) {
                $query->where('customer_id', Auth::user()->id);
                    })->where('book_id',$book_id)->first();
        }else{
            $forrating='error';
        }
         

	return view('client.page.productdetail',['productdetail'=>$book,'ratings'=>$rating,'related_books'=>$related_books,'check_rating'=>$forrating]);

    }

    public function author_detail($id){


        $books=Book::with('vendor')->where('vendor_id',$id)->paginate(3); 
	return view('client.page.author',['books'=>$books]);

    }

    public function subcat_detail($id){


        $books=Book::with('vendor')->where('sub_category_id',$id)->paginate(3);

        return view('client.page.subcategories',['books'=>$books]);
    
        }

    public function home()
    {
        $Entertainments=Book::with('subcategory','language','publisher','author','subcategory.categoryy')->whereHas('subcategory.categoryy',function($query){
            $query->where('name','Entertainment');
        })->get();
        $Horrors=Book::with('subcategory','language','publisher','author','subcategory.categoryy')->whereHas('subcategory.categoryy',function($query){
            $query->where('name','Horror');
        })->get();
        $history=Book::with('subcategory','language','publisher','author','subcategory.categoryy')->whereHas('subcategory.categoryy',function($query){
            $query->where('name','Programming');
        })->get();
       $book = Book::with('subcategory','language','publisher','author','subcategory.categoryy')->get();
       $discount_books=Book::with('subcategory','language','publisher','author','subcategory.categoryy')->where('discount','<>','NULL')->orderBy('id','DESC')->skip(0)->take(10)->get();
        
      

     // $cartData = session()->get('cart');
      $items = ShoppingCart::all();
     //$total = ShoppingCart::total();
      $slider = Slider::all();


      //$authorss = Vendor::all();
      $authorss = Vendor::limit(5)->get();
      $video = Video::limit(5)->get();
      $event = Event::all();
      $logo = logo::all();

      return view('client.page.home',['books'=>$book,'entertainment_books'=>$Entertainments,'history_books'=>$history,'discount_books'=>$discount_books,'items'=>$items,'slider'=>$slider,'authorss'=>$authorss,'video'=>$video,'event'=>$event,'logo'=>$logo]);
    }

    public function book_sort(Request $request){
        $sort=$request->sort_by;
        $column=$request->column;

        if ($sort !='' && $column!='') {
            $books=Book::with('subcategory:id,name','language:id,name','publisher:id,name,company','author:id,firstName,lastName')->orderBy($column,$sort)->paginate(2);

        }
       

        return view('client.page.loadbooks',['books'=>$books]);
    }
    public function comment(Request $req)
    { 
        $controlls=$req->all();
        $rules=array(
            'message'=>"nullable|max:100",
            "rating"=>"nullable",
            );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
            if (isset($req->message)) {
                $comment = Comment::where('user_id',auth()->user()->id)->where('book_id',$req->id)->first();
        if($comment)
        {  
            $comment->comment=$req->input('message');
            $comment->save();
        }
        
        else{
            $comment = new Comment;
            $comment->user_id = Auth::user()->id;
            $comment->book_id = $req->input('id');
            $comment->status = 1;
            $comment->comment = $req->input('message');
            $comment->save();
        }
        
            }
        if (isset($req->rating)) {
        

        $rating=Rating::where('user_id',auth()->user()->id)->where('book_id',$req->id)->first();
        $rating;
        if ($rating) {
            $rating->rating = $req->input('rating');
            $rating->save();
        }else{
        $rating = new Rating;
        }
        $rating->user_id = Auth::user()->id;
        $rating->book_id = $req->input('id');
        $rating->status = 1;
        $rating->rating = $req->input('rating');
        $rating->save();
    }

        return response()->json(['message'=>'Review  Added Successfully']);
    }
        
    }

    public function rating(Request $req)
    {
        $rating = new Rating;
        $rating->user_id = Auth::user()->id;
        //$comment->book_id = book()->id;
        $rating->book_id = $req->input('id');


        $rating->status = 1;
        $rating->rating = $req->input('star');
        $rating->save();
        return redirect()->back()->withSuccess('Rating Added Successfully');

    }

    public function whishlist()
    {
        
        $whishlistdetail=Wishlist::with('book','user')->where('user_id',Auth::user()->id)->get();
        //$wishlistCount = DB::table('wishlists')->where('user_id',Auth::user()->id)->count();
        //dd($wishlistCount);

        return view('client.page.whishlist',['whishlistdetail'=>$whishlistdetail]);
       // dd($whishlistdetail);
    }
    public function whishlist_process(Request $req)

    {
        if (Auth::check()) {
        $find=Wishlist::where('user_id',Auth::user()->id)->where('book_id',$req->id)->get();
        // $find=Wishlist::with('book','user')->where('user_id',Auth::user()->id)->count()->where('book_id',$req->id)->get();

        if (!$find->count()>0) {
            $whishlist = new Wishlist;
            $whishlist->user_id = Auth::user()->id;
            $whishlist->book_id = $req->input('id');
            $whishlist->save();
        return response()->json(['success'=>'Data is successfully added']);
        }else{
        return response()->json(['already'=>'Book already Exist in Whishlist']);

        }
        
    }else{
        return response()->json(['error'=>'Login First...!']);

    }
       
    }

    public function whishlist_count()
    {
        $whishlistcount = Wishlist::with('book','user')->where('user_id',Auth::user()->id)->count();
    
    }

    function deleteWhishlist($id)
    {
        //$deleteWhish = Wishlist::find($id)->where('user_id',Auth::user()->id)->get();
        $deleteWhish = Wishlist::where('user_id',Auth::user()->id)->get()->find($id);

        $deleteWhish->delete();
        return response()->json(['success'=>'Record has been deleted']);

    }

    function seeEye($id)
    {
        $seeeye = Book::find($id);
       // return view('admin.pages.category.list',['data'=>$data]);
        return response()->json($seeeye);
    }

    public function about()
    {
        $about = Aboutus::all();
        return view('client.page.about',['aboutus'=>$about]);
    }

    public function term()
    {
        $terms = Terms::all();
        return view('client.page.termsandcondition',['terms'=>$terms]);
    }

    public function details($id)
    {
        $custorderdetails = Order::with('orderdetail')->where('customer_id',Auth::user()->id)->find($id);
        //dd($custorderdetails);
        return view('client.page.orderdetails',['custorderdetails'=>$custorderdetails]);

    }

    public function reader($id){
        $book = OrderDetail::with('book','order')->whereHas('order',function ($query) {
        
        
    $query->where('customer_id', Auth::user()->id);
        })->where('book_id',$id)->first();
        $user=Auth::user()->id;
        $bookmark = Cookie::where(['user_id'=>$user,'book_id'=>$id])->latest()->first();
        $page_no=1;
        if(is_object($bookmark)){
            $page_no=$bookmark->pageno;
            //dd($page_no);
        }
        
        
        return view('client.page.reader',['book'=>$book,'id'=>$id,'page_no'=>$page_no]);
    }
    
   
    public function pusher(){
        
    }

    public function authorprofile()
    {
        $authorss = Vendor::paginate(12);
        //$authorss = Vendor::limit(10)->get();
        return view('client.page.authorlist',['authorss'=>$authorss]);

    }

    public function authorprofiledetails($id)
    {
        $authorss = Vendor::with('video','book')->where('id',$id)->first();
        //dd($authorss);
        //all()->find($id);
        //$authorss = Video::with('vendor')->where('vendor_id',$id)->get();

        //dd($authorss);

        //$a = Video::with('vendor')->find($id);
        //dd($a);
        //$videolist = Video::find($id);
        // dd($authorss[0]['vendor']->image);
        //return view('client.page.authorprofiledetails',['authorss'=>$authorss,'videolist'=>$videolist]);
        return view('client.page.authorprofiledetails',['authorss'=>$authorss]);
    }

    public function authorvideos()
    {
        $video = Video::paginate(12);
        return view('client.page.authorsvideos',['video'=>$video]);
    }

    public function eventdetails($id)
    {
        $details = Event::find($id);
        return view('client.page.eventdetails',['details'=>$details]);
    }
    
    


    

}