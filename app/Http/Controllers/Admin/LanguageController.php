<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Admin\Language;
class LanguageController extends Controller
{
    //
    public function languages(){
        $languages=Language::all();
        if ($languages) {
            $languages=['languages'=>$languages];
        }else{
            $languages=['message'=>"Language Not Available"];
        }
	return view('admin.pages.language.list',['languages'=>$languages]);

    }
    public function addlanguage(Request $request){
        $controlls=$request->all();
            $rules=array(
                'name'=>"required|unique:languages,name|max:50",
                "language_code"=>"required|unique:languages,language_code|max:4|min:2");
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($controlls);
                
            }
            else{
                    $language=new Language;
                    $language->name=$request->name;
                    $language->language_code=$request->language_code;
                    $language->save();
                    return redirect()->back()->withSuccess('Language Added Successfully...!');
               
            }
    }

    public function editlanguage(Request $request){
        $id=$request->id;
        $language=Language::find($id);
        return $language;
    }
    public function updatelanguage(Request $request){
        $controlls=$request->all();
            $rules=array(
                'name_edit'=>"required|max:50|unique:languages,name,".$request->id,
                "language_code_edit"=>"required|max:4|min:2|unique:languages,language_code,".$request->id);
        
      
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput($controlls);
                
            }
            else{
        
                    $language=Language::find($request->id);
                    $language->name=$request->name_edit;
                    $language->language_code=$request->language_code_edit;
                    $language->save(); 
                    return redirect()->back()->withSuccess('Language Updated Successfully...!');
               

            }
    }

    public function deletelanguage(Request $request){
        $controlls=$request->all();
        $rules=array(
            "id"=>"required|exists:languages,id",
        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }else{
            $language=Language::find($request->id);
            $language->delete();
            return response()->json(['message'=>"Lanuguage Deleted Successfully...!"]);
        }
    }
}
