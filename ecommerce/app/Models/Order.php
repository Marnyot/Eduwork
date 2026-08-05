<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /**
     * Kolom yang boleh diisi secara massal (mass assignment).
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total',
        'status',
    ];

    /**
     * Order dimiliki oleh satu user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Order merujuk pada satu produk.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
