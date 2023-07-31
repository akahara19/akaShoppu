<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
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
                return redirect()->route('admin.produk')->with('status', 'Welcome ' . $user->name);
            } elseif ($user->role === 'customers') {
                return redirect()->route('home')->with('status', 'Welcome ' . $user->name);
            }
        }

        return back()->with('status', 'Email atau password salah',);
    }

    function register()
    {
        return view('auth.register');
    }

    function postRegister(Request $request) {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customers'
        ]); 

        return redirect()->route('showLogin')->with('status', 'Register successfullt!');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('showLogin')->with('statusLogout', 'Logout Success!');
    }
}
