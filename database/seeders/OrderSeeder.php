<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Insert the order
    $order = new Order();
    $order->product_id = 1;  // Ensure this product exists in the products table
    $order->user_id = 1;     // Ensure this user exists in the users table
    $order->total_price = 100.00;
    $order->payment_status = 'paid';
    $order->product_title = 'Product Name';  // Populate product name (if applicable)
    $order->name = 'John Doe';  // Assuming this is the customer name
    $order->email = 'john.doe@example.com';  // Assuming this is the customer's email
    $order->created_at = now();
    $order->updated_at = now();
    $order->save();
}
}
