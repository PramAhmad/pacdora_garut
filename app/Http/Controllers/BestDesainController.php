<?php

namespace App\Http\Controllers;

use App\DataTables\BestDesainDataTable;
use App\Models\BestDesain;
use App\Models\CategoryModel;
use App\Models\Models;
use Illuminate\Http\Request;

class BestDesainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BestDesainDataTable $dataTable)
    {   
        $category = CategoryModel::all();
        $model = Models::all();
        return $dataTable->render('back.best_desain.index', compact('category','model'));
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
            'model_id' => 'required|exists:model,id',
            'urutan' => 'required'
        ],[
            'model_id.required' => 'Model harus diisi',
            'model_id.exists' => 'Model tidak ditemukan',
            'urutan.required' => 'Urutan harus diisi'
        ]);

        BestDesain::create($request->all());
        return redirect()->route('bestdesain.index')->with('success', 'Data berhasil ditambahkan');
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
