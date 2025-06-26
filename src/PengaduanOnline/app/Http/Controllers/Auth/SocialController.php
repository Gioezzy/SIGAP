<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
            //retreive user from google
            $googleUser = Socialite::driver('google')->user();

            //attempt to find an existing user by Google ID or Email
            $existingUser = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();
            if ($existingUser) {
                // Update Google ID if the user was found by email
                if ($existingUser->google_id !== $googleUser->id) {
                    $existingUser->google_id = $googleUser->id;
                    $existingUser->save();
                }
                if (is_null($existingUser->email_verified_at)) {
                    $existingUser->email_verified_at = now();
                    $existingUser->save();
                }
                Auth::login($existingUser);
            } else {
                // create a new user
                $createUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id, // penting disimpan
                    'email_verified_at' => now(),   // anggap sudah verified dari Google
                    'password' => bcrypt(str()->random(16)), // dummy password

                    //field tambahan
                    'alamat' => null,
                    'nomor_hp' => null,
                    'role' => 'user',
                ]);
                Auth::login($createUser);
            }
            return redirect()->to('/profile');
        } catch (\Throwable $th) {
            // log the exception or handle it as needed
            throw $th; // consider logging the exeption for debugging
        }
    }
}
