<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Vendor;
use Validator;


class VendorController extends Controller
{
    //
    function vendor()
    {
        $data = Vendor::all();
        return view('admin.pages.vendor.list',['data'=>$data]);
    }

    function vendor_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "fname"=>"required|max:50",
            "lname"=>"required|max:50",
            "shopname"=>"required|unique:vendors,shopname|max:50",
            "email"=>"required|unique:vendors,email",
            "pass"=>"required|max:8|min:6",
            "phone"=>"required|max:15|min:10",
            "img"=>"required|image",
            "bio"=>"nullable"
        );
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        $vendor = new Vendor;

        $vendor->role_id = 3;
        $vendor->firstname = $req->input('fname');
        $vendor->lastname = $req->input('lname');
        $vendor->shopname = $req->input('shopname');
        $vendor->email = $req->input('email');
        $vendor->password = bcrypt($req->input('pass'));
        $vendor->phoneno = $req->input('phone');
        
            if ($req->hasFile('img')) {
            $file=$req->file('img');
            $filename=time().$file->getClientOriginalName();
            $path=public_path("/uploads/vendors/");
            $file->move($path,$filename);
            $vendor->image =$filename;
            }
        $vendor->status =1;
        $vendor->bios = $req->input('bio');



        $vendor->save();
       // $req->session()->flash('status','Category Added Successfully');
       return redirect()->back()->withSuccess('Vendor Added Successfully');
        }

       // return redirect('authorlist');

    }

    function deleteVendor($id)
    {
        $deletevendor = Vendor::find($id);
        $deletevendor->delete();
        return response()->json(['success'=>'Record has been deleted']);

    }

    function editVendor($id)
    {
        $editvendor = Vendor::find($id);
       // return view('admin.pages.category.list',['data'=>$data]);
        return response()->json($editvendor);
    }

    function updateVendor(Request $req)
    {
        //dd($req);

        
        $controlls=$req->all();
        $rules=array(
            "fname_edit"=>"required|max:50",
            "lname_edit"=>"required|max:50",
            "shopname_edit"=>"required|max:50|unique:vendors,shopname,".$req->id,
            "email_edit"=>"required|unique:vendors,email,".$req->id,
            "pass_edit"=>"required|max:8|min:6",
            "phone_edit"=>"required|max:15|min:10",
            "img"=>"nullable|image"
        );
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        $updatevendor = Vendor::find($req->id);
        $updatevendor->role_id = 3;
        $updatevendor->firstname = $req->input('fname_edit');
        $updatevendor->lastname = $req->input('lname_edit');
        $updatevendor->shopname = $req->input('shopname_edit');
        $updatevendor->email = $req->input('email_edit');
        $updatevendor->password =bcrypt( $req->input('pass_edit'));
        $updatevendor->phoneno = $req->input('phone_edit');
        if ($req->hasFile('img')) {

            $file=$req->file('img');
            $filename=time().$file->getClientOriginalName();
            $path=public_path("/uploads/vendors/");
            $file->move($path,$filename);
            $updatevendor->image =$filename;
            }
        $updatevendor->status = 1;
        $updatevendor->save();

        return redirect()->back()->withSuccess('Vendor Updated Successfully');
        }


    }

}
