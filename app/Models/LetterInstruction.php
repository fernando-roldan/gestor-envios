<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LetterInstruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_boarding',
        'suffixx',
        'bill',
        'net_weight',
        'gross_weight',
        'pallet',
        'pallet_2',
        'pallet_3',
        'customer_id',
        'referrals',
    ];

    public function customer(): BelongsTo {

        return $this->belongsTo(Customer::class);
    }
}
