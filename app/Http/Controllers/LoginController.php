<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_form()
    {
        return view('auth/login');
    }

    public function handleLogin()
    {
        if (auth()->attempt(['username'=>request()->get('username'),'password'=>request()->get('password')])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->withErrors(['message'=>'Login error']);
        }
    }

    public function handleLogout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('login');
    }
}
