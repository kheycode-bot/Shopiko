<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';


    protected $fillable = [
    'user_id',
    'name',
    'email',
    'phone',
    'address',
    'notes', 
    'product_id',
    'product_title',
    'quantity',
    'price',
    'unit_price',
    'image',
    'preview_image',
    'customization_data',
    'color',
    'tracking_id',
    'delivery_status',
    'payment_status',
    'total_price',
    'order_date'
];

    public function products()
    {
    return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function customer()
    {
    return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatusAttribute()
{
    return [
        'pending' => 'Pending',
        'processing' => 'Processing',
        'shipped' => 'Shipped',
        'delivered' => 'Delivered'
    ][$this->delivery_status] ?? 'Unknown';
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

    $color = strtolower($this->color);
    return $colors[$color] ?? '#CCCCCC'; 
}


public function getTotalAttribute()
{
    return $this->price; 
}

function formatCurrency($amount)
{
    return 'PKR ' . number_format($amount, 2);
}
    
}
