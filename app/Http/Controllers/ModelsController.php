<?php

namespace App\Http\Controllers;

use App\DataTables\ModelsDataTable;
use App\Models\CategoryModel;
use App\Models\Models;
use App\Models\SubCategoryModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ModelsDataTable $dataTable)
    {
        $category = CategoryModel::all();
        return $dataTable->render('back.models.index',compact('category'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Models::find($id);
        return response()->json($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required|url',
            'subimageone' => 'nullable|url',
            'subimagetwo' => 'nullable|url',
            'white_board' => 'required|in:ya,tidak',
            'flute' => 'required|in:ya,tidak',
            'title' => 'required|min:6',
            'sub_category' => 'required|exists:sub_category,id',
            'category_id' => 'required|exists:category,id',
            'model' => 'required|numeric|min:5'
        ],[
            'image.required' => 'Gambar utama tidak boleh kosong',
            'image.url' => 'Gambar utama harus berupa url',
            'subimageone.url' => 'Gambar sub 1 harus berupa url',
            'subimagetwo.url' => 'Gambar sub 2 harus berupa url',
            'sub_category.exists' => 'Sub Kategori tidak ditemukan',
            'category_id.exists' => 'Kategori tidak ditemukan',
            'model.numeric' => 'Model harus berupa angka',
            'model.min' => 'Model minimal 5 karakter',
            'title.min' => 'Judul minimal 6 karakter',
            'title.required' => 'Judul tidak boleh kosong',
            'flute.required' => 'Flute tidak boleh kosong',
            'flute.in' => 'Flute harus ya atau tidak',
            'white_board.required' => 'White board tidak boleh kosong',
            'white_board.in' => 'White board harus ya atau tidak',

        ]);
      
        $model = Models::find($id);
        $model->update($request->all());
        return response()->json(['success' => 'Berhasil mengupdate data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
