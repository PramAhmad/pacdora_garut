<?php
namespace App\Http\Controllers;

use App\Exports\UMKMExport;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Facades\Excel;

class ExportUmkmController extends Controller
{
    use Exportable;
    public function umkm()  {
        $time = date('Y-m-d H:i:s');
        return Excel::download(new UMKMExport, 'umkm-'.$time.'.xlsx');
    }
}