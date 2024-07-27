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
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'approved' => 'required|in:1,2',
            'alasan_reject' => 'nullable'
        ],[
            'approved.required' => 'Pilih status',
            'approved.in' => 'Pilih status yang benar',
        ]);

        Umkm::findOrFail($id)->update([
            'approved' => $request->approved,
            'alasan_reject' => $request->alasan_reject
        ]);
      
        return redirect()->back()->with('success','Berhasil mengubah status');
    }

}
