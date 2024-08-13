<?php

namespace App\Http\Controllers;

use App\Jobs\PostImagesPecdoraJob;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Template;
use App\Models\Umkm;
use App\Models\User;
use App\Traits\HttpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    use HttpTrait;
    public function index()
    {
        return view('front.auth.register');
    }

    public function store(Request $request)
{
    
    $randimg = Template::inRandomOrder()->limit(5)->get();

    $data = [
        'imgs' => [],
        'userId' => 14, 
    ];

    foreach ($randimg as $key => $value) {
        $data['imgs'][] = [
            'url' => url('upload/template/'.$value->image),
            'name' => $value->name,
        ];
    } 
    json_encode($data);
  //   return $data;
    $response = Http::withHeaders([
        'appId' => '71ee73045e3480fe',
        'appKey' => 'a3e831ccfa3ffd84',
    ])->post('https://api.pacdora.com/open/v1/upload/img', $data);
        
   return  $response = json_decode($response->body(), true);
   

  
    // dd($request->all());
    $request->validate([
        
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'nik' => 'required|numeric|digits:16',
        'nama' => 'required|string|max:255',
        'is_garut' => 'required',
        'domisili' => 'nullable|string|max:255',
        'referensi' => 'nullable|string|max:255',
        'nama_usaha' => 'nullable|string|max:255',
        'disabilitas' => 'nullable|in:ya,tidak',
        'alamat_usaha' => 'required|string|max:255',
        'wilayah' => 'required',
        'nohp' => 'required|numeric|digits_between:10,15',
    ], [
        
        'email.required' => 'Email harus diisi',
        'email.email' => 'Email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password harus diisi',
        'password.min' => 'Password minimal 6 karakter',
        'nik.required' => 'No KTP harus diisi',
        'nik.numeric' => 'No KTP harus berupa angka',
        'nik.digits' => 'No KTP harus 16 digit',
        'wilayah.required' => 'Wilayah harus diisi',
        'nama.required' => 'Nama Pemilik harus diisi',
        'nama_usaha.required' => 'Nama Usaha harus diisi',
        'is_garut.required' => 'Kewarganegaraan harus diisi',
        'is_garut.in' => 'Kewarganegaraan harus ya atau tidak',
        'alamat_usaha.required' => 'Alamat Usaha harus diisi',
        'nohp.required' => 'No HP harus diisi',

        'nohp.numeric' => 'No HP harus berupa angka',
        'nohp.digits_between' => 'No HP harus antara 10 sampai 15 digit',
    ]);
   
   

    if (User::where('email', $request->email)->exists()) {
        return back()->withInput()->with('error', 'Email sudah terdaftar');
    }
    $wilayah = Kelurahan::find($request->wilayah);
    $kecamatan = Kecamatan::find($wilayah->kecamatan_id);
    $kota = Kota::find($kecamatan->kota_id);
    $provinsi = Provinsi::find($kota->provinsi_id);
 
    $user = User::create([
        'name' => $request->nama,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
    
    $is_garut = $request->is_garut == '1' ? 'ya' : 'tidak';
 
    $umkm = Umkm::create([
        'user_id' => $user->id,
        'nik' => $request->nik,
        'nama' => $request->nama,
        'is_garut' => $is_garut,
        'domisili' => $request->domisili ?? null,
        'referensi' => $request->referensi ?? null,
        'nama_usaha' => $request->nama_usaha,
        'provinsi_id' => $provinsi->id ?? null,
        'kota_id' => $kota->id ?? null,
        'kecamatan_id' => $kecamatan->id ?? null,
        'kelurahan_id' => $wilayah->id ?? null,
        'alamat_usaha' => $request->alamat_usaha,
        'disabilitas' => $request->disabilitas,
        'nohp' => $request->nohp,
    ]);
  

 
    return response()->json([
        'success' => 'Pendaftaran berhasil, silahkan login',
    ]);
}

}
