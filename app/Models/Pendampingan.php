<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendampingan extends Model
{
    use HasFactory;
    protected $table = 'pendampingans';
    protected $guarded = [];
    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function bidang_usaha()
    {
        return $this->belongsTo(BidangUsaha::class);
    }
}
