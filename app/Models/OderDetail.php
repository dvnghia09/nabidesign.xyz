<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{   
    protected $fillable = ['id_product','oder_id','quantity','price','color','size','product_name','image'];
    use HasFactory;
}
