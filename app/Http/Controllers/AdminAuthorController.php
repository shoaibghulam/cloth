<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author;
use App\Models\category;



class AdminAuthorController extends Controller
{
    //
    function author()
    {
        $data = author::all();
        return view('admin.pages.author.authod',['data'=>$data]);
    }

    function author_process(Request $req)
    {
        $validatedData = $req->validate([
            'firstname' => 'required',
            'lastname' => 'required'

        ]);
        $author = new author;

        $author->firstName = $req->input('firstname');
        $author->lastName = $req->input('lastname');

        $author->save();
       // $req->session()->flash('status','Category Added Successfully');
       return redirect()->back()->withSuccess('Author Added Successfully');

       // return redirect('authorlist');

    }

    function deleteAuthor($id)
    {
        $deleteauth = author::find($id);
        $deleteauth->delete();
        return response()->json(['success'=>'Record has been deleted']);

    }

    function editAuthor($id)
    {
        $editauth = author::find($id);
       // return view('admin.pages.category.list',['data'=>$data]);
        return response()->json($editauth);
    }

    function updateAuthor(Request $req)
    {
        $validatedData = $req->validate([
            'fname' => 'required',
            'lname' => 'required'
        ]);
        $updateauth = author::find($req->id);
        $updateauth->firstName = $req->input('fname');
        $updateauth->lastName = $req->input('lname');
        $updateauth->save();

        return redirect()->back()->withSuccess('Author Updated Successfully');


    }

    
}
