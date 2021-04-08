<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Admin\Admin; 
use App\Models\Admin\Forget; 
use Hash;
use Str;
use Mail;
use DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    //
    public function Login(){
        return view('admin.auth.login');
    }

    public function profile()
    {
        return view('admin.auth.profile');

    }

    function updateAdminProfile(Request $req)
    {
        
        $controlls=$req->all();
        $rules=array(
            "name"=>"required|unique:admins,name,".Auth::guard('admin')->user()->id,
            "email"=>"required|unique:admins,email,".Auth::guard('admin')->user()->id,
            "image"=>"nullable|image"

            

        );
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        $updateadmin=Admin::find(Auth::guard('admin')->user()->id);
        $updateadmin->name = $req->input('name');
        $updateadmin->email =$req->input('email');

        if ($req->hasFile('image')) {
            $file=$req->file('image');
            $filename=time().$file->getClientOriginalName();
            $path=public_path("/uploads/admins/");
            $file->move($path,$filename);
            $updateadmin->image =$filename;
            }
        $updateadmin->save();

        return redirect()->back()->withSuccess('Admin Profile Updated Successfully');
        }
    }

    public function attempt(Request $request)
    {
        $controlls=$request->all();
        $rules=array(
            "email"=>"required|exists:admins,email",
            "password"=>"required|min:8");
            $messages=array(
                "email.exists"=>"Email Does Not Exists",
            );
            $validator=Validator::make($controlls,$rules,$messages);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else{
                $credientials=['email'=>$request->email,'password'=>$request->password];
                if (!Auth::guard('admin')->attempt($credientials)) {
            return redirect()->route('admin.auth.login')->withErrors(['error'=>"Invalid Credientials"]);
                }else{  
            return redirect()->route('admin.subcategorylist');   
                }
            }   
    }

    public function forget()
    {
        return view('admin.auth.forget');
    }

    public function forget_process(Request $req)
    {
        $controlls=$req->all();
        
        $rules=array(
            "email"=>"required|exists:admins,email",
        );
            $messages=array(
                "email.exists"=>"Email Does Not Exists",
            );
            $validator=Validator::make($controlls,$rules,$messages);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else{
                // $forgetpass = new Forget;
                // $forgetpass->email = $req->input('email');
                // $forgetpass->token = $req->input('_token');
                $token = Str::random(60);


                DB::table('password_resets')->insert(
                    ['email' => $req->email, 'token' => $token, 'created_at' => Carbon::now()]
                );
                Mail::send('admin.auth.verify',['token' => $token], function($message) use ($req,$token)   {
                          $message->from('harisahmedshaikh12@gmail.com');
                          $message->to($req->email);
                          $message->subject('Reset Password Notification');
                       });
        
                return back()->with('success', 'Successfully Sent Your Password Link To Your Email !');
            }
               // return redirect()->route('admin.auth.resetpassword');
            

    }

    public function resetpassword()
    {
        return view('admin.auth.resetpassword');
    }

    public function resetpassword_process(Request $req)
    {
        //dd($req);
        $controlls=$req->all();
    
        $rules=array(
            "newpassword"=>"required|min:8",
            "confirmpassword"=>"required|min:8"
        );
            
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else
            {
                $updatePassword = DB::table('password_resets')
                ->where([ 'token' => $req->_token])
                ->first();
                
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');

        }
        else{
            $user = Admin::where('email', $updatePassword->email)->first();
          $user->password=(bcrypt($req->newpassword));
          $user->save();


         DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

          return redirect('/admin/auth/login')->with('message', 'Your password has been changed!');
        }

          

            }

    }

    public function changepass()
    {
    return view('admin.pages.change.password');

    }
    public function changepassword_process(Request $request)
{
    $controlls=$request->all();

    $rules=array(
        "newpassword"=>"required|min:8",
        "confirmpassword"=>"required|same:newpassword",
        "current_password"=>"required"
    );
        //dd($controlls);
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else{
            $current_password = Auth::guard('admin')->user()->password;         
            if(Hash::check($request->current_password, $current_password))
            {           
              $user_id = Auth::guard('admin')->user()->id;                       
              $obj_user = Admin::find($user_id);
              $obj_user->password = bcrypt($request->newpassword);
              $obj_user->save(); 
             
            }else{
            return redirect()->back()->withErrors(["current_password"=>'Current Password Not Matched...!']);

            }
            
            return redirect()->back()->withSuccess('Password Successfully Updated');
   
        }
    }

    
   
}
