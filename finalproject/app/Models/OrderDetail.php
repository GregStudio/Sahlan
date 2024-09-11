<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function getTotalPricePerProductAttribute()
    {
        $price = $this->qty * $this->price;
        return $price;
    }
}