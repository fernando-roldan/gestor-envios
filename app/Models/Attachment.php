<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'media';

    /**
     * 
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
