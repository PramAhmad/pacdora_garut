<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Traits\HttpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmProfileController extends Controller
{
    use HttpTrait;
    public function index()
    {
        $umkm = Umkm::where('user_id', auth()->user()->id)->first();
        $design = $this->get("https://api.pacdora.com/open/v1/user/projects?userId=". hashId(Auth::user()->id));
       $data = $design['data'];
       if($data == null){
           $data = [];
       }
        return view('front.profile.index',compact('umkm','data'));
    }

    public function update(Request $request, $id)
    {
        $updateData =array_filter($request->all());
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'is_garut' => 'required|string',
            'domisili' => 'nullable|string|max:255',
            'referensi' => 'required|integer',
            'nphp' => 'required|string|max:255',
            'nama_usaha' => 'required|string|max:255',
            'alamat_usaha' => 'required|string|max:255',
            'disabilitas' => 'required|string',
            'provinsi_id' => 'nullable|integer',
            'kota_id' => 'nullable|integer',
            'kecamatan_id' => 'nullable|integer',
            'kelurahan_id' => 'nullable|integer',
        ],[
            'nama.required' => 'Nama harus diisi',
            'nik.required' => 'NIK harus diisi',
            'is_garut.required' => 'Kewarganegaraan harus diisi',
            'domisili.required' => 'Domisili harus diisi',
            'referensi.required' => 'Referensi harus diisi',
            'nphp.required' => 'No HP harus diisi',
            'nama_usaha.required' => 'Nama Usaha harus diisi',
            'alamat_usaha.required' => 'Alamat Usaha harus diisi',
            'disabilitas.required' => 'Disabilitas harus diisi',
        ]);
       
         Umkm::find($id)->update($updateData);

         return response()->json(['message' => 'Data berhasil diupdate']);


    }
    public function design($id){
    
        return view('front.profile.design',compact('id'));
    }
}
