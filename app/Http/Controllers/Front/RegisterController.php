<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Crypt;
use Validator;
use App\Models\category;
use View;
use Hash;
use Str;
use Mail;
use DB;
use Carbon\Carbon; 
use App\Models\Admin\StoreInformation;
class RegisterController extends Controller
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
    function register()
    {
        return view('client.page.login');
    }

    function register_process(Request $req)
    {
       $controlls=$req->all();
        $rules=array(
            'fullname'=>"required|max:50",
            'Email'=>"required|unique:users,email|max:50",
            'Password'=>"required|max:12|min:8");

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else
        {
        $token = Str::random(60);
        DB::table('password_resets')->insert(
            ['email' => $req->Email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        DB::table('users')
        ->insert(['name' => $req->fullname,'email' => $req->Email,'password' =>bcrypt($req->Password), 'remember_token' => $token, 'created_at' => Carbon::now()]);
        Mail::send('client.page.verify-user',['token' => $token], function($message) use ($req,$token)   {
                  $message->from('harisahmedshaikh12@gmail.com');
                  $message->to($req->Email);
                  $message->subject('Email Verification Notification');
               });

        return back()->with('success', 'Successfully Sent Your Email Verification Link !');
        }

    }

    public function verification(){
        return view('client.page.verification');
    }
    public function verification_process(Request $request){
        $controlls=$request->all();
        $rules=array(
            "token"=>"required|exists:password_resets,token",
        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }else{
            $check=DB::table('password_resets')->where('token',$request->token)->first();
            $user=User::where('email',$check->email)->first();
            $user->email_verified_at=Carbon::now();
            $user->save();
            return redirect()->route('login');
        }
    }
    
}
