<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Models\CategoryModel;
use App\Models\Umkm;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
        {
            return $dataTable->render('back.category.index');
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
        $validated = $request->validate([
            'name' => 'required',
            'key' => 'required',
            'image' => 'required',
            'icon'=> 'nullable'
        ]);
        $category = CategoryModel::create($validated);
        return response()->json(['message' => $category->name . " created"], 200);
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
       
        $category = CategoryModel::find($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'key' => 'required',
            'image' => 'required'
        ]);
    
        $category = CategoryModel::findOrFail($id);
        $category->update($validated);
        return response()->json(['message' => $category->name . ' updated successfully.']);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = CategoryModel::findOrFail($id);
            $category->delete();
            return redirect()->back()->with("succes","berhasil delete category");
        } catch (\Exception $e) {

            return response()->json(['error' => 'Category not found or could not be deleted.'], 404);
        }
    }
    
}
