<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite; // This requires Laravel Socialite for Google Sign-In
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function handleGoogleCallback()
{
    try {
        // Retrieve user from Google
        $googleUser = Socialite::driver('google')->user();

        // Find or create the user in the database
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => bcrypt(str()->random(16)),
                'email_verified_at' => now(), // Mark email as verified
            ]
        );

        // Log the user in
        Auth::login($user);

        // Log debug info
        \Log::info('User logged in', ['id' => $user->id, 'email' => $user->email]);

        // Redirect to dashboard
        return redirect('/dashboard');
    } catch (\Exception $e) {
        \Log::error('Google login failed', ['message' => $e->getMessage()]);
        return redirect('/login')->withErrors(['error' => 'Failed to log in with Google.']);
    }
}


}

