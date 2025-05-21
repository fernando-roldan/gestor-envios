<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerContact extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'customer_id',
        'first_name', 
        'last_name',
        'email',
        'phone',
        'phone_2'
    ];

    public function customer(): BelongsTo {

        return $this->belongsTo(Customer::class);
    }
}
