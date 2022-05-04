<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{   
    protected $fillable = ['name','phone','addrest','quantity','note','total_price','status'];
    use HasFactory;

    public function orderDetail(){
        return $this->hasMany(OderDetail::class);
    }
}
