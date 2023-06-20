<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'buy_price', 
        'sell_price', 
        'stock', 
        'min_stock', 
        'max_stock', 
        'location', 
        'supplier_id',
        'image'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function sellOrders()
    {
        return $this->hasMany(SellOrder::class);
    }
}