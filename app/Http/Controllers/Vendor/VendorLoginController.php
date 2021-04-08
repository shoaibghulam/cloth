<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use Str;
use Mail;
use DB;
use Carbon\Carbon;
use App\Models\Admin\Vendor;
class VendorLoginController extends Controller
{
    //
    public function Login(){
        return view('vendor.auth.login');
    }
    public function attempt(Request $request)
    {
        $controlls=$request->all();
        $rules=array( 
            "email"=>"required|exists:vendors,email",
            "password"=>"required|min:6");
            $messages=array(
                "email.exists"=>"Email Does Not Exists",
            );
            $validator=Validator::make($controlls,$rules,$messages);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else{
                $credientials=['email'=>$request->email,'password'=>$request->password];
                if (!Auth::guard('vendor')->attempt($credientials)) {
            return redirect()->route('vendor.auth.login')->withErrors(['error'=>"Invalid Credientials"]);
                }else{  
            return redirect()->route('vendor.booklist');    
                }
            }   
    }

    public function Logout()
    {
      
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.auth.login');         
          
    }

    public function forget()
    {
        return view('vendor.auth.forget');
    }

        public function profile()
        {
        return view('vendor.pages.profile.profile');

        }

        public function changepass()
        {
        return view('vendor.pages.change-pass.password');

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
                $current_password = Auth::guard('vendor')->user()->password;         
                if(Hash::check($request->current_password, $current_password))
                {           
                  $user_id = Auth::guard('vendor')->user()->id;                       
                  $obj_user = Vendor::find($user_id);
                  $obj_user->password = bcrypt($request->newpassword);
                  $obj_user->save(); 
                
                }else{
                return redirect()->back()->withSuccess('Current Password Not Matched...!');

                }
                
                return redirect()->back()->withSuccess('Password Successfully Updated');
       
            }
            
        

    }

        function updateVendorProfile(Request $req)
    {
        
        $controlls=$req->all();
        $rules=array(
            "fname"=>"required|max:50|unique:vendors,firstname,".Auth::guard('vendor')->user()->id,
            "lname"=>"required|max:50|unique:vendors,lastname,".Auth::guard('vendor')->user()->id,
            "shopname"=>"required|max:50|unique:vendors,shopname,".Auth::guard('vendor')->user()->id,
            "email"=>"required|max:50|unique:vendors,email,".Auth::guard('vendor')->user()->id,
            "phone"=>"required|max:12|unique:vendors,phoneno,".Auth::guard('vendor')->user()->id,
            "image"=>"nullable|image",
            "bio"=>"nullable"


        );
       // dd($controlls);
         
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
        else{
        $updatevendor = Vendor::find($req->id);
        $updatevendor->role_id = 3;
        $updatevendor->firstname = $req->input('fname');
        $updatevendor->lastname = $req->input('lname');
        $updatevendor->shopname = $req->input('shopname');
        $updatevendor->email = $req->input('email');
        $updatevendor->phoneno = $req->input('phone');

        if ($req->hasFile('image')) {
            $file=$req->file('image');
            $filename=time().$file->getClientOriginalName();
            $path=public_path("/uploads/vendors/");
            $file->move($path,$filename);
            $updatevendor->image =$filename;
            }
            $updatevendor->bios = $req->input('bio');
        
        $updatevendor->save();

        return redirect()->back()->withSuccess('Vendor Updated Successfully');
        }
    }



        function editVendorProfile($id)
        {
            $editvendorprofile = Vendor::find($id);
            return view('vendor.pages.profile.profile',['editvendorprofile'=>$editvendorprofile]);
           // return response()->json($editvendor);
        }
    
    public function forget_process(Request $req)
    {
        $controlls=$req->all();
        
        $rules=array(
            "email"=>"required|exists:vendors,email",
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
                Mail::send('vendor.auth.verify',['token' => $token], function($message) use ($req,$token)   {
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
        return view('vendor.auth.resetpassword');
    }

    public function resetpassword_process(Request $req)
    {
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
          $user = Vendor::where('email', $updatePassword->email)->first();
          $user->password=bcrypt($req->newpassword);
          $user->save();


          DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

          return redirect('/vendor/auth/login')->with('message', 'Your password has been changed!');
        }

          

        }

        

    }
}
