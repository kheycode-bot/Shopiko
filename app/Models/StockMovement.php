<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'movement_type',
        'previous_stock',
        'new_stock',
        'reference_type',
        'reference_id',
        'notes'
    ];

    protected $casts = [
        'previous_stock' => 'integer',
        'new_stock' => 'integer',
        'quantity' => 'integer'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reference()
    {
        return $this->morphTo();
    }
}