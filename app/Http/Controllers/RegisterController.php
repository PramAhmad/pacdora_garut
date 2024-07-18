<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('front.register.index');
    }

    public function store(Request $request)
{

    $request->validate([
        
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'nik' => 'required|numeric|digits:16',
        'nama' => 'required|string|max:255',
        'is_garut' => 'required|in:ya,tidak',
        'domisili' => 'nullable|string|max:255',
        'referensi' => 'nullable|string|max:255',
        'nama_usaha' => 'nullable|string|max:255',
        'disabilitas' => 'nullable|in:ya,tidak',
        'alamat_usaha' => 'required|string|max:255',
        'nohp' => 'required|numeric|digits_between:10,15',
    ], [
        
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password harus diisi',
        'password.min' => 'Password minimal 6 karakter',
        'password.confirmed' => 'Konfirmasi password tidak sesuai',
        'nik.required' => 'No KTP harus diisi',
        'nik.numeric' => 'No KTP harus berupa angka',
        'nik.digits' => 'No KTP harus 16 digit',
        'nama.required' => 'Nama Pemilik harus diisi',
        'nama_usaha.required' => 'Nama Usaha harus diisi',
        'is_garut.required' => 'Kewarganegaraan harus diisi',
        'is_garut.in' => 'Kewarganegaraan harus ya atau tidak',
        'alamat_usaha.required' => 'Alamat Usaha harus diisi',
        'nohp.required' => 'No HP harus diisi',
        'nohp.numeric' => 'No HP harus berupa angka',
        'nohp.digits_between' => 'No HP harus antara 10 sampai 15 digit',
    ]);
    $referefsi  = [
        0 => 'Dinas Koperasi dan UKM Kab. Garut',
        1 => 'Website',
        2 => 'Social Media',
        3 => 'Lainya',
    ];
    

    if (User::where('email', $request->email)->exists()) {
        return back()->withInput()->with('error', 'Email sudah terdaftar');
    }

    $user = User::create([
        'name' => $request->nama,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
 

    $umkm = Umkm::create([
        'user_id' => $user->id,
        'nik' => $request->nik,
        'nama' => $request->nama,
        'is_garut' => $request->is_garut,
        'domisili' => $request->domisili ?? null,
        'referensi' => $referefsi[$request->referensi] ?? null,
        'nama_usaha' => $request->nama_usaha,
        'alamat_usaha' => $request->alamat_usaha,
        'disabilitas' => $request->disabilitas,
        'nohp' => $request->nohp,
    ]);

 
    return response()->json([
        'success' => 'Pendaftaran berhasil, silahkan login',
    ]);
}

}
