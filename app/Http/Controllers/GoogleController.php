<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

class GoogleController extends Controller
{
    // Redirection vers Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback Google
    public function callback()
    {
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->getEmail(),
                ],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(uniqid()),
                ]
            );

            Auth::login($user);

            return redirect('/stagaire/chat');

        } catch (\Exception $e) {

            return redirect('/login')
                ->with('error', 'Erreur Google Login : ' . $e->getMessage());
        }
    }
}