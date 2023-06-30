<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::firstOrCreate(['email' => $providerUser->getEmail()],[
            'name' => $providerUser->getName() ?? $providerUser->getNickname(),
            'provider' => $providerUser->getId(),
            'provider_id' => $provider,
        ]);
        
        Auth::login($user);
        
        return redirect()->intended('/home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
