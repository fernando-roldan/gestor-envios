<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'phone',
        'country_code',
        'location',
        'postal_code',
        'address',
        'country_id',
        'country_state_id',
        'active',
        'bio',
        'create_by_id', 
    ];

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }

    public function quote(): HasMany {

        return $this->hasMany(Quote::class);
    }

    public function shipping(): HasMany {

        return $this->hasMany(Shipping::class);
    }
}
