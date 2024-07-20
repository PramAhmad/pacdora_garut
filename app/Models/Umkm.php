<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $table = 'umkm';
    protected $fillable = [
        'nama',
        'user_id',
        'nik',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id', 
        'nama_pemilik',
        'nama_usaha',
        'alamat_usaha',
        'nohp',
        'approved',
    ];

    public function user()  {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
