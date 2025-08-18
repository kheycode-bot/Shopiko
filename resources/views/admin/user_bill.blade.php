<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - Order #{{ $order->tracking_id ?? 'ORD-'.$order->id }}</title>
    <style>
        body{font-family:Helvetica,Arial,sans-serif;margin:0;padding:15px;color:#333;line-height:1.4}
        .container{max-width:800px;margin:0 auto}
        .header{text-align:center;margin-bottom:20px;padding-bottom:15px;border-bottom:1px solid #ddd}
        .header h1{margin:0;color:#2c3e50;font-size:24px}
        .header p{margin:5px 0;color:#7f8c8d}
        .section{margin-bottom:20px}
        .section-title{font-size:18px;color:#2c3e50;border-bottom:1px solid #eee;padding-bottom:5px;margin:15px 0 10px}
        table{width:100%;border-collapse:collapse;margin-bottom:20px}
        th{text-align:left;padding:8px;background:#f5f5f5;border-bottom:1px solid #ddd}
        td{padding:8px;border-bottom:1px solid #eee}
        .total-row{font-weight:bold;background:#f9f9f9}
        .text-right{text-align:right}
        .badge{padding:3px 8px;border-radius:3px;font-size:12px;font-weight:600;display:inline-block}
        .badge-success{background:#27ae60;color:#fff}
        .badge-warning{background:#f39c12;color:#fff}
        .badge-info{background:#3498db;color:#fff}
        .badge-danger{background:#e74c3c;color:#fff}
        .badge-secondary{background:#95a5a6;color:#fff}
        .address-box{padding:10px;background:#f9f9f9;border-radius:4px;margin-bottom:15px}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>INVOICE</h1>
            <p>Order #{{ $order->tracking_id ?? 'ORD-'.$order->id }}</p>
            <p>Date: {{ $order->created_at->format('M d, Y') }}</p>
        </div>

        <div class="section">
            <div class="row" style="display:flex;justify-content:space-between">
                <div style="width:48%">
                    <div class="section-title">Customer Information</div>
                    <div class="address-box">
                        <strong>{{ $order->name }}</strong><br>
                        {{ $order->address }}<br>
                        {{ $order->email }}<br>
                        Phone: {{ $order->phone ?? 'N/A' }}
                    </div>
                </div>
                <div style="width:48%">
                    <div class="section-title">Order Details</div>
                    <p><strong>Status:</strong> 
                        <span class="badge 
                            @if($order->delivery_status == 'delivered') badge-success
                            @elseif($order->delivery_status == 'pending') badge-warning
                            @elseif($order->delivery_status == 'processing') badge-info
                            @elseif($order->delivery_status == 'cancelled') badge-danger
                            @elseif($order->delivery_status == 'declined') badge-secondary
                            @endif">
                            {{ ucfirst($order->delivery_status) }}
                        </span>
                    </p>
                    @if($order->delivery_status == 'shipped' && $order->tracking_number)
                        <p><strong>Tracking #:</strong> {{ $order->tracking_number }}</p>
                    @endif
                    @if($order->notes)
                        <p><strong>Notes:</strong> {{ $order->notes }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Order Items</div>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong>{{ $order->product_title }}</strong>
                            @if($order->color)
                                <div style="margin-top:5px;font-size:13px">
                                    Color: {{ ucfirst($order->color) }}
                                </div>
                            @endif
                            @if($order->customization_data)
                                @php $custom = json_decode($order->customization_data, true) @endphp
                                @if(isset($custom['customText']))
                                    <div style="margin-top:5px;font-size:13px">
                                        Custom Text: "{{ $custom['customText'] }}"
                                    </div>
                                @endif
                            @endif
                        </td>
                        <td>PKR {{ number_format($order->total_price, 2) }}
 PKR</td>
                        <td>{{ $order->quantity }}</td>
                        <td class="text-right">{{ number_format($order->price, 2) }} PKR</td>
                    </tr>
                    <tr class="total-row">
    <td colspan="3" class="text-right">Subtotal:</td>
    <td class="text-right">PKR {{ number_format($order->total_price, 2) }}
</td>
</tr>
<tr class="total-row">
    <td colspan="3" class="text-right">Shipping:</td>
    <td class="text-right">0.00 PKR</td>
</tr>
<tr class="total-row">
    <td colspan="3" class="text-right">Total:</td>
    <td class="text-right">PKR {{ number_format($order->total_price, 2) }}
</td>
</tr>
                </tbody>
            </table>
        </div>

        <div style="text-align:center;margin-top:30px;padding-top:15px;border-top:1px solid #eee;font-size:12px;color:#7f8c8d">
            <p>Thank you for your business!</p>
            <p>Contact us at info@shopiko.com for any questions</p>
        </div>
    </div>
</body>
</html>