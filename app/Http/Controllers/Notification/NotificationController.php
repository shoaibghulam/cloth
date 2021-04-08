<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;
use Auth;
use Illuminate\Support\Carbon;
class NotificationController extends Controller
{
    //
    public function vendor_notification(){
        
        $nofications=Notifications::where('reciever_id',Auth::guard('vendor')->user()->id)->get();
        return response()->json(['notifications'=>$nofications]);
    }
    public function read_notification(){
        $read=Notifications::where('reciever_id',Auth::guard('vendor')->user()->id)->update(['read_at'=>Carbon::now()]);
        return response()->json(['message'=>"Notification Readed Successfully...!"]);
        
    }
}
