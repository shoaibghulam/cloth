<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Admin\StoreInformation;
class StoreInformationController extends Controller
{
    //
    public function index(){
        $information=StoreInformation::first();
        
        return view('admin.pages.information.storeinformation',['information'=>$information]);
    }
    public function store(Request $request){
        $controlls=$request->all();
        $rules=array(
            "phone"=>"required",
            "address"=>"required",
            "email"=>"required|email",
        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }else{
            if (isset($request->id)) {
            $delete=StoreInformation::where('id',$request->id)->delete();
            }
            $information=new StoreInformation;
            $information->phone=$request->phone;
            $information->email=$request->email;
            $information->address=$request->address;
            $information->save();
            if (isset($request->id)) {
            return redirect()->back()->withSuccess('Publisher Updated Successfully');
                
                }
            return redirect()->back()->withSuccess('Publisher Added Successfully');


        }
    }
}
