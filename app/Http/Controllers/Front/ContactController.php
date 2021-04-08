<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\category;
use App\Models\Front\Contact;
use View;
use Validator;
use App\Models\Admin\StoreInformation;


class ContactController extends Controller
{
    //
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

    public function contact()
    {
        return view('client.page.contact');
    }

    public function contact_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            'name'=>"required|max:50",
            'email'=>"required|max:50",
            'message'=>"required|max:500"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
            $contacts = new Contact;
            $contacts->name = $req->input('name');
            $contacts->email = $req->input('email');
            $contacts->message = $req->input('message');
            $contacts->save();
            return redirect()->back()->withSuccess('Thanks For Contact Us !');



        }
    }
}
    
