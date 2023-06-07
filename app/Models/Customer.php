<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'address', 
        'postal_code', 
        'city'
    ];

    public function sellOrders()
    {
        return $this->hasMany(SellOrder::class);
    }
}