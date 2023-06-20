<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellOrder extends Model
{
    protected $fillable = [
        'quantity', 
        'customer_id', 
        'product_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sellProduct()
    {
        return $this->hasMany(SellProduct::class);
    }

    
}