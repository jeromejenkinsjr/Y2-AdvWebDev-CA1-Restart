<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite; // This requires Laravel Socialite for Google Sign-In
use App\Models\User; // Adjust this to your User model's namespace
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function handleGoogleCallback()
    {
        // Retrieve the user information from Google
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Find or create the user in your database
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            ['name' => $googleUser->getName()]
        );

        // Log the user in
        Auth::login($user);

        // Redirect the user to the dashboard or desired page
        return redirect('/dashboard');
    }
}

