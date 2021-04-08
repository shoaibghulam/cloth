<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\category;
use App\Models\Front\Order;
use App\Models\Front\OrderDetail;
use Pusher\Pusher;
use View;
use ShoppingCart;
use Auth;
use Nikolag\Square\Facades\Square;
use Nikolag\Square\Models\Customer;
use App\Models\Notifications;

use App\Models\Admin\StoreInformation;
use Illuminate\Notifications\Notification;

class CheckoutController extends Controller
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
    public function checkout()
    {
        $items = ShoppingCart::all();
        return view('client.page.checkout',['items'=>$items]);
    }
    public function checkout_process(Request $req)
    {
        \Stripe\Stripe::setApiKey("sk_test_51HxAkBKbaIfEXQWdQgXuIYywIco6Ejr6zFFDTw2TAmZIbdCRwA60YuX8JappWOaPgD8EUcP3xt2t1uk49ikSdgA000qqpkLDQf");
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' =>$req->amount,
            'currency' => 'usd',
            'description' => 'Example',
            'source' => $token,

            

        ]);
        $order = new Order;
        $order->status = 1;
        $order->customer_id = Auth::user()->id;
        $order->amount = substr($req->amount,0,-2);
        $order->save();

        $orderDetail = new OrderDetail;
        $items = ShoppingCart::all();
        $users=array();
        foreach($items as $item){
            
            $orderDetail->order_id = $order->id;
            $orderDetail->book_id = $item->id;
            $orderDetail->price = $item->price;
            $orderDetail->qty = $item->qty;
            $orderDetail->discount = $item->discount;
            $orderDetail->save(); 
            $users[]=$item->vendor_id;
        }
            

        ShoppingCart::destroy();
        $users=array_unique($users);
            foreach($users as $user){
                $notification=new Notifications();
                $notification->sender_id=Auth::user()->id;
                $notification->sender_name=Auth::user()->name;
                $notification->reciever_id=$user;
                $notification->message="New Order";
                $notification->type='order';
                $notification->save();
                $detail=array('sender_id'=>Auth::user()->id,'sender_name'=>Auth::user()->name,'reciever_id'=>$user);
                $options = array(
                    'cluster' => 'ap2',
                    'useTLS' => true
                  );
                  $pusher = new Pusher(
                    'd7e7e57a6931e6dc484e',
                    '53bd3ad79dc7fe83763e',
                    '1081528',
                    $options
                  );
                
                
                  $pusher->trigger('my-channel', 'my-event', $detail);
            }
           
        
        return redirect()->back()->withSuccess('Payment Successfully Added');


    }
    public function paySquare()
    {
        return view('client.page.squareup');
    }

    public function withSquare($nonce){
        $order = new Order;
        $order->status = 1;
        $order->customer_id = Auth::user()->id;
        $order->amount = round(ShoppingCart::total()*100,0);
        $order->total = round(ShoppingCart::total()*100,0);
        $order->save();
        
        $square = Square::setOrder($order, env('SQUARE_LOCATION'));
        
        $orderDetail = new OrderDetail;
        $items = ShoppingCart::all();
        $users=array();
        foreach($items as $item){
            $square->addProduct([
                "id" => $item->id,
                "name" => "book",
                "price" => round($item->price*100, 2),
                "quantity" => $item->qty
            ], $item->qty);
            $orderDetail->order_id = $order->id;
            $orderDetail->book_id = $item->id;
            $orderDetail->price = $item->price;
            $orderDetail->qty = $item->qty;
            $orderDetail->discount = $item->discount;
            $orderDetail->save(); 
            $users[]=$item->vendor_id;
        }
        $square->charge([
            "amount" => $order->total,
            "source_id" => $nonce,
            "location_id" => env('SQUARE_LOCATION')
        ]);
        $order->total = round(ShoppingCart::total(), 2);
        $order->save();
        $order = $square->getOrder();

        ShoppingCart::destroy();
        $users=array_unique($users);
        foreach($users as $user){
            $notification=new Notifications();
            $notification->sender_id=Auth::user()->id;
            $notification->sender_name=Auth::user()->name;
            $notification->reciever_id=$user;
            $notification->message="New Order";
            $notification->type='order';
            $notification->save();
            $detail=array('sender_id'=>Auth::user()->id,'sender_name'=>Auth::user()->name,'reciever_id'=>$user);
            $options = array(
                'cluster' => 'ap2',
                'useTLS' => true
                );
                $pusher = new Pusher(
                'd7e7e57a6931e6dc484e',
                '53bd3ad79dc7fe83763e',
                '1081528',
                $options
                );
            
            
                $pusher->trigger('my-channel', 'my-event', $detail);
        }
           
        //return response()->json($order, 200);
        return redirect()->back()->withSuccess('Payment Successfully Added');
    }

    public function paypal_payment()
    {
        $total=0;
        $order = new Order;
        $order->status = 1;
        $order->customer_id = Auth::user()->id;
        $order->amount = 0;
        $order->save();

        $orderDetail = new OrderDetail;
        $items = ShoppingCart::all();
        $users=array();
        foreach($items as $item){

            $total+=$item->price-($item->discount/100)*$item->price;
            
            $orderDetail->order_id = $order->id;
            $orderDetail->book_id = $item->id;
            $orderDetail->price = $item->price;
            $orderDetail->qty = $item->qty;
            $orderDetail->discount = $item->discount;
            $orderDetail->save(); 
            $users[]=$item->vendor_id;
            }
            $order = Order::find($order->id);
            $order->amount=$total;
            $order->save();

        ShoppingCart::destroy();
        $users=array_unique($users);
            foreach($users as $user){
                $notification=new Notifications();
                $notification->sender_id=Auth::user()->id;
                $notification->sender_name=Auth::user()->name;
                $notification->reciever_id=$user;
                $notification->message="New Order";
                $notification->type='order';
                $notification->save();
                $detail=array('sender_id'=>Auth::user()->id,'sender_name'=>Auth::user()->name,'reciever_id'=>$user);
                $options = array(
                    'cluster' => 'ap2',
                    'useTLS' => true
                  );
                  $pusher = new Pusher(
                    'd7e7e57a6931e6dc484e',
                    '53bd3ad79dc7fe83763e',
                    '1081528',
                    $options
                  );
                
                
                  $pusher->trigger('my-channel', 'my-event', $detail);
                  return redirect()->route('/');         

                //   return redirect('/');

    }
}
public function squareup()
{
    return view('client.page.squareup');
}
}