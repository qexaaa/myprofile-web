<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login admin
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Proses login admin
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email atau password salah');
        }

        // cek md5 
        if ($user->password !== md5($request->password)) {
            return back()->with('error', 'Email atau password salah');
        }

        // login manual
        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/admin/dashboard');
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
