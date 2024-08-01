<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategoryModel extends Model
{
    use HasFactory;
    protected $table = "sub_category";
    protected $fillable =[
        "category_id",
        "name",
        'image',
        "key"
    ];

    public function categoryname():BelongsTo{
        return $this->belongsTo(CategoryModel::class,"category_id","id");
    }
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    public function models(){
        return $this->hasMany(Models::class,"sub_category","id");
    }
}
