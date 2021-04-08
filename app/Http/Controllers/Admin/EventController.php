<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Event;
use Validator;

class EventController extends Controller
{
    //
    public function event()
    {
        $event = Event::all();
        return view('admin.pages.event.event',['event'=>$event]);
    }
    public function event_process(Request $req)
    {
        $controlls=$req->all();
        $rules=array(
            "image"=>"nullable|image",
            "eventname"=>"required|unique:events,eventname",
            "postby"=>"required",
            "description"=>"required|max:500"
        );
        $validator=Validator::make($controlls,$rules);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else
        {
            $event = new Event;
            if ($req->hasFile('image')) {
                $file=$req->file('image');
                $filename=time().$file->getClientOriginalName();
                $path=public_path("/uploads/events/");
                $file->move($path,$filename);
                $event->image =$filename;
                }
            $event->eventname = $req->input('eventname');
            $event->postedby = $req->input('postby');
            $event->description = $req->input('description');
            $event->save();

            return redirect()->back()->withSuccess('Event Successfully Uploded');
        }
    }
    public function eventdelete($id)
    {
        $deleteevent  = Event::find($id);
        $deleteevent->delete();
        return response()->json(["success",'Record has been deleted']);
    }
    public function eventedit($id)
    {
        $editevent = Event::find($id);
        return response()->json($editevent);
    }
    public function eventupdate(Request $req)
    {
        
        $controlls=$req->all();
        $rules=array(
            "edit_image"=>"nullable|image",
            "edit_eventname"=>"required|unique:events,eventname,".$req->id,
            "edit_postby"=>"required",
            "edit_description"=>"required|max:500"
        );
        $validator=Validator::make($controlls,$rules);
        //dd($req->id);
        if($validator->fails())
        {
            //dd($req->id);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            //dd($req->id);
        }
        else
        {
            
            $updateevent = Event::find($req->id);
            if ($req->hasFile('edit_image')) {
                $file=$req->file('edit_image');
                $filename=time().$file->getClientOriginalName();
                $path=public_path("/uploads/events/");
                $file->move($path,$filename);
                $updateevent->image =$filename;
                }
            $updateevent->eventname = $req->input('edit_eventname');
            $updateevent->postedby = $req->input('edit_postby');
            $updateevent->description = $req->input('edit_description');
            $updateevent->save();

            return redirect()->back()->withSuccess('Event Successfully Updated');
        }
    }
}
