<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try {
            DB::beginTransaction();
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(20)), 
                    'status' => 'active',
                    'last_seen_at' => now(),
                    'remember_token' => Str::random(60),
                ],
            );
            
            if (!UserProfile::where('user_id', $user->id)->exists()) {
                UserProfile::create([
                    'user_id' => $user->id,
                    'profile_image' => 'blankProfile.png',
                ]);
            }
            
            if (!$user->wasRecentlyCreated) {
                $user->update(['last_seen_at' => now()]);
            }
            if(!$user->hasRole('asesi')){
                $user->assignRole('asesi');
            }

            Auth::login($user);
            DB::commit();
        return redirect()->route('asesi.dashboard')->with('success', 'Berhasil login dengan Google');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('login')->withErrors(['msg' => 'Gagal login dengan Google']);
        }
    }
} 
