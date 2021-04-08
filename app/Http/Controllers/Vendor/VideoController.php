<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor\Video;
use Validator;
use Auth;

class VideoController extends Controller
{
    //
    public function video()
    {
        $videolist = Video::with('vendor')->where('vendor_id',Auth::guard('vendor')->user()->id)->get();
        return view('vendor.pages.video.video',['videolist'=>$videolist]);
    }

    public function video_process(Request $req)
    {
        //dd($req);
        $controlls=$req->all();
        $rules=array(
            "video"=>"required|unique:videos,video",
            "status"=>"required"
        );
        $validator=Validator::make($controlls,$rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else
        {
            $videos = new Video;
            $videos->vendor_id = Auth::guard('vendor')->user()->id;
            
            if ($req->hasFile('video')) {
            $file=$req->file('video');
            $filename=time().$file->getClientOriginalName();
            $path=public_path("/uploads/vendors/");
            $file->move($path,$filename);
            $videos->video =$filename;
            }
            $videos->status = $req->input('status');
            $videos->save();

            return redirect()->back()->withSuccess('Video Uploaded Successfully !');
        }
    }

    public function video_delete($id)
    {
        $videodelete = Video::find($id);
        $videodelete->delete();
        return response()->json(["success"=>'Record has been deleted']);
    }
    public function video_edit($id)
    {
    $videoedit = Video::find($id);
    return response()->json($videoedit);
    }

    public function video_update(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "video"=>"nullable|unique:videos,video,".$req->id,
            "edit_status"=>"nullable",
        );
        $validator=Validator::make($controlls,$rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else
        {
            $videoupdate = Video::find($req->id);

            $videoupdate->vendor_id = Auth::guard('vendor')->user()->id;
            
            if ($req->hasFile('video')) {
            $file=$req->file('video');
            $filename=time().$file->getClientOriginalName();
            $path=public_path("/uploads/vendors/");
            $file->move($path,$filename);
            $videoupdate->video =$filename;
            }
            $videoupdate->status = $req->input('edit_status');
            $videoupdate->save();

            return redirect()->back()->withSuccess('Video updated Successfully !');
 
 
        }
    }

}
