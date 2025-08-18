<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address',
        'product_title', 'product_id', 'quantity', 'price', 'image', 'customization_data', 'preview_image', 'unit_price', 'color',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUnitPriceAttribute()
{
    return $this->quantity > 0 ? $this->price / $this->quantity : 0;
}

public function getColorHexAttribute()
{
    $colors = [
        'Red' => '#FF0000',
        'Green' => '#00FF00',
        'Blue' => '#0000FF',
        'Yellow' => '#FFFF00',
        'Magenta' => '#FF00FF',
        'Cyan' => '#00FFFF',
        'Black' => '#000000',
        'White' => '#FFFFFF',
        'Orange' => '#FFA500',
        'Purple' => '#800080',
        'Brown' => '#A52A2A',
        'Pink' => '#FFC0CB',
        'Gray' => '#808080',
        'Dark Green' => '#008000',
        'Navy Blue' => '#000080',
        'Tomato' => '#FF6347',
        'Turquoise' => '#40E0D0',
        'Violet' => '#EE82EE',
        'Wheat' => '#F5DEB3',
        'Steel Blue' => '#4682B4'
    ];

    return $colors[$this->color] ?? '#FFFFFF';
}
}

