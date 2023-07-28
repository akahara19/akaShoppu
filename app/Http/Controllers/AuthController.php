<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->user()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            // Check the user's role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard')->with('status', 'Welcome ' . $user->name);
            } elseif ($user->role === 'customers') {
                return redirect()->intended('/')->with('status', 'Welcome ' . $user->name);
            }
        }

        return back()->with('status', 'Email atau password salah',);
    }

    public function logout()
    {   
        auth()->logout();
        return redirect()->route('showLogin')->with('statusLogout', 'Logout Success!');
    }
}
