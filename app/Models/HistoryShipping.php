<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryShipping extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'shipping_id',
        'quote_id',
        'status',
        'total_price'
    ];

    
}
