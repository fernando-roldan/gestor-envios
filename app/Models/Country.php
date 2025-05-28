<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'currency',
        'currency_symbol',
        'iso_3166_2',
        'iso_3166_3',
        'calling_code',
        'flag',
        'currency_code',
        'is_visible',
        'uid'
    ];
    public function countryState(): HasMany
    {
        return $this->hasMany(CountryState::class, 'country_id');
    }
}
