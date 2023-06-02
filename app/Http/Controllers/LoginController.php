<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('tamu.riwayat_user');
        } else {
            return view('auth.login');
        }
    }

    public function authenticate(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {

            return redirect('tamu_kominfo.riwayat_user');
        } else {

            return back()->with('loginError', 'Login failed');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }

    protected function redirectTo()
    {
        if (!Auth::check()) {
            return route('login');
        }

        // Jika pengguna sudah login, arahkan ke rute yang diinginkan
        return '/'; // Ganti dengan rute yang diinginkan
    }
}
