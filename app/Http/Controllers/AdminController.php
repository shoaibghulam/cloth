<?php

namespace App\Http\Controllers;

use Crypt;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\AdminRegister;


class AdminController extends Controller
{
    //
    function index()
    {
        return view('admin.pages.dashboard');
    }

    function category()
    {
        $data = category::all();
        return view('admin.pages.category.list',['data'=>$data]);
    }

    function category_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "category"=>"required|unique:categories,name",
        );
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
            $category = new category;

            $category->name = $req->input('category');
            $category->save();
           // $req->session()->flash('status','Category Added Successfully');
           return redirect()->back()->withSuccess('Category Added Successfully');
        }
       

       

    }

    function deleteCategory($id)
    {
        $deleteCat = category::find($id);
        $deleteCat->delete();
        return response()->json(['success'=>'Record has been deleted']);

    }

    function editCategory($id)
    {
        $editcat = category::find($id);
       // return view('admin.pages.category.list',['data'=>$data]);
        return response()->json($editcat);
    }

    function updateCategory(Request $req)
    {
        $controlls=$req->all();
      $rules=array(
          "category_edit"=>"required|unique:categories,name,".$req->id,
      );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
            $updatecat = category::find($req->id);
            $updatecat->name = $req->input('category_edit');
            $updatecat->save();
    
            return redirect()->back()->withSuccess('Category Updated Successfully');
        }
       


    }

    function register()
    {
       return view('admin.auth.register');
    }

    function register_process(Request $req)
    {
        $register = new AdminRegister;

        $register->name = $req->input('name');
        $register->email = $req->input('email');
        $register->password = Crypt::encrypt ($req->input('pass'));

        $register->save();

    }

    function login()
    {
       return view('admin.auth.login');
    }

    // function login_process(Request $req)
    // {
    //     $login = AdminRegister::where("email",$req->input('email'))->get();

    //     if(Crypt::decrypt($login[0]->password) == $req->input('pass'))
    //     {
    //         $req->session()->put('user', $login[0]->name);
    //         return redirect('/');
    //     }


    // }


}
