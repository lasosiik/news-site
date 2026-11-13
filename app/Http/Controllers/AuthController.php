<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function showLogin() 
    { 
        return view('auth.login'); 
    }

    // вход
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return back()->withErrors(['name' => 'Неверный логин или пароль']);
    }

    
    public function showRegister() 
    { 
        return view('auth.register'); 
    }

    //регистр
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->route('login')->with('success', 'Регистрация успешна! Теперь войдите.');
    }

    // Выход из аккаунта
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}