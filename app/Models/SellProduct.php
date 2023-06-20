<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProduct extends Model
{ 

    protected $fillable = [
        'sell_order_id',
        'product_id',
        'quantity',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sellOrders()
    {
        return $this->belongsTo(SellOrder::class);
    }
}
