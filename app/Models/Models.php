<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Models extends Model
{
    use HasFactory;
    protected $table = "model";
    
    protected $fillable = [
        'image',
        'subimageone',
        'subimagetwo',
        "title",
        "white_board",
        "flute",
        "sub_category",
        "model"
    ];

    
    public function subcategory(): BelongsTo{
        return $this->belongsTo(SubCategoryModel::class, "sub_category","id");
    }

}