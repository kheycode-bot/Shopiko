<!DOCTYPE html>
<html>
<head>
    <title>Order Status Update</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .footer { margin-top: 20px; padding: 10px; text-align: center; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Order Status Update</h2>
        </div>
        
        <div class="content">
            <p>Hello {{ $order->name }},</p>
            
            <p>The status of your order <strong>#{{ $order->tracking_id ?? $order->id }}</strong> has been updated to: 
            <strong>{{ ucfirst($status) }}</strong>.</p>
            
            @if($status == 'shipped' && $order->tracking_number)
                <p>Your tracking number is: <strong>{{ $order->tracking_number }}</strong></p>
            @endif
            
            <p>Order Details:</p>
            <ul>
                <li>Product: {{ $order->product_title }}</li>
                <li>Quantity: {{ $order->quantity }}</li>
                <li>Total: {{ number_format($order->price, 2) }} PKR</li>
            </ul>
            
            <p>You can view your order details by logging into your account.</p>
        </div>
        
        <div class="footer">
            <p>If you have any questions, please contact our support team.</p>
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>