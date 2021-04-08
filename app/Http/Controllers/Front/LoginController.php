<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\category;
use App\Models\Front\Order;
use App\Models\Front\OrderDetail;
use App\Models\Vendor\Book;



use View;

use App\Models\Admin\StoreInformation;



use Session;
use Auth;
use Validator;

//use Hash;
use Str;
use Mail;
use DB;
use Carbon\Carbon;
//use App\Models\Admin\StoreInformation;



class LoginController extends Controller
{
    public function __construct(){
        $showCategory = category::with('subCategory')->get();
        if (!empty($showCategory)) {
            $showCategory=$showCategory;
        }else{
            $showCategory='null';
        }
        $information=StoreInformation::first();

        if (!empty($information)) {
            $information=$information;
        }else{
            $information='null';
        }
        $data=['categories'=>$showCategory,'information'=>$information];
    
        View::share('data',$data);
    }
    function index()
    {
        $orderdetails = Order::with('user')->whereHas('orderdetail')->where('customer_id',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        //dd($orderdetails);
        $purchasebook = Order::with('orderdetail.book')->where('customer_id',Auth::user()->id)->orderBy('id','DESC')->paginate(10);
        //dd($purchasebook);

        return view('client.page.myaccount',['orderdetails'=>$orderdetails,'purchasebook'=>$purchasebook,]);
    }

    function home()
    {
        return view('client.page.home');
    }
    
    function login_process(Request $req)
    {
        // $validatedData = $req->validate([
            
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        $controlls=$req->all();
        $rules=array(
            'email'=>"required|max:50|exists:users,email",
            'password'=>"required");
  
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
       else
       {
            $user = User::where(['email'=>$req->email])->first();
            if($user->email_verified_at!='')
        {
            $credientials=['email'=>$req->email,'password'=>$req->password]; 
            if (!Auth::attempt($credientials)) 
            {
                
              return redirect()->route('login')->with(['error'=>"Invalid Credientials"]);
            }
            else
            {
             return redirect('myaccount'); 
//              $end_point = 'https://api.webpushr.com/v1/notification/send/attribute';

// $http_header = array( 
//     "Content-Type: Application/Json", 
//     "webpushrKey: b511dee90f8dd4e9e9b301f118a2ee29", 
//     "webpushrAuthToken: 22158"
// );

// $req_data = array(
//     'title' 		=> "Notification title", //required
//     'message' 		=> "Notification message", //required
//     'target_url'	=> 'https://www.webpushr.com', //required
//     'attribute'		=> array('E-mail' => 'harisahmedshaikh12@gmail.com'), //required - in Key/Value Pair(s)
    
//     //following parameters are optional
//     //'name'		=> 'Test campaign',
//     //'icon'		=> 'https://cdn.webpushr.com/siteassets/wSxoND3TTb.png',
//     //'image'		=> 'https://cdn.webpushr.com/siteassets/aRB18p3VAZ.jpeg',
//     //'auto_hide'	=> 1,
//     //'expire_push'	=> '5m',
//     //'send_at'		=> '2021-01-20 13:04 +5:30',
//     //'action_buttons'=> array(	
//         //array('title'=> 'Demo', 'url' => 'https://www.webpushr.com/demo'),
//         //array('title'=> 'Rates', 'url' => 'https://www.webpushr.com/pricing')
//     //)

// );

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
// curl_setopt($ch, CURLOPT_URL, $end_point );
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($req_data) );
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($ch);
// echo $response;   
            }
         
        }else{
            return redirect()->route('login')->with(['error'=>"Verify Your Email"]);    

        }
         
        //    $req->session()->put('user',$user);
        //    return redirect('/');
       }
    }
       public function Logout()
       {
         
           Auth::logout();
           return redirect()->route('login');         
             
       }

      
   
       function updateProfile(Request $req)
       {
        $controlls=$req->all();

        $rules=array(
            "new_password"=>"required|min:8",
            "confirm_password"=>"required|same:new_password",
            "current_password"=>"required"
        );
            //dd($controlls);
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }

            else{
                $current_password = Auth::user()->password;         
                if(Hash::check($req->current_password, $current_password))
                {           
                  $user_id = Auth::user()->id;                       
                  $obj_user = User::find($user_id);
                  $obj_user->password = bcrypt($req->new_password);
                  $obj_user->save(); 
                 
                }else{
                return redirect()->back()->withErrors(["current_password"=>'Current Password Not Matched...!']);
    
                }
                
                return redirect()->back()->withSuccess('Password Successfully Updated')->with(['active'=>'active']);
       
            }
       }
       
       public function account_detail(Request $req)
       {
           $controlls=$req->all();

        $rules=array(
            "name"=>"required|unique:users,name,".Auth::user()->id,
            "email"=>"required|unique:users,email,".Auth::user()->id
        );
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else
            {
                $obj_user = User::find(Auth::user()->id);                       
                $obj_user->name = $req->input('name');
                $obj_user->email = $req->input('email');
                $obj_user->save();
                return redirect()->back()->withSuccess('Details Successfully Updated')->with(['active'=>'active']);

            }
           
       }
    public function forget()
    {
        return view('client.page.forget');
    }

    public function forget_process(Request $req)
    {
        $controlls=$req->all();
        
        $rules=array(
            "email"=>"required|exists:users,email",
        );
            $messages=array(
                "email.exists"=>"Email Does Not Exists",
            );
            $validator=Validator::make($controlls,$rules,$messages);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else{
               
                $token = Str::random(60);
                DB::table('password_resets')->insert(
                    ['email' => $req->email, 'token' => $token, 'created_at' => Carbon::now()]
                );
                Mail::send('client.page.verify',['token' => $token], function($message) use ($req,$token)   {
                          $message->from('harisahmedshaikh12@gmail.com');
                          $message->to($req->email);
                          $message->subject('Reset Password Notification');
                       });
        
                return back()->with('success', 'Successfully Sent Your Password Link To Your Email !');
            }
               // return redirect()->route('admin.auth.resetpassword');
            

    }
    public function newpass()
    {
        return view('client.page.newpassword');
    }

    

    public function resetpassword_process(Request $req)
    {
        $controlls=$req->all();
        
        $rules=array(
            "newpassword"=>"required|min:8",
            "confirmpassword"=>"required|min:8|same:newpassword"
        );
            
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else
            {
                $updatePassword = DB::table('password_resets')
                ->where([ 'token' => $req->token])
                ->first();
                
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');

        }
        else{
          $user = User::where('email', $updatePassword->email)->first();
          $user->password=bcrypt($req->newpassword);
          $user->save();

        //  return redirect()->back()->withSuccess('Your password has been changed...!');



          DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

          return redirect('/newpassword')->with('success', 'Your password has been changed!');
        }

          

            }

    }

}

