<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    protected $fillable = ['name','quantity','price','sale_price','category_id','image','description','status'];
    use HasFactory;

    public function category(){
        return $this->belongsTo(CategorySub::class,'category_id');
    }
}
