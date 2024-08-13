<?php

namespace App\Http\Controllers;

use App\DataTables\TemplateUserDataTable;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TemplateUserDataTable $dataTable)
    {
        return $dataTable->render('back.template.index');
        
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
            'name' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ],[
            'name.required' => 'Nama harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image.file' => 'File harus berupa gambar',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar jpeg, png, jpg',
            'image.max' => 'File gambar maksimal 2MB',
            
        ]);
       

        $image = $request->file('image');
        $image_name = time()."_".$image->getClientOriginalName();
        $image->move(public_path('upload/template'),$image_name);

        Template::create([
            'name' => $request->name,
            'image' => $image_name,
        ]);
        if($request->ajax()){
            return response()->json(['message' => 'Template created'], 200);
        }
        return redirect()->back()->with('success','Template created');

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
    public function destroy(string $id)
    {
        //
    }
}
