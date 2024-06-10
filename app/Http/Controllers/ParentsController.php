<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ParentsController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.parent-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('parent')->attempt($credentials)) {
            return redirect()->intended('/parent/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.parent-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:parents',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $parent = Parent::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('parent')->login($parent);

        return redirect('/parent/dashboard');
    }

    public function logout()
    {
        Auth::guard('parent')->logout();
        return redirect('/parent/login');
    }
}
