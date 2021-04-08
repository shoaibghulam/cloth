<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Front\Cookie;
use Auth;

class CookieController extends Controller
{
    //
    public function setCookie(Request $request) {
        $minutes = 1;
        $response = new Response('Hello World');
        $response->withCookie(cookie('name', 'haris123', $minutes));
        return $response;
     }
     public function getCookie(Request $request) {
        $value = $request->cookie('name');
        echo $value;
     }

     public function setbookmark(Request $req)
     {
      // $mark = Cookie::where('user_id',auth()->user()->id)->where('book_id',$req->id)->first();
      // if($mark)
      // {  
      //    $mark->pageno = $req->input('pageno');
      //    $mark->save();
      //    return redirect()->back()->withDanger('Already In Bookmark !');

      // }
        
      // else{
        $bookmark = new Cookie;
        //dd($req->id);
        $bookmark->user_id = Auth::user()->id;
        $bookmark->book_id = $req->input('id');
        $bookmark->pageno = $req->input('pageno');
        $bookmark->save();

        return redirect()->back()->withSuccess('Save To Bookmark !');
      //}
     }
}
