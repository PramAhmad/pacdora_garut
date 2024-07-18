<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCity(Request $request, $provinceId = null)
    {
        $cities = Kota::when($provinceId != null, function ($q) use ($provinceId) {
            return $q->where('provinsi_id', $provinceId);
        })
            ->when($request->term, function ($q) use ($request) {
                return $q->where('nama_kota', 'like', '%' . $request->term . '%');
            })
            ->get();

        return response()->json(['data' => $cities, '_token' => csrf_token()]);
    }

    public function getSubdistrict(Request $request, $cityId = null)
    {
        $subdistricts = Kecamatan::when($cityId != null, function ($q) use ($cityId) {
            return $q->where('kota_id', $cityId);
        })
            ->when($request->term, function ($q) use ($request) {
                return $q->where('nama_kecamatan', 'like', '%' . $request->term . '%');
            })
            ->get();

        return response()->json(['data' => $subdistricts, '_token' => csrf_token()]);
    }

    public function searchWilayah(Request $request)
    {
        $resultCount = 20;
        $wilayah = Kecamatan::select('kecamatan.id as id','nama_kecamatan', 'nama_kota', 'nama_provinsi')
                                ->join('kota', 'kota.id', 'kecamatan.kota_id')
                                ->join('provinsi', 'provinsi.id', 'kota.provinsi_id')
                                ->where('nama_kecamatan', 'LIKE', '%' . $request->term . '%')
                                ->orWhere('nama_kota', 'LIKE', '%' . $request->term . '%')
                                ->orWhere('nama_provinsi', 'LIKE', '%' . $request->term . '%')
                                ->simplePaginate($resultCount);

        $morePages = true;

        if (empty($wilayah->nextPageUrl())) {
            $morePages = false;
        }

        return response()->json(['more_pagination' => $morePages, 'data' => $wilayah->items()]);
    }

}
