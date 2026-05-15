<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany; 


class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'title',
        'language',
        'format',
        'weight_grams',
        'price_cents',        
        'is_active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
