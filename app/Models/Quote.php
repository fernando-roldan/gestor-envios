<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_id',
        'provider_id',
        'price',
        'total',
        'description',
        'status',
    ];

    public function shipping(): BelongsTo {

        return $this->belongsTo(Shipping::class);
    }

    public function provider(): BelongsTo {

        return $this->belongsTo(Provider::class);
    }

    public function historyShipping() {

        return $this->belongsToMany(Shipping::class, 'history_shippings', 'quote_id', 'shipping_id')
            ->withPivot('status', 'total_price', 'created_at');
    }
}
