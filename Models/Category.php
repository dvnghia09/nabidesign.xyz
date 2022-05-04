<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','status','link'];
    use HasFactory;

    public function categorySub(){
        return $this->hasMany(CategorySub::class);
    }
}
