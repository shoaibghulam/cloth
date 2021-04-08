<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Publisher;
use Validator;


class PublisherController extends Controller
{
    //
    function publisher()
    {
        $data = Publisher::all();
        return view('admin.pages.publisher.list',['data'=>$data]);
    }

    function publisher_process(Request $req)
    {
        // $validatedData = $req->validate([
        //     'publishername' => 'required',
        //     'companyname' => 'required'
        // ]);
        $controlls=$req->all();
            $rules=array(
                'publishername'=>"required|unique:publishers,name|max:50",
                "companyname"=>"required|unique:publishers,company|max:50");
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($controlls);
                
            }
            else{
        $publisher = new Publisher;

        $publisher->name = $req->input('publishername');
        $publisher->company = $req->input('companyname');

        $publisher->save();
       // $req->session()->flash('status','Category Added Successfully');
       return redirect()->back()->withSuccess('Publisher Added Successfully');

       // return redirect('authorlist');
            }

    }

    function deletePublisher($id)
    {
        $deletepub = Publisher::find($id);
        $deletepub->delete();
        return response()->json(['success'=>'Record has been deleted']);

    }

    function editPublisher($id)
    {
        $editpub = Publisher::find($id);
       // return view('admin.pages.category.list',['data'=>$data]);
        return response()->json($editpub);
    }

    function updatePublisher(Request $req)
    {
        $validatedData = $req->validate([
            'publishername_edit' => 'required|unique:publishers,name,'.$req->id,
            'companyname_edit' => 'required|unique:publishers,company,'.$req->id
        ]);
        $updatepub = Publisher::find($req->id);
        $updatepub->name = $req->input('publishername_edit');
        $updatepub->company = $req->input('companyname_edit');
        $updatepub->save();

        return redirect()->back()->withSuccess('Publisher Updated Successfully');


    } 

}
