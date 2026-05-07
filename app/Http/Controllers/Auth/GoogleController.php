<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect to Google OAuth page and store the intended URL.
     */
    public function redirectToGoogle()
    {
        // Simpan URL asal sebelum redirect ke Google
        session(['url.intended' => url()->previous()]);
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback from Google after authentication.
     */
    public function handleGoogleCallback()
    {
        try {
            Log::info('Entering handleGoogleCallback');
            $googleUser = Socialite::driver('google')->user();
            Log::info('Google User: ', ['user' => $googleUser]);

            // Cek apakah user sudah ada berdasarkan google_id
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Log::info('User found in database');
                Auth::login($user);
                session()->regenerate();
            } else {
                // Cek apakah email sudah digunakan oleh user lain
                $existingUser = User::where('email', $googleUser->email)->first();

                if ($existingUser) {
                    Log::warning('Email already exists for another user: ' . $googleUser->email);
                    return redirect('/')->withErrors([
                        'email' => 'Email ini sudah terdaftar dengan akun lain. Silakan gunakan akun yang berbeda atau hubungi administrator.'
                    ]);
                }

                // Buat user baru
                Log::info('User not found, creating new user');
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('dummy-password'),
                ]);

                Auth::login($user);
                session()->regenerate();
            }

            // Redirect berdasarkan role atau ke halaman asal
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard');
            }

            // Redirect ke dashboard user
            return redirect()->intended('/user/dashboard');
        } catch (\Exception $e) {
            Log::error('Error in handleGoogleCallback: ' . $e->getMessage());
            return redirect('/')->withErrors([
                'login' => 'Login gagal: ' . $e->getMessage()
            ]);
        }
    }
}
