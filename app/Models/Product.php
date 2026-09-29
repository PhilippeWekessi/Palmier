<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'reference',
        'short_description',
        'description',
        'variety',
        'age',
        'price',
        'old_price',
        'stock',
        'low_stock_threshold',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'old_price' => 'decimal:2',
            'stock' => 'integer',
            'low_stock_threshold' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // --- Relations ---

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('position');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews(): HasMany
    {
        return $this->reviews()->where('status', 'approved');
    }

    // --- Scopes ---

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    // --- Accesseurs utilitaires ---

    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    public function isLowStock(): bool
    {
        return $this->stock > 0 && $this->stock <= $this->low_stock_threshold;
    }

    public function hasDiscount(): bool
    {
        return ! is_null($this->old_price) && $this->old_price > $this->price;
    }

    /**
     * URLs de la galerie : image principale en premier, puis les images
     * de la table product_images (relation `images`, déjà triée par position).
     */
    public function galleryImageUrls(): Collection
    {
        $urls = collect();

        if ($this->image) {
            $urls->push(asset('storage/'.$this->image));
        }

        foreach ($this->images as $image) {
            $urls->push(asset('storage/'.$image->path));
        }

        return $urls->unique()->values();
    }
}