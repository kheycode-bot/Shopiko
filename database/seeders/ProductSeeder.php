<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'title' => 'Sample Product',
            'category' => 'Electronics',
            'quantity' => 10,
            'price' => 100,
            'discount_price' => 80,
            'image' => 'product.png',

        ]);
    }
}
