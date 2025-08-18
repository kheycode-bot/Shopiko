<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'quantity',
        'price',
        'discount_price',
        'image',
        'stock',
        'low_stock_threshold'
    ];

    protected $appends = ['image_url', 'category_name'];

 
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
    
public function orders()
{
    return $this->hasMany(Order::class);
}


    public function getCategoryNameAttribute()
    {
        if (is_string($this->category)) {
            return $this->category;
        }
        return $this->category ? $this->category->category_name : null;
    }

  
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset('admin/assets/images/default-product.png');
        }

        $imageName = basename($this->image);
        
        $locations = [
            'products_images/' => public_path('products_images/'.$imageName),
            'storage/products/' => public_path('storage/products/'.$imageName)
        ];

        foreach ($locations as $path => $fullPath) {
            if (file_exists($fullPath)) {
                return asset($path.$imageName);
            }
        }

        Log::warning("Product image not found", [
            'product_id' => $this->id,
            'image_path' => $this->image,
            'checked_locations' => array_keys($locations)
        ]);
        
        return asset('admin/assets/images/default-product.png');
    }

    
    public function checkLowStock(): bool
    {
        if ($this->low_stock_threshold && $this->stock <= $this->low_stock_threshold) {
            return true;
        }
        return false;
    }

    public function checkOverstock(): bool
    {
        if ($this->stock > $this->quantity * 1.5) { // 50% more than expected quantity
            return true;
        }
        return false;
    }

    public function recordStockMovement(int $quantity, string $type, string $notes = null, Model $reference = null): StockMovement
    {
        $previousStock = $this->stock;
        
        if ($type === 'deduction') {
            $this->stock -= abs($quantity);
        } else {
            $this->stock += abs($quantity);
        }

        $this->save();

        return $this->stockMovements()->create([
            'user_id' => auth()->id(),
            'quantity' => abs($quantity),
            'movement_type' => $type,
            'previous_stock' => $previousStock,
            'new_stock' => $this->stock,
            'reference_type' => $reference ? get_class($reference) : null,
            'reference_id' => $reference ? $reference->id : null,
            'notes' => $notes
        ]);
    }

}