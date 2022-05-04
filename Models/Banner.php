<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{   
    protected $fillable = ['banner1','banner2','banner3','banner4'];
    use HasFactory;
}
