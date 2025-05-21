<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'customer_id',
        'status_id',
        'product_id',
        'provider_id',
        'currency',
        'cost',
        'quantity',
    ];

    public function customer(): BelongsTo {

        return $this->belongsTo(Customer::class);
    }

    public function provider(): BelongsTo {

        return $this->belongsTo(Provider::class);
    }

    public function product(): BelongsTo {

        return $this->belongsTo(Product::class);
    }

    public function status(): BelongsTo {

        return $this->belongsTo(Status::class);
    }

    public function quote(): HasMany {

        return $this->hasMany(Quote::class);
    }

    public function historyQuote() {

        return $this->belongsToMany(Quote::class, 'history_shippings', 'shipping_id', 'quote_id')
            ->withPivot('status', 'total_price', 'created_at');
    }
}
