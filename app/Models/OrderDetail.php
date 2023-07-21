<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{   
    protected $fillable = ['id_product', 'id_order', 'quantity', 'price', 'color', 'size'];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
