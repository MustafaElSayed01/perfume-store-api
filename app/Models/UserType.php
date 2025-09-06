<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserType extends Model
{
    /** @use HasFactory<\Database\Factories\UserTypeFactory> */
    use HasFactory;

    // Fillable attributes
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    // Relationships
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            Permission::class,
            'role_permissions',
            'user_type_id',
            'permission_id'
        )->withTimestamps()->withPivot('id', 'deleted_at');
    }
}