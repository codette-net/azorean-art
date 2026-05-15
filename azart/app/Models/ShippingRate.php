<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    protected $fillable = [
        'variant_id',
        'shipping_zone_id',
        'weight_from',
        'weight_to',
        'amount_cents',
        'notes',
    ];
}
