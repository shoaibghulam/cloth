<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthorLoginController extends Controller
{
    //
    public function login()
    {
        return view('author.auth.login');
    }

    public function attempt(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "email"=>"required|exists:authorsses,email",
            "password"=>"required"
        );
        $message=array(
            "email.exists"=>"Email Does Not Exists",
        );
        $validator=Validator::make($controlls,$rules,$message);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else
        {
            $credentials=['email'=>$req->email,'password'=>$req->password];
            if(!Auth::guard('author')->attempt($credentials)){
                return redirect()->route('author.auth.login')->withErrors(['error'=>"Invalid Credentials"]);
            }else{
                return redirect()->route('author.detaillist');    

            }
        }
    }
    public function logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('author.auth.login');
    }
    public function details()
    {
        return view('author.pages.detail.details');
    }
}
