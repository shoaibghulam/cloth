<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Admin\Promotion;

class PromotionController extends Controller
{
    //
    public function index(){
        $promotiondetail=Promotion::first();
        
        return view('admin.pages.promotion.promotion',['promotiondetail'=>$promotiondetail]);
    }

    public function promotion_process(Request $request){
        $controlls=$request->all();
        $rules=array(
            "promotioncode"=>"required",
            "startdate"=>"required",
            "enddate"=>"required",
            "discount"=>"required"

        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }else{
            if (isset($request->id)) {
            $delete=Promotion::where('id',$request->id)->delete();
            }
            $promotion=new Promotion;
            $promotion->promotioncode=$request->promotioncode;
            $promotion->startdate=$request->startdate;
            $promotion->enddate=$request->enddate;
            $promotion->discount=$request->discount;

            $promotion->save();
            if (isset($request->id)) {
            return redirect()->back()->withSuccess('Promotion Updated Successfully');
                
                }
            return redirect()->back()->withSuccess('Promotion Added Successfully');


        }
    }
    public function slider(){
        return view('admin.pages.slider.slider');
    }
}
