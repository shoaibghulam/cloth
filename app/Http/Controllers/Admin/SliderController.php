<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;

use Validator;
class SliderController extends Controller
{
    //
    public function index(){

        $sliders=Slider::all();
    
        return view('admin.pages.slider.slider',['sliders'=>$sliders]);
    }

    public function slider_process(Request $request){
        $controlls=$request->all();
        
        $rules=array(
            "heading"=>"required|unique:sliders,heading,".$request->id,
            "subheading"=>"required|unique:sliders,subheading,".$request->id,
            "description"=>"required|unique:sliders,description,".$request->id,
            "file"=>"required_if:id,==,''|image",
        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            $controlls['error']='Eroor Occured';
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }else{
                    if ($request->id!='') {
                        $slider=Slider::find($request->id);
                        $slider->heading=$request->heading;
                        $slider->subheading=$request->subheading;
                        $slider->description=$request->description;
                        if ($request->hasFile('file')) {
                            $file=$request->file('file');
                            $fileName =uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                            $destinationPath = public_path('/uploads/images/');
                            $path=$file->move($destinationPath, $fileName);
                            $slider->file=$fileName;
                        }
                       
                        $slider->save();
            return redirect()->back()->withSuccess('Slide Updated Successfully');

                    }else{
                        $slider=new Slider;
                        $slider->heading=$request->heading;
                        $slider->subheading=$request->subheading;
                        $slider->description=$request->description;
                        $file=$request->file('file');
                        $fileName =uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path('/uploads/images/');
                        $path=$file->move($destinationPath, $fileName);
                        $slider->file=$fileName;
                        $slider->save();
            return redirect()->back()->withSuccess('Slide Added Successfully');

                    }        
        }
    }

    public function delete(Request $request){
        $delete=Slider::destroy($request->id);
        return response()->json(['success'=>'Slide Deleted Successfully...!']);
    }

}
