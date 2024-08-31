<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestDesain extends Model
{
    use HasFactory;
    protected $table = 'best_desains';
    protected $fillable = ['model_id', 'urutan'];

    public function model()
    {
        return $this->belongsTo(Models::class, 'model_id', 'id');
    }
}

