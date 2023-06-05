<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()

    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'kominfo') {
                return redirect()->route('tamu_kominfo.riwayat_user');
            } elseif ($user->role === 'sekda') {
                return redirect()->route('tamu_setda.riwayat_user');
            } elseif ($user->role === 'bupati') {
                return redirect()->route('tamu_bupati.riwayat_user');
            } elseif ($user->role === 'wabup') {
                return redirect()->route('tamu_wabup.riwayat_user');
            }
        } else {
            return view('auth.login');
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required|min:5',
        ], [
            'email.required' => "Email harus diisi",
            'password.required' => "Password harus diisi",
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'kominfo') {
                return redirect()->route('tamu_kominfo.riwayat_user');
            } elseif ($user->role === 'sekda') {
                return redirect()->route('tamu_setda.riwayat_user');
            } elseif ($user->role === 'bupati') {
                return redirect()->route('tamu_bupati.riwayat_user');
            } elseif ($user->role === 'wabup') {
                return redirect()->route('tamu_wabup.riwayat_user');
            }
        } else {
            return back()->with(['loginError' => 'Gagal Login']);
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
        return '/home'; // Ganti dengan rute yang diinginkan
    }
}
