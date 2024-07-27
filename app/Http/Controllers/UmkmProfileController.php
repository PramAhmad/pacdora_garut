<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Traits\HttpTrait;
use Illuminate\Http\Request;

class UmkmProfileController extends Controller
{
    use HttpTrait;
    public function index()
    {
        $umkm = Umkm::where('user_id', auth()->user()->id)->first();
        $design = $this->get("https://api.pacdora.com/open/v1/user/projects?userId=10");
        
        return view('front.profile.index',compact('umkm','design'));
    }
    public function design($id){
        return view('front.profile.design',compact('id'));
    }
}
