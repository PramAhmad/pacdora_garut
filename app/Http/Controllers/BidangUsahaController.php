<?php

namespace App\Http\Controllers;

use App\DataTables\BidangUsahaDataTable;
use App\Models\BidangUsaha; // Make sure you have a model named BidangUsaha
use Illuminate\Http\Request;

class BidangUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BidangUsahaDataTable $dataTable)
    {
        return $dataTable->render('back.bidangusaha.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        try {
            BidangUsaha::create([
                'nama' => $request->nama,
                'status' => $request->status,
            ]);

            return response()->json(['success' => 'Bidang usaha created successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating bidang usaha: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bidangUsaha = BidangUsaha::findOrFail($id);
        return response()->json($bidangUsaha);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        try {
            $bidangUsaha = BidangUsaha::findOrFail($id);
            $bidangUsaha->update([
                'nama' => $request->nama,
                'status' => $request->status,
            ]);

            return response()->json(['success' => 'Bidang usaha updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating bidang usaha: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $bidangUsaha = BidangUsaha::findOrFail($id);
            $bidangUsaha->delete();

            return response()->json(['success' => 'Bidang usaha deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting bidang usaha: ' . $e->getMessage()], 500);
        }
    }
}
