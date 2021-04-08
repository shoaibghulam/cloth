<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\category;

use Validator;



class SubCategoryController extends Controller
{
    //
    function subcategory()
    {
        $categories = category::all();
        $subcategories = SubCategory::with('categoryy')->whereHas('categoryy')->get();
      //  dd($subcategories);

       // $subcategories = SubCategory::all();

        return view('admin.pages.subcategory.list',['categories'=>$categories,'subcategories'=>$subcategories]);
    }
    

    // function subcategory1()
    // {
    //     $data = SubCategory::all();
    //     return view('admin.pages.subcategory.list',['data'=>$data]);
    // }

    function subcat_process(Request $req)
    {
        // $validatedData = $req->validate([
        //     'category' => 'required',
        //     'sub_cat' => 'required'

        // ]);
        $controlls=$req->all();
        $rules=array(
            "category"=>"required",
            "sub_cat"=>"required|unique:sub_categories,name"

        );
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        $subcat = new SubCategory;

        $subcat->category_id = $req->input('category');
        $subcat->name = $req->input('sub_cat');

        $subcat->save();
       // $req->session()->flash('status','Category Added Successfully');
       return redirect()->back()->withSuccess('Sub Category Added Successfully');
        }

       // return redirect('authorlist');

    }

    function deletesubCat($id)
    {
        $deletesubCat = SubCategory::find($id);
        $deletesubCat->delete();
        return response()->json(['success'=>'Record has been deleted']);

    }

    function editsubCat($id)
    {
        $editsubCat = SubCategory::find($id);
       // return view('admin.pages.category.list',['data'=>$data]);
        return response()->json($editsubCat);
    }

    function updatesubCat(Request $req)
    {
        // $validatedData = $req->validate([
        //     'sub_cat' => 'required'
        // ]);
        $controlls=$req->all();
        $rules=array(
            "category_edit"=>"required",
            "sub_cat_edit"=>"required|unique:sub_categories,name,".$req->id,

        ); 
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        $updatesubCat = SubCategory::find($req->id);
        $updatesubCat->category_id = $req->input('category_edit');
        $updatesubCat->name = $req->input('sub_cat_edit');
        $updatesubCat->save();

        return redirect()->back()->withSuccess('Sub Category Updated Successfully');
        }


    }

}
