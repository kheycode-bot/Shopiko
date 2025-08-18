<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Add sample categories
        Category::create(['category_name' => 'Electronics']);
        Category::create(['category_name' => 'Furniture']);
        Category::create(['category_name' => 'Clothing']);
        Category::create(['category_name' => 'Sports']);
        Category::create(['category_name' => 'Books']);
    }
}
