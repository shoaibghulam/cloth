<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminDashboardController extends Controller
{
    //
    public function dashboard(){
    
        return view('admin.pages.dashboard');
    }
    public function Logout()
    {
      
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');         
          
    }
}
