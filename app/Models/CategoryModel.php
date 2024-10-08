<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table ="category";
    protected $fillable =[
        "name",
        "key",
        'image'
    ];

    // hashmany
    public function subcategory(){
        return $this->hasMany(SubCategoryModel::class,"category_id","id");
    }

    public function models(){
        return $this->hasMany(Models::class,"category_id","id");
    }

   
    public function modelsLimit(){
        return $this->hasMany(Models::class,"category_id","id")->limit(10);
    }
 
}
