<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
    protected $fillable = ['name','phone','addrest','quantity','note','total_price','status','id_user'];
    use HasFactory;

    public function orderDetail() {
        return $this->hasMany(OrderDetail::class, 'id_order', 'id');
    }
}
