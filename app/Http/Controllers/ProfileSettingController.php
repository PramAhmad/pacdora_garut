<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSettingController extends Controller
{
    public function index()
    {
        return view('back.profile.index');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'nullable',
        ]);
        $user = User::find(Auth::user()->id);
        if($request->password != null){
            $user->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['message' => 'Email & password Berhasil Di update ']);
        }else{

            $user->update([
                'email' => $request->email,
            ]);
            return response()->json(['message' => 'Email Berhasil Di update ']);
        }
    }
}
