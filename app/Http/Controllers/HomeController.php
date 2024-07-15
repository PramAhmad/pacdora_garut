<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $data["categorys"] = Http::withHeaders(
            [
               'appId' =>env('ApiId'),
               'appKey' =>env('ApiKey'),
            ]
        )->get("https://api.pacdora.com/open/v1/models/class/home");
        
    
        if($data['categorys']["code"] == 401){
          $data = [
            "categorys" => [],
            "error" => "Unauthorized",
          ];
        }else{
            $data["categorys"] = json_decode($data["categorys"]->body(), true);
        }
      $data["mockup"] = [ [
          "name" => "Box 1",
          "modelId" => "100103",
          "imgSrc" => "//cdn.pacdora.com/image-resize/500xauto_outside/preview/100103-white-board-71.jpg",
          "description" => "Double tray boxes storage with front opening cardboard mailer mockup"
      ],
      [
          "name" => "Box 2",
          "modelId" => "310030",
          "imgSrc" => "//cdn.pacdora.com/image-resize/500xauto_outside/preview/310030-flute-6.jpg",
          "description" => "Inserts tuck end box inserts square inserts mockup"
      ],
      [
        "name" => "Box 3",
          "modelId" => "150010",
          "imgSrc" => "//cdn.pacdora.com/image-resize/500xauto_outside/preview/150010-white-board-20.jpg",
          "description" => "Flip top boxes mailer all-in-one mockup"
      ],
      [
        "name" => "Box 4",

          "modelId" => "160010",
          "imgSrc" => "//cdn.pacdora.com/image-resize/650xauto_outside/preview/160010-flute-31.jpg",
          "description" => "Boxes with lid corrugated shoe top & bottom lid mockup"
      ],
      [
        "name" => "Box 5",

          "modelId" => "200010",
          "imgSrc" => "//cdn.pacdora.com/image-resize/650xauto_outside/preview/200010-flute-67.jpg",
          "description" => "Cartons 0201 paper mockup"
      ],
      [
        "name" => "Box 6",

          "modelId" => "610020",
          "imgSrc" => "//cdn.pacdora.com/image-resize/650xauto_outside/render/20240508/104000370001.jpg",
          "description" => "Tote bags paper mockup"
      ],
      [
        "name" => "Box 7",

          "modelId" => "200200",
          "imgSrc" => "//cdn.pacdora.com/image-resize/650xauto_outside/preview/200200-flute-66.jpg",
          "description" => "Cartons bring your own grid dividers mockup"
      ],
      [
        "name" => "Box 8",

          "modelId" => "128030",
          "imgSrc" => "//cdn.pacdora.com/image-resize/650xauto_outside/preview/128030-kraft-40.jpg",
          "description" => "Sleeve box tray boxes drawer mockup"
      ]
  ];
    
        return view('front.home.index',$data);
    }
    public function category($mockupNameKey)
    {
        $data["category"] = Http::withHeaders(
            [
               'appId' =>env('ApiId'),
               'appKey' =>env('ApiKey'),
            ]
        )->get('https://api.pacdora.com//open/v1/models/class?mockupNameKey='.$mockupNameKey);

        if($data['category']["code"] == 401){
          $data = [
            "category" => [],
            "error" => "Unauthorized",
          ];
        }elseif($data['category']["code"] == 404){
          $data = [
          "category" => [],
            "error" => "Not Found",
          ];
        }else{
            $data["category"] = json_decode($data["category"]->body(), true);
        }
      
       
        return view('front.category.index', $data);
    }
    public function detail($modelId)
    {
        $data["detail"] = Http::withHeaders(
            [
               'appId' =>env('ApiId'),
               'appKey' =>env('ApiKey')
            ]
        )->get('https://api.pacdora.com//open/v1/models/'.$modelId);
              
        if($data['detail']["code"] == 401){
          $data = [
            "detail" => [],
            "error" => "Unauthorized",
          ];
        }else{
            $data["detail"] = json_decode($data["detail"]->body(), true);
        }
        return view('front.detail.index', $data);
      }
}
