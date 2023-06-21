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

    public function sellProduct()
    {
        return $this->hasMany(SellProduct::class);
    }
    public function buyProduct()
    {
        return $this->hasMany(BuyProduct::class);
    }
}