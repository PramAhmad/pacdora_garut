<?php

namespace App\Http\Controllers;

use App\DataTables\PendampinganDataTable;
use App\Models\Pendampingan;
use Illuminate\Http\Request;

class PendampinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PendampinganDataTable $dataTable)
    {
        return $dataTable->render('back.pendampingan.index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'klasifikasi_usaha' => 'required|string|max:255',
            'npwp' => 'required|string|max:255',
            'bidang_usaha_id' => 'required|integer|exists:bidang_usahas,id',
            'nama_produk' => 'required|string|max:255',
            'deskripsi_usaha' => 'required|string',
            'web' => 'nullable|string|url|max:255',
            'ig' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'wa' => 'nullable|max:16',
            'tahun_berdiri' => 'required|string|max:4',
            'jumlah_karyawan' => 'required|integer|min:0',
            'modal_usaha' => 'required|string|max:255',
            'jumlah_modal' => 'required|numeric|min:0',
            'nib' => 'nullable|string|max:255',
            'perizinan' => 'nullable|string|max:255',
            'pendampingan' => 'required|string|max:255',
        ],[

            'klasifikasi_usaha.required' => 'Klasifikasi usaha harus diisi',
            'npwp.required' => 'NPWP harus diisi',
            'npwp.regex' => 'NPWP harus berupa angka',
            'bidang_usaha_id.required' => 'Bidang usaha harus diisi',
            'bidang_usaha_id.exists' => 'Bidang usaha tidak valid',
            'nama_produk.required' => 'Nama produk harus diisi',
            'deskripsi_usaha.required' => 'Deskripsi usaha harus diisi',
            'web.url' => 'Alamat web tidak valid',
            'ig.regex' => 'Format username Instagram tidak valid',
            'tiktok.regex' => 'Format username TikTok tidak valid',
            'wa.regex' => 'Nomor WA tidak valid',
            'wa.max' => 'Nomor WA tidak valid',
            'tahun_berdiri.required' => 'Tahun berdiri harus diisi',
            'tahun_berdiri.regex' => 'Tahun berdiri harus berupa tahun yang valid',
            'tahun_berdiri.max' => 'Tahun berdiri tidak valid',
            'jumlah_karyawan.required' => 'Jumlah karyawan harus diisi',
            'jumlah_karyawan.integer' => 'Jumlah karyawan harus berupa angka',
            'jumlah_karyawan.min' => 'Jumlah karyawan tidak boleh negatif',
            'modal_usaha.required' => 'Modal usaha harus diisi',
            'jumlah_modal.required' => 'Jumlah modal harus diisi',
            'jumlah_modal.numeric' => 'Jumlah modal harus berupa angka',
            'jumlah_modal.min' => 'Jumlah modal tidak boleh negatif',
            'nib.regex' => 'NIB harus berupa angka',
            'pendampingan.required' => 'Pendampingan harus diisi',
        ]);

        $pendampingan = [
   
            0 => 'NIB (NOMOR INDUK BERUSAHA)',
            1 => 'HALAL',
            2 => 'SNI BINA UMK',
            3 => 'SPPIRT',
            4 => 'HAKI',
            5 => 'E-KATALOG',
            6 => 'BPOM MD',

        ];
        $klasifikasi =[
            0 => 'Mikro',
            1 => 'Kecil',
            2 => 'Menengah',
        ];
        $modal = [
            0 => 'Modal Sendiri',
            1 => 'Modal Dari Pinjaman Pribadi ',
            2 => 'Modal Dari Pinjaman Bank'
        ];

        $request->merge(['klasifikasi_usaha' => $klasifikasi[$request->klasifikasi_usaha]]);
        $request->merge(['pendampingan' => $pendampingan[$request->pendampingan]]);
        $request->merge(['modal_usaha' => $modal[$request->modal_usaha]]);
        
      
        $request->merge(['umkm_id' => auth()->user()->umkm->id]);
        Pendampingan::create($request->all());
        return response()->json(['message' => 'Data berhasil disimpan']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pendampingan = Pendampingan::findOrFail($id)->with('bidang_usaha')->first();
            return response()->json($pendampingan);
        } catch (\Exception $e) {
            return response()->json(['
            error' => 'Error menampilkan data: ' . $e->getMessage()], 500);
        }
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Pendampingan::findOrFail($request->id)->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error menghapus data: ' . $e->getMessage()], 500);
        }
    }
}
