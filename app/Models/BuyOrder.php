<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BuyProduct;
use App\Models\Supplier;

class BuyOrder extends Model
{
  protected $fillable = [
    'quantity', 
    'supplier_id', 
    'product_id',
  ];
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function buyProducts()
    {
        return $this->hasMany(BuyProduct::class);
    }
    
}
