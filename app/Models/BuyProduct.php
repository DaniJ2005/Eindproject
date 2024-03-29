<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\BuyOrder;

class BuyProduct extends Model
{
    protected $fillable = [
      'buy_order_id',
      'product_id',
      'quantity',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function buyOrders()
    {
        return $this->belongsTo(BuyOrder::class);
    }
}
