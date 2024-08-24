<?php

namespace App\Http\Controllers;

use App\DataTables\CustomerDataTable;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('back.customer.index');
        
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
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'nama_usaha' => 'required',
            'isi' => 'required|min:15',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'nama_usaha.required' => 'Nama Usaha tidak boleh kosong',
            'isi.required' => 'Isi tidak boleh kosong',
            'isi.min' => 'Isi minimal 15 karakter',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
            'foto.max' => 'Foto maksimal 2MB',
        ]);
        
        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        $tujuan_upload =  public_path('/upload/customer');
        $foto->move($tujuan_upload, $nama_foto);

        Customer::create([
            'nama' => $request->nama,
            'nama_usaha' => $request->nama_usaha,
            'isi' => $request->isi,
            'foto' => $nama_foto,
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan',"status" => 200]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nama_usaha' => 'required',
            'isi' => 'required|min:15',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'nama_usaha.required' => 'Nama Usaha tidak boleh kosong',
            'isi.required' => 'Isi tidak boleh kosong',
            'isi.min' => 'Isi minimal 15 karakter',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
            'foto.max' => 'Foto maksimal 2MB',
        ]);

        $customer = Customer::findOrFail($id);
        $foto = $request->file('foto');
        if($foto){
            $nama_foto = time()."_".$foto->getClientOriginalName();
            $tujuan_upload =  public_path('/upload/customer');
            $foto->move($tujuan_upload, $nama_foto);
            $customer->update([
                'nama' => $request->nama,
                'nama_usaha' => $request->nama_usaha,
                'isi' => $request->isi,
                'foto' => $nama_foto,
            ]);
        }else{
            $customer->update([
                'nama' => $request->nama,
                'nama_usaha' => $request->nama_usaha,
                'isi' => $request->isi,
            ]);
        }

        return response()->json(['message' => 'Data berhasil diubah',"status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json(['message' => 'Data berhasil dihapus',"status" => 200]);
    }
}
