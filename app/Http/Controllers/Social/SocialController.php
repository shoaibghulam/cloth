<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Exception;
use Auth;
use App\Models\User;

class SocialController extends Controller
{
    //
    public function auth_facebook(){
        return Socialite::driver('facebook')->redirect();

    }

    public function call_back(Request $request){
        try {
            $user = Socialite::driver('facebook')->user();
            $check=User::where('social_id',$user->getId())->where('social_type',"facebook")->first();
            if(is_null($check)){
                $userModel = new User;
                $userModel->name = $user->getName();
                $userModel->email = $user->getEmail();
                $userModel->social_id =$user->id;
                $userModel->social_type='facebook';
                $userModel->save();
                Auth::loginUsingId($userModel->id);
            return redirect()->route('/');
            } 
           else {
                Auth::loginUsingId($check->id);
                return redirect()->route('/');   
            }

        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }

    public function auth_gmail(){
        return Socialite::driver('google')->redirect();

    }


    public function gmail_call_back(Request $request){
        try {
            $user = Socialite::driver('google')->user();
            $check=User::where('social_id',$user->id)->where('social_type',"gmail")->first();
            if(is_null($check)){
                $userModel = new User;
                $userModel->name = $user->name;
                $userModel->email = $user->email;
                $userModel->social_id =$user->id;
                $userModel->social_type='gmail';
                $userModel->save();
                Auth::loginUsingId($userModel->id);
                return redirect()->route('/');
            } 
           else {
                Auth::loginUsingId($check->id);
                return redirect()->route('/');      
            }

        } catch (Exception $e) {
            return redirect('auth/gmail');
        }
    }

    public function auth_linkedin(){
        return Socialite::driver('linkedin')->redirect();

    }


    public function linkedin_call_back(Request $request){
        try {
            $user = Socialite::driver('linkedin')->user();
            $check=User::where('social_id',$user->id)->where('social_type',"linkedin")->first();
            if(is_null($check)){
                $userModel = new User;
                $userModel->name = $user->name;
                $userModel->email = $user->email;
                $userModel->social_id =$user->id;
                $userModel->social_type='linkedin';
                $userModel->save();
                Auth::loginUsingId($userModel->id);
                return redirect()->route('/');
            } 
           else {
                Auth::loginUsingId($check->id);
                return redirect()->route('/');      
            }

        } catch (Exception $e) {
            return redirect('auth/linkedin');
        }
    }
}
