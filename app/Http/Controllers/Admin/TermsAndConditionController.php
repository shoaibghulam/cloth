<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Terms;
use Validator;

class TermsAndConditionController extends Controller
{
    //
    public function index(){
        $terms=Terms::first();
        return view('admin.pages.terms.termsandcondition',['term'=>$terms]);
    }
    function terms_process(Request $req)
    {
        
        $controlls=$req->all();
        $rules=array(
            "term"=>"required|min:100"
        );
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        if(isset($req->id)){
            $termadd=Terms::find($req->id);

        }else{
        $termadd = new Terms;

        }
        $termadd->term = $req->input('term');
        $termadd->save();
       // $req->session()->flash('status','Category Added Successfully');
       if(isset($req->id)){
       return redirect()->back()->withSuccess('Terms Information Updated Successfully');
       }
       return redirect()->back()->withSuccess('Terms Information Added Successfully');

        }

       // return redirect('authorlist');

    }

}
