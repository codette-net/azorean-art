<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_active',
        'cover_image',
        'base_currency',
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }


}
