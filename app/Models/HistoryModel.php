<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    use HasFactory;
    protected $table = 'historymodel';
    protected $fillable = [
        'umkm_id',
        'model_id',
        'created',
        'pdf_file',
        'image_file'
    ];
    public function umkm(){
        return $this->belongsTo(Umkm::class,'umkm_id','id');
    }
    public function model(){
        return $this->belongsTo(Models::class,'model_id','id');
    }
}
