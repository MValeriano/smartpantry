<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registro');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('login')->with('success', 'Usuário registrado com sucesso!');
    }

    public function setAccountData(Request $request){
        $user = Auth::user();
        $profiles = Profile::all();
        $users = User::all();
        return view('account.index', compact('user','profiles','users'));
    }

    public function assignProfile(Request $request)
    {
        $request->validate([
            'user' => 'required|exists:users,id',
            'profile' => 'required|exists:profiles,id',
        ]);
    
        $userId = $request->input('user');
        $profileId = $request->input('profile');

        if (auth()->user()->profile_id !== 1) {
            return redirect()->route('account')->with('error', 'Você não tem permissão para atribuir perfis a outros usuários.');
        }        
    
        $user = User::findOrFail($userId);
        
        $user->profile_id = $profileId;
        $user->save();
    
        return redirect()->route('account')->with('success', 'Perfil atribuído com sucesso!');
    }

    public function updateAccountData(Request $request)
    {
        $user = Auth::user();
    
        if ($request->has('name')) {
            $user->name = $request->name;
        }
    
        if ($request->has('password')) {
            if (!empty($user->provider) && !empty($user->provider_id)) {
                return redirect()->route('account')->with('error', 'A senha não pode ser alterada para usuários com login externo.');
            }
    
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('account')->with('success', 'Dados da conta atualizados com sucesso.');
    }
    
    public function destroyAccountData(Request $request)
    {
        $user = Auth::user();
    
        $user->delete();
    
        $user->emporiums()->delete();
        $user->supermarketLists()->delete();
    
        return redirect()->route('home')->with('success', 'Conta excluída com sucesso.');
    }
}
