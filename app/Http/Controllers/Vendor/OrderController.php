<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Front\OrderDetail;
use App\Models\Front\Order;

use Illuminate\Http\Request;
use Auth;
class OrderController extends Controller
{
    //
    public function order_list(){
        $orders=Order::with('orderdetail','orderdetail.book','user')->whereHas('orderdetail.book',function($query){
        $query->where('vendor_id',Auth::guard("vendor")->user()->id);
        })->get();
        // $orders=OrderDetail::with('book','order',)->groupBy('order_id')->whereHas('book',function($query) {
        // $query->where('vendor_id',Auth::guard("vendor")->user()->id);
        // })->get();
        // dd($orders);
        
        return view("vendor.pages.order.list",['orders'=>$orders]);
    }
    public function orderdetails_list($id)
    {
       $orderdetails=Order::with('orderdetail','orderdetail.book')->whereHas('orderdetail.book',function($query){
       $query->where('vendor_id',Auth::guard("vendor")->user()->id);})->find($id);

       //dd($orderdetails);
        return view('vendor.pages.orderdetails.list',['orderdetails'=>$orderdetails]);
    }
} 
