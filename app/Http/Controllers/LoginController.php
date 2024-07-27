<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('front.auth.login');
    }
    public function store(Request $request)
{
    // Validate the input data
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email tidak valid',
        'password.required' => 'Password harus diisi',
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check the user's role and approval status
        if ($user->role == 'admin') {
            return response()->json(['success' => 'Selamat datang admin']);
        } elseif ($user->role == 'user') {
            return response()->json(['success' => 'Selamat datang user']);
        } else {
            Auth::logout();
            return response()->json(['message' => 'Peran pengguna tidak valid'], 403);
        }
    } else {
        throw ValidationException   ::withMessages([
            'email' => ['Email atau Password salah'],
        ]);
    }
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
