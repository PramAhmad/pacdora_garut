<?php

namespace App\Http\Controllers;

use App\Traits\HttpTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\type;

class ExportController extends Controller
{

    public function index($id)
    {
    //    $export = $this->post('https://api.pacdora.com/open/v1/user/projects/export/pdf​', [
    //         'projectId' => $id
    //     ]);
    $response = Http::withHeaders([
        'appId' => "71ee73045e3480fe",
        'appKey' => "a3e831ccfa3ffd84",
        // 'type' => 'pdf'
        ])->post('https://api.pacdora.com/open/v1//open/v1/user/projects/export/pdff​​',[
            'projectIds' => [$id],
    ]);
  dd(json_decode($response->body()));
    }
}
