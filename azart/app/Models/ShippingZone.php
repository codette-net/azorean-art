<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class ShippingZone extends Model
{
    protected $fillable = [
        'name',
        'code',
        'is_active',
    ];


    public function shippingRates()
    {
        return $this->hasMany(ShippingRate::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
