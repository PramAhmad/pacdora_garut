<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\Models;
use App\Models\SubCategoryModel;
use App\Traits\HttpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
  use HttpTrait;

    public function index()
    {
        $data["category"] = CategoryModel::all();
     
        return view('front.home.index',$data);
    }
    public function category( $mockupNameKey)
    {
        $data["category"] = CategoryModel::where("key", $mockupNameKey)->with("subcategory")->first();
        $data["model"] = Models::inRandomOrder()->paginate(20);
        
        return view('front.category.index', $data);
    }
    public function subcategory($subcategoryKey)
    {
        $subcategory = SubCategoryModel::where("key", $subcategoryKey)->first();
        $items = Models::where('sub_category', $subcategory->id)->inRandomOrder()->paginate(20);

        return response()->json([
            'items' => view('front.category.items', compact('items'))->render()
        ]);
    }
    public function detail($modelId)
    {
        $data["detail"] = $this->get('https://api.pacdora.com/open/v1/models/'.$modelId);
        $data['modelid'] = $modelId;
        return view('front.detail.index', $data);
      }
}
