<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'name',
        'description',
    ];

    // Relationships
    public function roles(): HasMany
    {
        return $this->hasMany(RolePermission::class);
    }
}
