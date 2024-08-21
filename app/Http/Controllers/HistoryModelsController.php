<?php

namespace App\Http\Controllers;

use App\DataTables\HistoryDataTable;
use App\Models\HistoryModel;
use App\Models\Models;
use App\Models\Umkm;
use App\Traits\HttpTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HistoryModelsController extends Controller
{
    use HttpTrait;

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
    public function index()
    {
        $data['project'] = $this->get("https://api.pacdora.com/open/v1/user/projects");
        
        $projectData = $data['project']['data'];
       
        foreach($projectData as $key => $value){
            $umkm = Umkm::where('user_id', hashId($value['userId'], 'decode'))->first();
            $projectData[$key]['umkm'] = $umkm;
        }
        
    
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentPageItems = array_slice($projectData, ($currentPage - 1) * $perPage, $perPage);
    
        $paginatedData = new LengthAwarePaginator($currentPageItems, count($projectData), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        return view("back.history.index",['project' => $paginatedData]);

    }
}
