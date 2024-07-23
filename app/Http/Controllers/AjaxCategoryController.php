<?php

namespace App\Http\Controllers;

use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class AjaxCategoryController extends Controller
{
    public function getSubCategory( $id)
    {
        $data = SubCategoryModel::where('category_id',$id)->get();
        return response()->json(['data' => $data]);
    }
}
