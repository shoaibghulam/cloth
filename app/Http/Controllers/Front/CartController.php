<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\category;
use App\Models\Front\Cart;
use App\Models\Vendor\Book;
use App\Models\Admin\Vendor;

use View;
use Auth;
use Session;
use ShoppingCart;

use App\Models\Admin\StoreInformation;



class CartController extends Controller
{
    //
    // public function __construct(){
    //     $showCategory = category::with('subCategory')->get();

    //     View::share('categories',$showCategory);
    // }

    public function __construct(){
        $showCategory = category::with('subCategory')->get();
        if (!empty($showCategory)) {
            $showCategory=$showCategory;
        }else{
            $showCategory='null';
        }
        $information=StoreInformation::first();

        if (!empty($information)) {
            $information=$information;
        }else{
            $information='null';
        }
        $data=['categories'=>$showCategory,'information'=>$information];
    
        View::share('data',$data);
    }

    public function cart()
    {
       
       $items = ShoppingCart::all();
       return view('client.page.cart',['items'=>$items]);
    }

    public function cart_process(Request $req){

        $items = ShoppingCart::all();
        $true=true;
        foreach($items as $item){
            if($req->id==$item->id){
                $true=false;
                return response()->json(['message'=>"Already In Cart...!"]); 
            }
        }
   if($true==true){
   

    $vendor=Book::find($req->id);
    $qty = 1;
   $price=$req->price;
   $return_price=$req->price-($req->discount/100)*$req->price;
   $row = ShoppingCart::add($req->id,$req->name,$qty,$price,['image'=>$req->image,'discount'=>$req->discount,'vendor_id'=>$vendor->vendor_id]);
   return response()->json(['success'=>"Added Succesfully...!",'total'=>$return_price]);
  

   }
   
   

//    if($req->id == unique)
//    {
//        return '0';
//    }
  //dd($row);
  // $rawId = $row->rawId();
   
//    return $rawId;
   //dd(ShoppingCart::all());
   //dd(ShoppingCart::get($rawId));
  


      //  dd($req);
    //   if(Auth::user())
    //   {
    //       dd($req);
    //       $cartAdd = new Cart;
    //       $cartAdd->user_id = Auth::user()->id;
    //       $cartAdd->save();
          
    //       return response()->json(['success'=>'Data is successfully added']);


    //   }
    //   else{
    //     $id = $req->id;
    //     $product = Book::find($id);
    //     if(!$product){
    //         return redirect('login');
    //     }
    //     $cart = session()->get('cart');
    //     if(!$cart){
    //         $cart = [
    //             $id => [
    //                 'name' => $product->name,
    //                 'quantity' => '1',
    //                 'price' => $product->price,
    //                 'image' => $product->image

    //             ]
    //             ];
    //             session()->put('cart',$cart);

    //             dd(session()->put('cart',$cart));
                
    //            return response()->json(['success'=>'Data is successfully added']);
    //     }
    //     if(isset($cart[$id])){
    //         $cart[$id]['quantity']++;
    //         session()->put('cart',$cart);
    //         return response()->json(['success'=>'Data is successfully added']);
    //     }
    //     $cart[$id] = [
    //         'name' => $product->name,
    //         'quantity' => '1',
    //         'price' => $product->price,
    //         'image' => $product->image

    //     ];
    //     session()->put('cart',$cart);
    //     return response()->json(['success'=>'Data is successfully added']);
    // }
    


    }
    function deleteCart($raw_id)
    {
    
        $deletecart=ShoppingCart::remove($raw_id);
        return response()->json(['success'=>'Record has been deleted']);



        //$cartData = session()->get('cart');
        // $cartDelete = session::forget('cart', $id)->first();
        // $cartDelete->destroy($id);

        // $deletesubCat = SubCategory::find($id);
        // $deletesubCat->delete();
        

    }

    public function subcat_cart_detail(){


        
    
        }
}
