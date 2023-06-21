<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SellProduct;
use App\Models\Customer;

class SellOrder extends Model
{
    protected $fillable = [
        'quantity', 
        'customer_id', 
        'product_id',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sellProducts()
    {
        return $this->hasMany(SellProduct::class);
    }

    
}