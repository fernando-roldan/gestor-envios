<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $appends = [
        'role',
    ];

    protected $with = [
        'media'
    ];
    
    public static function booted()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->created_by_id = \App\Helpers\Helpers::isUserLogin() ? \App\Helpers\Helpers::getCurrentUserId() : $model->id;
        });
    }

    /**
     * Get the user's role.
     */
    public function getRoleAttribute()
    {
        return $this->getRoleNames()->first(); // de Spatie
    }

    /**
     * Get the user's all permissions.
     */
    public function getPermissionAttribute()
    {
        return $this->getAllPermissions();
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    
    /**
     * 
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * 
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function customer(): HasMany {

        return $this->hasMany(Customer::class, 'create_by');
    }

    public function product(): HasMany {

        return $this->hasMany(Product::class);
    }

    public function providers(): HasMany {

        return $this->hasMany(Provider::class, 'create_by');
    }

    public function hasAnyRole(array $roles): bool {

        return in_array($this->role, $roles);
    }
}
