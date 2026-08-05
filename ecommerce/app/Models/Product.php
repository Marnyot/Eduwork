<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * Kolom yang boleh diisi secara massal (mass assignment).
     */
    protected $fillable = [
        'name',
        'desc',
        'price',
        'stock',
        'category_id',
    ];

    /**
     * Produk dimiliki oleh satu kategori.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
