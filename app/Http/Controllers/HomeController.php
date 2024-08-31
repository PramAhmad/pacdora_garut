<?php

namespace App\Http\Controllers;

use App\Models\BestDesain;
use App\Models\CategoryModel;
use App\Models\Customer;
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
        $data['customer'] = Customer::all();
        $data['bestdesain'] = BestDesain::limit(8)->get();
        
     
        return view('front.home.index',$data);
    }
    public function category($mockupNameKey)
    {
        // dd($mockupNameKey);
        $category = CategoryModel::where("key", $mockupNameKey)->with("subcategory")->first();
        // dd($category->id);
        $items = Models::where('category_id', $category->id)->paginate(9);
      
    
        if (request()->ajax()) {
            return response()->json([
                'html' => view('front.category.items_with_pagination', compact('items'))->render(),
            ]);
        }
    
        return view('front.category.index', compact('category', 'items'));
    }
    
    public function subcategory($subcategoryKey)
    {
        $subcategory = SubCategoryModel::where("key", $subcategoryKey)->first();
        $category = $subcategory->categoryname;
        $items = Models::where('sub_category', $subcategory->id)->paginate(9);
    
        if (request()->ajax()) {
            return response()->json([
                'html' => view('front.category.items_with_pagination', compact('items'))->render(),
            ]);
        }
      
    
        return view('front.subcategory.index', compact('category', 'subcategory', 'items'));
    }
    

    public function detail($modelId)
    {
        $data["detail"] = $this->get('https://api.pacdora.com/open/v1/models/'.$modelId);
        $data['modelid'] = $modelId;
        return view('front.detail.index', $data);
      }

    public function pendampingan(){
        return view('front.pendampingan.index');
    }
    
    public function konsultasi(){
        return view('front.konsultasi.index');
    }

    public function tutorial(){
        return view('front.tutorial.index');
    }
    public function bestdesain(){
        $bestdesain = BestDesain::all();
        return view('front.bestdesain.index', compact('bestdesain'));
    }
}
