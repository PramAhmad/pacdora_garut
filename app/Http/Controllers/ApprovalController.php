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


        return $dataTable->render('back.umkm.approved');
    }
     
    public function update( $id)
    {
        $umkm = Umkm::find($id);
        $umkm->approved = 1;
        $umkm->save();
        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil di approve');
    }
}
