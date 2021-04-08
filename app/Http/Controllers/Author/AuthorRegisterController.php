<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author\Authorss;
use Validator;

class AuthorRegisterController extends Controller
{
    //
    public function register()
    {
        return view('author.auth.register');
    }

    public function register_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "name"=>"required",
            "email"=>"required|unique:authorsses,email",
            "password"=>"required|min:8"
        );
        $validator=Validator::make($controlls,$rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else
        {
            $register = new Authorss;
            $register->name = $req->input('name');
            $register->email = $req->input('email');
            $register->password = bcrypt($req->input('password'));
            $register->save();

            return redirect()->back()->withSuccess('Author Registered Successfully');
        }
        
    }
}
