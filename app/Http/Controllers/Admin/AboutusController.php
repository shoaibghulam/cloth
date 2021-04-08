<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Aboutus;
use Validator;

class AboutusController extends Controller
{
    //
    
    public function index(){
        $aboutus=Aboutus::first();
        return view('admin.pages.about.aboutus',['about'=>$aboutus]);
    }
    function aboutus_process(Request $req)
    {
        
        $controlls=$req->all();
        $rules=array(
            "aboutus"=>"required|min:100"
        );
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        if(isset($req->id)){
            $aboutus=Aboutus::find($req->id);

        }else{
        $aboutus = new Aboutus;

        }
        $aboutus->about = $req->input('aboutus');
        $aboutus->save();
       // $req->session()->flash('status','Category Added Successfully');
       if(isset($req->id)){
       return redirect()->back()->withSuccess('About Information Updated Successfully');
       }
       return redirect()->back()->withSuccess('About Information Added Successfully');

        }

       // return redirect('authorlist');

    }

}
