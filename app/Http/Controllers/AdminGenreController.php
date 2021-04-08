<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Validator;

class AdminGenreController extends Controller
{
    //
    function genre()
    {
        $data = Genre::all();
        return view('admin.pages.genere.list',['data'=>$data]);
        
    }

    function genre_process(Request $req)
    {
        $controlls=$req->all();
      $rules=array(
          "generename"=>"required|unique:genres,name",
      );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
            $genre = new Genre;
        $genre->name = $req->input('generename');
        $genre->save();
       // $req->session()->flash('status','Category Added Successfully');
       return redirect()->back()->withSuccess('Genre Added Successfully');
        }
        

       // return redirect('generelist');

    }

    function deleteGenre($id)
    {
        $deleteGen = Genre::find($id);
        $deleteGen->delete();
        return response()->json(['success'=>'Record has been deleted']);

    }

    function editGenre($id)
    {
        
        $editgen = Genre::find($id);
       // return view('admin.pages.category.list',['data'=>$data]);
        return response()->json($editgen);
    }

    function updateGenre(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
          "generename_edit"=>"required|unique:genres,name,".$req->id,
            
        );
          $validator=Validator::make($controlls,$rules);
          if ($validator->fails()) {
              // dd($validator);
              return redirect()->back()->withErrors($validator)->withInput($controlls);
              
          }
          else{
            $updategen = Genre::find($req->id);
            $updategen->name = $req->input('generename_edit');
            $updategen->save();
            return redirect()->back()->withSuccess('Genre Updated Successfully');
          }
        


    }
}
