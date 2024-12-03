<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            // Check if user exists based on Google ID
            $user = User::where('google_id', $google_user->getId())->first();

            // If no user with the same Google ID, check if the email is already taken
            if (!$user) {
                // Check if the email already exists
                $existingUser = User::where('email', $google_user->getEmail())->first();

                if ($existingUser) {
                    // If the email exists, update the google_id
                    $existingUser->google_id = $google_user->getId();
                    $existingUser->save();

                    // Log in the existing user
                    Auth::login($existingUser);
                } else {
                    // If the email doesn't exist, create a new user
                    $new_user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                    ]);

                    Auth::login($new_user);
                }

                return redirect()->intended('dashboard');
            }

            // If user exists, just log them in
            Auth::login($user);  

            return redirect()->intended('dashboard');
            
        } catch (\Throwable $th) {
            // Error handling
            dd('Something went wrong!'. $th->getMessage());
        }
    }
}
