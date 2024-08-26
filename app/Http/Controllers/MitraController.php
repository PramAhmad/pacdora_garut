<?php

namespace App\Http\Controllers;

use App\DataTables\MitraDataTable;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MitraDataTable $dataTable)
    {
        return $dataTable->render('back.mitra.index');
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
            'name' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required' => 'Nama harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
            'foto.max' => 'Foto maksimal 2MB',
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('upload/mitra'), $imageName);

        Mitra::create([
            'name' => $request->name,
            'foto' => $imageName,
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Mitra::find($id);
        return response()->json($data);
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
        $request->validate([
            'name' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required' => 'Nama harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.mimes' => 'Foto harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
            'foto.max' => 'Foto maksimal 2MB',
        ]);
        $oldImage = Mitra::find($id);
        unlink(public_path('upload/mitra/'.$oldImage->foto));

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('upload/mitra'), $imageName);

        Mitra::find($id)->update([
            'name' => $request->name,
            'foto' => $imageName,
        ]);

        return response()->json(['message' => 'Mitra updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Mitra::find($id);
        unlink(public_path('upload/mitra/'.$data->foto));
        $data->delete();
        return response()->json(['message' => 'Mitra deleted'], 200);
    }
}
