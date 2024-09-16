<?php

namespace App\Http\Controllers;

use App\Models\User;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'username' => $google_user->getName(),
                    'password' => Hash::make('123456789'),
                    'first_name' => "",
                    'last_name' => "",
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'telephone' => "",
                ]);

                Auth::login($new_user);

                return redirect()->intended(route('home.index'));
            } else {
                Auth::login($user);

                return redirect()->intended(route('home.index'));
            }
        } catch (\Throwable $th) {
            dd("Something went wrong!" . $th->getMessage());
        }
    }
}
