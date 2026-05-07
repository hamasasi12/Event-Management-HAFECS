<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        session(['url.intended' => url()->previous()]);
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            $user = User::where('facebook_id', $facebookUser->id)->first();

            if ($user) {
                Auth::login($user);
                session()->regenerate();
            } else {
                $existingUser = User::where('email', $facebookUser->email)->first();

                if ($existingUser) {
                    return redirect('/')->withErrors([
                        'email' => 'Email ini sudah terdaftar dengan akun lain. Silakan gunakan akun yang berbeda.'
                    ]);
                }

                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'password' => bcrypt('dummy-password'),
                ]);

                Auth::login($user);
                session()->regenerate();
            }

            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/user/dashboard');
        } catch (\Exception $e) {
            Log::error('Error in handleFacebookCallback: ' . $e->getMessage());
            return redirect('/')->withErrors([
                'login' => 'Login gagal: ' . $e->getMessage()
            ]);
        }
    }
}
