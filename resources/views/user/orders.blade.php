<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopiko | My Orders</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .order-page {
            background-color: #f9fafb;
            padding: 60px 0;
        }
        
        .order-header {
            background: linear-gradient(135deg, #3a4660 0%, #2a3447 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(58, 70, 96, 0.1);
        }
        
        .order-header h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .breadcrumb {
            background: rgba(255,255,255,0.1);
            padding: 8px 15px;
            border-radius: 50px;
            display: inline-block;
        }
        
        .breadcrumb a {
            color: rgba(255,255,255,0.8);
        }
        
        .breadcrumb a:hover {
            color: white;
        }
        
        .breadcrumb span {
            color: rgba(255,255,255,0.5);
            margin: 0 8px;
        }
        
        .order-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .order-table thead {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
        }
        
        .order-table th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
            padding: 15px;
        }
        
        .order-table td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .product-thumbnail-container {
    position: relative;
    width: 100px;
    height: 100px;
}
.product-thumbnail-image {
    max-width: 100%;
    max-height: 100%;
    border-radius: 8px;
}
        .product-thumbnail img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        
        .product-thumbnail:hover img {
            transform: scale(1.05);
        }
        
        .status-icon {
            font-size: 17px;
            margin-right: 8px;
        }
        
        .status-pending { color: #54B435; }
        .status-processing { color: #54B435; }
        .status-packaging { color: #FF577F; }
        .status-shipped { color: #AA77FF; }
        .status-on-the-way { color: #FF6000; }
        .status-delivered { color: #3EC70B; }
        
        .detail-qty {
            width: 60px;
            height: 30px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .price-display {
            color: #FF7B54;
            font-weight: 600;
        }
        
        .action-btn {
            background: none;
            border: none;
            color: #3a4660;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 4px;
        }
        
        .action-btn:hover {
            background: #f3f4f6;
            text-decoration: none;
        }
        
        .action-btn i {
            margin-right: 5px;
        }
        
        .cancel-btn {
            color: #ef4444;
        }
        
        .cancel-btn:hover {
            background: rgba(239, 68, 68, 0.1);
        }
        
        .received-btn {
            color: #3EC70B;
        }
        
        .received-btn:hover {
            background: rgba(62, 199, 11, 0.1);
        }
        
        .divider-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #3a4660;
            margin: 30px 0 15px;
            position: relative;
            text-align: center;
        }
        
        .divider-title:before,
        .divider-title:after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e5e7eb;
            margin: auto;
        }
        
        .divider-title:before {
            margin-right: 15px;
        }
        
        .divider-title:after {
            margin-left: 15px;
        }
        
        .empty-orders {
            text-align: center;
            padding: 50px 0;
        }
        
        .empty-orders img {
            max-width: 300px;
            margin-bottom: 30px;
        }
        
        .empty-orders h2 {
            color: #3a4660;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .empty-orders p {
            color: #6b7280;
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .btn-shop {
            background: linear-gradient(45deg, #3a4660, #2a3447);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(58, 70, 96, 0.2);
            transition: all 0.3s ease;
        }
        
        .btn-shop:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(58, 70, 96, 0.3);
            color: white;
        }
        
        @media (max-width: 768px) {
            .order-header h1 {
                font-size: 2rem;
            }
            
            .order-table thead {
                display: none;
            }
            
            .order-table tr {
                display: block;
                margin-bottom: 20px;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 15px;
            }
            
            .order-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 0;
                border-bottom: 1px solid #f3f4f6;
            }
            
            .order-table td:before {
                content: attr(data-title);
                font-weight: 600;
                color: #3a4660;
                margin-right: 15px;
            }
            
            .order-table td:last-child {
                border-bottom: none;
            }
            
            .product-thumbnail {
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @include('user.header')
    @include('user.mobile_header')    
    <main class="main">
        <div class="order-page">
            <div class="container">
                <div class="order-header text-center">
                    <h1>Your Orders</h1>
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Shop
                        <span></span> Your Orders
                    </div>
                </div>
                
                <div class="row">
                    @if ($orderData->isEmpty())
                    <div class="col-12">
                        <div class="empty-orders">
                            <img src="{{ asset('user/assets/imgs/empty-cart-img.png') }}" alt="Empty Orders">
                            <h2>You Have No Orders Yet</h2>
                            <p>Start shopping to see your orders here</p>
                            <a href="{{ route('user.shop') }}" class="btn-shop">
                                <i class="fas fa-shopping-bag mr-2"></i>Start Shopping
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="order-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7" class="divider-title">Active Orders</td>
                                    </tr>
                                    @foreach ($orderData as $order)
                                    <tr>
                                    <td class="product-thumbnail" data-title="Product">
    <div class="product-thumbnail-container">
        @if($order->preview_image)
            <img src="{{ asset($order->preview_image) }}" 
                 class="product-thumbnail-image"
                 alt="Customized Product">
        @else
            <img src="{{ asset('products_images/' . $order->image) }}" 
                 class="product-thumbnail-image"
                 alt="{{ $order->product_title }}">
        @endif
    </div>
    <div class="product-name mt-2">
        {{ $order->product_title }}
    </div>
</td>
                                        <td data-title="Order ID">
                                            <span class="tracking-id">{{ $order->tracking_id }}</span>
                                        </td>
                                        <td class="status" data-title="Status">
                                            @if($order->delivery_status == 'pending')
                                                <i class="fas fa-check status-icon status-pending"></i>
                                                <span>Pending</span>
                                            @elseif($order->delivery_status == 'processing')
                                                <i class="far fa-check-circle status-icon status-processing"></i>
                                                <span>Processing</span>
                                            @elseif($order->delivery_status == 'packaging')
                                                <i class="fas fa-box status-icon status-packaging"></i>
                                                <span>Packaging</span>
                                            @elseif($order->delivery_status == 'shipped')
                                                <i class="fas fa-truck-loading status-icon status-shipped"></i>
                                                <span>Shipped</span>
                                            @elseif($order->delivery_status == 'on_the_way')
                                                <i class="fas fa-truck status-icon status-on-the-way"></i>
                                                <span>On The Way</span>
                                            @elseif($order->delivery_status == 'delivered')
                                                <i class="fas fa-check-circle status-icon status-delivered"></i>
                                                <span>Delivered</span>
                                            @endif
                                        </td>
                                        <td data-title="Quantity">
                                            <div class="detail-qty">
                                                <span class="qty-val">{{ $order->quantity }}</span>
                                            </div>
                                        </td>
                                        <td data-title="Total">
                                            <span class="price-display">
<i class="fa-solid fa-rupee-sign"></i> {{ number_format($order->total_price, 2) }}
                                            </span>
                                        </td>
                                        <td data-title="View">
                                            <a href="#" class="action-btn">
                                                <i class="fas fa-eye"></i> Details
                                            </a>
                                        </td>
                                        <td data-title="Action">
                                            @if($order->delivery_status == 'pending')
                                                <a href="{{ url('/cancel-order', $order->id) }}" 
                                                   class="action-btn cancel-btn"
                                                   onclick="return confirm('Are you sure you want to cancel this order?')">
                                                    <i class="fas fa-trash"></i> Cancel
                                                </a>
                                            @elseif($order->delivery_status == 'delivered')
                                                <a href="{{ url('/order-received', $order->id) }}" 
                                                   class="action-btn received-btn">
                                                    <i class="fas fa-check"></i> Received
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    @if($past_orders->isNotEmpty())
                                    <tr>
                                        <td colspan="7" class="divider-title">Past Orders</td>
                                    </tr>
                                    @foreach ($past_orders as $order)
                                    <tr>
                                    <td class="product-thumbnail" data-title="Product">
    <div class="product-thumbnail-container">
        @if($order->preview_image)
            <img src="{{ asset($order->preview_image) }}" 
                 class="product-thumbnail-image"
                 alt="Customized Product">
        @else
            <img src="{{ asset('products_images/' . $order->image) }}" 
                 class="product-thumbnail-image"
                 alt="{{ $order->product_title }}">
        @endif
    </div>
    <div class="product-name mt-2">
        {{ $order->product_title }}
    </div>
</td>
                                        <td data-title="Order ID">
                                            <span class="tracking-id">{{ $order->tracking_id }}</span>
                                        </td>
                                        <td class="status" data-title="Status">
                                            <i class="fas fa-check-circle status-icon status-delivered"></i>
                                            <span>Completed</span>
                                        </td>
                                        <td data-title="Quantity">
                                            <div class="detail-qty">
                                                <span class="qty-val">{{ $order->quantity }}</span>
                                            </div>
                                        </td>
                                      <td data-title="Total">
    <span class="price-display">
<i class="fa-solid fa-rupee-sign"></i> {{ number_format($order->total_price, 2) }}
    </span>
</td>
                                        <td data-title="View">
                                            <a href="{{ url('/product_details', $order->product_id) }}" class="action-btn">
                                                <i class="fas fa-eye"></i> View Again
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @include('user.footer')    
    <script src="{{ asset('user/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('user/assets/js/main.js') }}"></script>
    <script src="{{ asset('user/assets/js/shop.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            // Add hover effects to product images
            $('.product-thumbnail img').hover(
                function() {
                    $(this).css('transform', 'scale(1.05)');
                },
                function() {
                    $(this).css('transform', 'scale(1)');
                }
            );
            
            // Confirm before canceling order
            $('.cancel-btn').click(function(e) {
                if(!confirm('Are you sure you want to cancel this order?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>