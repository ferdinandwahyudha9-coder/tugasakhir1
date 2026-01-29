<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampil halaman login/register
    public function register()
    {
        // Jangan redirect jika user sudah login, biarkan logout dulu
        return view('auth_login');
    }

    // Proses login
    public function loginSubmit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()->withErrors(['password' => 'Email atau password salah'])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.index')->with('success', 'Selamat datang Admin!');
        }

        return redirect()->route('beranda')->with('success', 'Login berhasil!');
    }

    // Proses register
    public function registerSubmit(Request $request)
    {
           
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.unique' => 'Email sudah terdaftar!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!',
        ]);

        

     $user = User::create([
    'name' => $validated['name'],
    'email' => $validated['email'],
    'password' => Hash::make($validated['password']),
    'role' => 'user',  // ← BENAR
]);

    

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('beranda')->with('success', 'Registrasi berhasil! Selamat datang!');
    }

    // Profil user
public function profil()
{
    return view('profil', ['user' => Auth::user()]);
}

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda')->with('success', 'Anda telah logout!');
    }
}
