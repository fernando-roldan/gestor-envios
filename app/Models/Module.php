<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Module extends Model
{
    //------------------- ESTE MODELO NO FUNCIONA ---------------------- //
    use HasFactory;
    
    /**
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'actions',
    ];

    /**
     * 
     * @var array
     */
    protected $casts = [
        'actions' => 'array'
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'module_id');
    }
}
