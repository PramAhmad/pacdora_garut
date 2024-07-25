<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmProfileController extends Controller
{
    public function index()
    {
        $umkm = Umkm::where('user_id', auth()->user()->id)->first();
        
        return view('front.profile.index',compact('umkm'));
    }
}
