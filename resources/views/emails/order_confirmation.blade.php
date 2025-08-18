<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation #{{ $order->tracking_id }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .order-details { margin-bottom: 20px; }
        .order-item { margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <h1>Thank you for your order!</h1>
    
    <div class="order-details">
        <p><strong>Order Number:</strong> {{ $order->tracking_id }}</p>
        <p><strong>Order Date:</strong> {{ $order->order_date->format('F j, Y') }}</p>
        <p><strong>Total Amount:</strong> PKR{{ number_format($order->total_price, 2) }}</p>
    </div>
    
    <h2>Order Items:</h2>
    @foreach($orderItems as $item)
    <div class="order-item">
        <p><strong>{{ $item->product_title }}</strong></p>
        <p>Quantity: {{ $item->quantity }}</p>
        <p>Price: PKR{{ number_format($item->price, 2) }}</p>
    </div>
    @endforeach
    
    <p>We'll notify you when your order ships. You can check your order status anytime in your account.</p>
    
    <p>Thank you for shopping with us!</p>
</body>
</html>