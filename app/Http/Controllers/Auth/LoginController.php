<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        } else {
            return redirect()->back()->withErrors(['message' => 'Credenciais inválidas']);
        }
    }    

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
