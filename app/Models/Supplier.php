<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $fillable = [
    'name', 
    'contact', 
    'email', 
    'address', 
    'postal_code', 
    'city'
];
    
    public function products()
    {
      return $this->belongsToMany(Product::class, 'buy_orders', 'supplier_id', 'product_id')
        ->withPivot('quantity')
        ->withTimestamps();
    }

    public function buyOrders()
    {
        return $this->hasMany(BuyOrder::class);
    }
    
    
}
