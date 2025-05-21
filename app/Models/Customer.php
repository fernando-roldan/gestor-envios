<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'create_by',
        'cust_num',
        'cust_seq',
        'name',
        'city',
        'state',
        'zip',
        'country',
        'address',
        'address_2',
        'update_by',
    ];

    public function lettersInstructions(): HasMany {

        return $this->hasMany(LetterInstruction::class);
    }

    public function customerContact(): HasMany {

        return $this->hasMany(CustomerContact::class);
    }

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }
}
