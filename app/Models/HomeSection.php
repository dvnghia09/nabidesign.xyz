<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'subtitle', 'category_sub_id', 'limit'];

    public function categorySub()
    {
        return $this->belongsTo(CategorySub::class, 'category_sub_id');
    }
}
