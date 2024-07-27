<?php

namespace App\Http\Controllers;

use App\DataTables\UmkmDataTable;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Umkm;
use App\Models\User;
use App\Traits\HttpTrait;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    use HttpTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(UmkmDataTable $dataTable)
    {
        
    return $dataTable->render('back.umkm.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        $user_id = $umkm->user_id;
        $design = $this->get("https://api.pacdora.com/open/v1/user/projects?userId=".$user_id);
      

        // $provinsi = Provinsi::all();
        // $kota = Kota::where('provinsi_id',$umkm->provinsi->id)->get();
        // $kecamata = Kecamatan::where('kota_id',$umkm->kota->id)->get();
        // $kelurahan = Kelurahan::where('kecamatan_id',$umkm->kecamatan->id)->get();

        return view('back.umkm.show', compact('umkm','design'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $umkm = Umkm::findOrFail($id);
        
        $request->validate([
            'nama' => 'nullable',
            'nik' => 'nullable',
            'nama_pemilik' => 'nullable',
            'nama_usaha' => 'nullable',
            'alamat_usaha' => 'nullable',
            'nohp' => 'nullable',
            'provinsi_id' => 'nullable',
            'kota_id' => 'nullable',
            'kecamatan_id' => 'nullable',
            'kelurahan_id' => 'nullable',
        ]);
        if($request->type == 1){
            // update email or password
            
            $umkm->user->email = $request->email;
            if($request->has('password')){
                $umkm->user->password = bcrypt($request->password);
            }
            $umkm->user->save();
        
        }elseif($request->type == 2){
            $updateData =array_filter($request->all());
            // if($request->provinsi_id != null){
            $umkm->update($updateData);
            return response()->json($umkm);
        

        }
        return response()->json(['message' => 'Data berhasil diupdate'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Approve UMKM
     */
    
   
}
