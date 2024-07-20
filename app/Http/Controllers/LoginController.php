<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('front.auth.login');
    }
    public function store(){
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'approved' => 'in:1'
        ],[
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
            'approved.in' => 'Akun anda belum di verifikasi oleh admin'
        ]);
       if(auth()->attempt($credentials)){
           if(auth()->user()->role == 'admin'){
            //    return succes data
            return response()->json(['success' => 'Selamat datang admin']);
           }
          else if(auth()->user()->role == 'user' && auth()->user()->approved == 1){
              return redirect()->route('home');

           }
              else{
                return response()->json(['message' => 'Akun anda belum di verifikasi oleh admin']);
              }
         }
         

        return back()->with('status','Email atau Password salah');
    }
}
