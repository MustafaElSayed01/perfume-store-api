<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolePermission extends Model
{
    /** @use HasFactory<\Database\Factories\RolePermissionFactory> */
    use HasFactory;

    protected $table = 'role_permissions';

    // Fillable fields
    protected $fillable = [
        'user_type_id',
        'permission_id',
    ];

    // Relationships
    public function user_type(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
