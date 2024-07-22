<?php

namespace App\Http\Controllers;

use App\DataTables\SubCategoryDataTable;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    // SubCategoryController.php

    public function index(SubCategoryDataTable $dataTable)
    {
        $categories = CategoryModel::all();
        return $dataTable->render('back.subcategory.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'key' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:category,id',
        ]);

        $subcategory = SubCategoryModel::create($validated);
        return response()->json(['message' => $subcategory->name . " created"], 200);
    }

    public function edit($id)
    {
        $subcategory = SubCategoryModel::findOrFail($id);
        return response()->json($subcategory);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'key' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:category,id',
        ]);

        $subcategory = SubCategoryModel::findOrFail($id);
        $subcategory->update($validated);

        return response()->json(['message' => $subcategory->name . " updated"], 200);
    }

    public function destroy($id)
    {
        SubCategoryModel::destroy($id);
        return redirect()-back()->with('succes','berhasil delete data');
    }
}
