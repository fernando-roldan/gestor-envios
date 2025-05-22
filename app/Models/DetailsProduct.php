<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'u_m',
        'quantity',
        'price',
        'weight',
        'volume'
    ];

    public function products() {

        return $this->hasMany(Product::class);
    }
}
