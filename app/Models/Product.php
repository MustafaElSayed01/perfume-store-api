<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    // Fillable fields
    protected $fillable = [
        'name',
        'slug',
        'description',
        'product_type_id',
        'gender',
        'price',
        'stock_quantity',
        'is_active',
    ];
    // Relationships
    public function product_type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }
    public function cart_items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
    public function order_items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
