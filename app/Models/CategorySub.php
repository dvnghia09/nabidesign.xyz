<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySub extends Model
{   
    protected $fillable = ['name','category_id','status'];
    use HasFactory;


    public function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
