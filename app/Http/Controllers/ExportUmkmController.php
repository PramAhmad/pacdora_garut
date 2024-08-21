<?php

namespace App\Http;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class ExportUmkmController  implements FromQuery
{
    use Exportable;

}
