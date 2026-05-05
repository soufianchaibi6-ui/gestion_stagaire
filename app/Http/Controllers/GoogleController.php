<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    // يوديك لجوجل
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // منين يرجع من جوجل
    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'password' => bcrypt('google'),
        ]);

        Auth::login($user);

        return redirect('/home');
    }
}