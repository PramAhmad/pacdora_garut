<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\Customer;
use App\Models\Models;
use App\Models\SubCategoryModel;
use App\Models\Template;
use App\Models\Umkm;
use App\Traits\HttpTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardControler extends Controller
{
    use HttpTrait;
    public function index()
    {
        // Count various models
        $data['model_count'] = Models::count();
        $data['category_count'] = CategoryModel::count();
        $data['subcategory_count'] = SubCategoryModel::count();
        $data['customer_count'] = Customer::count();
        $data['umkm_count'] = Umkm::count();
        $data['template'] = Template::count();
 
        $data['start'] = Carbon::now()->subDays(90)->timestamp * 1000; 
        $data['end'] = Carbon::now()->timestamp * 1000; 
    
   
        $data['pacdora'] = Http::withHeaders([
            'appId' => "71ee73045e3480fe",
            'appKey' => "a3e831ccfa3ffd84"
        ])->get('https://api.pacdora.com/open/v1/behavior/statistic', [
            'startTime' => $data['start'],
            'endTime' => $data['end']
        ]);
        
        

        // stat     harian 7 hari terakhir
        // $data['statistic'] = [];
        // for ($i = 0; $i < 7; $i++) {
  
        //     $data['statistic'][$i] = Http::withHeaders([
        //         'appId' => "71ee73045e3480fe",
        //         'appKey' => "a3e831ccfa3ffd84"
        //     ])->get('https://api.pacdora.com/open/v1/behavior/statistic', [
        //         'startTime' => Carbon::now()->subDays($i)->timestamp * 1000,
        //         'endTime' =>  Carbon::now()->timestamp * 1000
        //     ]);
        //     $data['statistic'][] = $data['statistic'][$i]->json();
        // }
        // return $data['statistic'][5];
     
        // Render the dashboard view with the data
        return view('back.dashboard', $data);
    }
    
}
