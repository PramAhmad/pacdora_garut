<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $table = 'umkm';
    protected $fillable = [
        'user_id',
        'noktp',
        'nama_pemilik',
        'nama_usaha',
        'alamat_usaha',
        'no_nib',
        'file_ktp',
        'file_nib',
        'nohp',
        'approved',
    ];
}
