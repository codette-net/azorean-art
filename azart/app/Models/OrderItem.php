<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_variant_id',
        'title_snapshot',
        'unit_price_cents',
        'quantity',
        'total_cents',
    ];
}
