<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    protected $fillable = [
        'order_number',
        'status', // e.g., 'pending', 'paid', 'fulfilled', 'cancelled'
        'payment_status',
        'payment_method', // e.g., 'mollie', 'cash'
        'payment_reference', // e.g., Mollie payment ID
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_name',
        'shipping_address_line_1',
        'shipping_address_line_2',
        'shipping_postal_code',
        'shipping_city',
        'shipping_country',
        'shipping_zone_id',
        'subtotal_cents',
        'shipping_cents',
        'total_cents',
        'currency',
        'notes',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingZone(): BelongsTo
    {
        return $this->belongsTo(ShippingZone::class);
    }
}
