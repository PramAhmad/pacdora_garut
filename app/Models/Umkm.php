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
        'domisili',
        'referensi',
        'is_garut',
        'disabilitas',
        'alasan_reject'
    ];

    public function user()  {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function provinsi(){
        return $this->belongsTo(Provinsi::class,'provinsi_id');
    }
    public function kota(){
        return $this->belongsTo(Kota::class,'kota_id');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'kecamatan_id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'kelurahan_id');
    }
    
    public function history(){
        return $this->hasMany(HistoryModel::class,'umkm_id','id');
    }
}
