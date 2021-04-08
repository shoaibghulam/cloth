<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\logo;
use App\Models\Admin\Title;
use Validator;

class LogoController extends Controller
{
    //
    public function logo()
    {
        $logos=logo::first();
        return view('admin.pages.logo.logo',['logos'=>$logos]);
    }

    public function logo_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "image"=>"nullable|image"
        );
        $validator=Validator::make($controlls,$rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            if(isset($req->id)){
                $logo=logo::find($req->id);
    
            }else{
            $logo = new logo;
    
            }
            if ($req->hasFile('image')) {
                $file=$req->file('image');
                $filename=time().$file->getClientOriginalName();
                $path=public_path("/uploads/admins/logo/");
                $file->move($path,$filename);
                $logo->image =$filename;
                }
            $logo->save();
           // $req->session()->flash('status','Category Added Successfully');
           if(isset($req->id)){
           return redirect()->back()->withSuccess('Logo Updated Successfully');
           }
           return redirect()->back()->withSuccess('Logo Added Successfully');
    
            }
    }

    public function title()
    {
        $title=Title::first();
        $title1=Title::limit(1)->get();

        return view('admin.pages.title.title',['title'=>$title,'title1'=>$title1]);
    }

    public function title_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "title"=>"required|max:10"
        );
        $validator=Validator::make($controlls,$rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            if(isset($req->id)){
                $title=Title::find($req->id);
    
            }else{
            $title = new Title;
    
            }
            $title->title = $req->input('title');
            $title->save();
           // $req->session()->flash('status','Category Added Successfully');
           if(isset($req->id)){
           return redirect()->back()->withSuccess('Title Updated Successfully');
           }
           return redirect()->back()->withSuccess('Title Added Successfully');
    
            }
    }
}
