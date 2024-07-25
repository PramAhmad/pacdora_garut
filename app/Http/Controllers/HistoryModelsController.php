<?php

namespace App\Http\Controllers;

use App\Models\HistoryModel;
use App\Models\Models;
use App\Models\Umkm;
use Illuminate\Http\Request;

class HistoryModelsController extends Controller
{
    public function store(Request $request){
     
        $model = Models::where('model', $request->model_id)->first()->id;
        $umkm = Umkm::where('user_id', auth()->user()->id)->first()->id;

        // delte string // di awaal image_file
        $image_file = 'https:'.$request->image_file;

     
        HistoryModel::create([
            'umkm_id' => $umkm,
            'model_id' => $model,
            'created' => now(),
            'image_file' => $image_file
        ]);
       
    }
}
