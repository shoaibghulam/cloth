<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\Contact;

class UserContactController extends Controller
{
    //
    public function contactInfo()
    {
        $contacts = Contact::all();
        return view('admin.pages.contact.contact',['contact'=>$contacts]);
    }

    function showmessage($id)
    {
        $show = Contact::find($id);
        return response()->json($show);
    }
}
