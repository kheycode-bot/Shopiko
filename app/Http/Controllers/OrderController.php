<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF; 




class OrderController extends Controller {

public function createOrder()
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

    // Optionally, return a response or redirect
    return redirect()->route('orders.index')->with('success', 'Order Created');
}



public function printBill($orderId)
{
    // Retrieve the order and its related products
    $order = Order::with('products')->findOrFail($orderId);

    // Use the DomPDF wrapper directly
    $pdf = app('dompdf.wrapper');
    $pdf->loadView('admin.user_bill', compact('order'));

    // Download the PDF file
    return $pdf->download('order_' . $order->id . '_bill.pdf');
}



}