<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            Log::info('Entering handleGoogleCallback');
            $googleUser = Socialite::driver('google')->user();
            Log::info('Google User: ', ['user' => $googleUser]);

            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Log::info('User found in database');
                Auth::login($user);
                session()->regenerate();
                Log::info('Auth::check() after login: ' . (Auth::check() ? 'true' : 'false'));
            } else {
                // Validasi apakah email sudah digunakan oleh user lain
                $existingUser = User::where('email', $googleUser->email)->first();
                
                if ($existingUser) {
                    Log::warning('Email already exists for another user: ' . $googleUser->email);
                    return redirect('/')->withErrors(['email' => 'Email ini sudah terdaftar dengan akun lain. Silakan gunakan akun yang berbeda atau hubungi administrator.']);
                }
                
                Log::info('User not found, creating new user');
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('dummy-password'),
                ]);
                Auth::login($user);
                session()->regenerate();
                Log::info('Auth::check() after creating user and login: ' . (Auth::check() ? 'true' : 'false'));
            }

            Log::info('Auth::check() before redirect: ' . (Auth::check() ? 'true' : 'false'));
            
            // If the user is an admin, always redirect to admin dashboard
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard');
            }
            
            return redirect()->intended('/');
        } catch (\Exception $e) {
            Log::error('Error in handleGoogleCallback: ' . $e->getMessage());
            return redirect('/')->withErrors('Login gagal: ' . $e->getMessage());
        }
    }
}