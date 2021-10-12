<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\welcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callBack()
    {
        try {

            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->email)->first();
            
            if ($user) {

                Auth::loginUsingId($user->id);
            } else {
                
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt( \Str::random(20) )
                ]);

                Auth::loginUsingId($newUser->id);
            }

            $this->location($newUser, "User Logged in with using Google Servic");
            Mail::to($newUser->email)->send( new welcome($newUser) );
            Alert::success('Success', "Hi Welcome to your site");
                
            return redirect('/');
        } catch (\Exception $e) {
            
            Alert::error('Error', 'Something went wrong');
            return redirect('login');
        }

    }
    
}
