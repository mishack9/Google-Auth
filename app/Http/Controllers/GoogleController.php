<?php

namespace App\Http\Controllers;

use App\Models\User;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirect_to_google(){
        return Socialite::driver('google')->redirect();
    }

    public function HanlerGoogle_callback(){
        $user = Socialite::driver('google')->user();
        $find_user = User::where('google_id', $user->id)->first();
        if($find_user)
        {
         Auth::login($find_user);

         return redirect()->route('home');
         
        }
           else
        {
            $user = User::updateOrCreate([
                'email' => $user->email,
            ],
            [
                'name' => $user->name,
                'google_id' => $user->id,
                'password' => encrypt(12345678),
            ]);
         
            Auth::login($user);

            return redirect()->route('home');
          
        }

      
    }

  
}
