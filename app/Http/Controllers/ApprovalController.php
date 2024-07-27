<?php

namespace App\Http\Controllers;

use App\DataTables\ApprovalUmkmDataTable;
use App\DataTables\UmkmDataTable;
use App\Models\Umkm;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function index(ApprovalUmkmDataTable $dataTable)
    {


        return $dataTable->render('back.approved.index');
    }
     
    public function show($id)
    {
        $umkm = Umkm::findOrFail($id);
            return view('back.approved.show',compact('umkm'));
        }
    public function update( $id)
    {
        $umkm = Umkm::find($id);
        $umkm->approved = 1;
        $umkm->save();
        return response()->json(['message' => 'Data berhasil diapproved'], 200);
    }

    public function inactive($id){
        $umkm = Umkm::findOrFail($id);
        $umkm->approved = 0;
        $umkm->save();
        return response()->json(['message' => 'Data berhasil di nonaaktifkan'], 200);
    }
}
