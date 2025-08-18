<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopiko | My Cart</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="user/assets/css/main.css">
    <link rel="stylesheet" href="user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .cart-page {
            background-color: #f9fafb;
            padding: 60px 0;
        }
        
        .cart-header {
            background: linear-gradient(135deg, #3a4660 0%, #2a3447 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(58, 70, 96, 0.1);
        }
        
        .cart-header h1 {
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
        
        .cart-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .cart-table thead {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
        }
        
        .cart-table th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
            padding: 15px;
        }
        
        .cart-table td {
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
        .color-display {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: inline-block;
            border: 1px solid #ddd;
        }
        
        .product-thumbnail img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            transition: transform 0.3s ease;
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
        
        .product-thumbnail:hover img {
            transform: scale(1.05);
        }
        
        .product-name a {
            color: #3a4660;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .product-name a:hover {
            color: #845007;
            text-decoration: none;
        }
        
        .remove-btn {
            background: none !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            color: #9ca3af !important;
        }

        .product-thumbnail {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }

        form {
            margin: 0;
            padding: 0;
            border: none;
            outline: none;
        }
        
        button:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        
.color-display {
    display: inline-block;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.color-name {
    vertical-align: middle;
    font-weight: 500;
    color: #4b5563;
}
        
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .qty-btn {
            width: 30px;
            height: 30px;
            background: #f3f4f6;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .qty-btn:hover {
            background: #e5e7eb;
        }
        
        .qty-val {
            min-width: 40px;
            text-align: center;
            font-weight: 600;
            margin: 0 10px;
        }
        
        .remove-btn {
            background: none;
            border: none;
            color: #9ca3af;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .remove-btn:hover {
            color: #ef4444;
        }
        
        .cart-actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .btn-continue {
            background: white;
            color: #3a4660;
            border: 1px solid #e5e7eb;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-continue:hover {
            background: #f3f4f6;
            transform: translateY(-2px);
        }
        
        .btn-checkout {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(133, 80, 7, 0.2);
            transition: all 0.3s ease;
        }
        
        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(133, 80, 7, 0.3);
            color: white;
        }
        
        .cart-totals {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .cart-totals h4 {
            color: #3a4660;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .cart-totals h4:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(45deg, #c9af98, #845007);
            border-radius: 3px;
        }
        
        .cart-totals table {
            width: 100%;
        }
        
        .cart-totals td {
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .cart-totals .cart_total_label {
            color: #6b7280;
        }
        
        .cart-totals .cart_total_amount {
            text-align: right;
            font-weight: 600;
            color: #3a4660;
        }
        
        .cart-totals .total-price {
            font-size: 24px;
            color: #845007;
            font-weight: 700;
        }
        
        .empty-cart {
            text-align: center;
            padding: 50px 0;
        }
        
        .empty-cart img {
            max-width: 300px;
            margin-bottom: 30px;
        }
        
        .empty-cart h2 {
            color: #3a4660;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .empty-cart p {
            color: #6b7280;
            margin-bottom: 30px;
            font-size: 18px;
        }
        
        .btn-empty {
            background: linear-gradient(45deg, #3a4660, #2a3447);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(58, 70, 96, 0.2);
            transition: all 0.3s ease;
        }
        
        .btn-empty:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(58, 70, 96, 0.3);
            color: white;
        }
        
        
        @media (max-width: 768px) {
            .cart-header h1 {
                font-size: 2rem;
            }
            
            .cart-table thead {
                display: none;
            }
            
            .cart-table tr {
                display: block;
                margin-bottom: 20px;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 15px;
            }
            
            .cart-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 0;
                border-bottom: 1px solid #f3f4f6;
            }
            
            .cart-table td:before {
                content: attr(data-title);
                font-weight: 600;
                color: #3a4660;
                margin-right: 15px;
            }
            
            .cart-table td:last-child {
                border-bottom: none;
            }
            
            .product-thumbnail {
                margin: 0 auto;
            }
            
            .cart-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn-continue, .btn-checkout {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')    
    <main class="main">
        <div class="cart-page">
            <div class="container">
                <div class="cart-header text-center">
                    <div class="container">
                        <h1>Your Shopping Cart</h1>
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow">Home</a>
                            <span></span> Shop
                            <span></span> Your Cart
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    @if ($cartData->isEmpty())
                    <div class="col-12">
                        <div class="empty-cart">
                            <img src="{{ asset('user/assets/imgs/empty-cart-img.png') }}" alt="Empty Cart">
                            <h2>Your Cart is Empty</h2>
                            <p>Looks like you haven't added anything to your cart yet</p>
                            <a href="{{route('user.shop')}}" class="btn-empty">
                                <i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping
                            </a>
                        </div>
                    </div>
                    @else
                    <?php $totalPrice = 0; ?>
                    <div class="col-12">
                        <div class="cart-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                            <th>PRODUCT</th>
                                            <th>COLOR</th>
                                            <th>PRICE</th>
                                            <th>QUANTITY</th>
                                            <th>TOTAL</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($cartData as $cart)
                                        <tr>
                                        <td class="product-thumbnail" data-title="PRODUCT">
    <div class="product-thumbnail-container">
        @if($cart->preview_image)
            <img src="{{ asset($cart->preview_image) }}" 
                 class="product-thumbnail-image"
                 alt="Customized Product">
        @else
            <img src="{{ asset('products_images/' . $cart->image) }}" 
                 class="product-thumbnail-image"
                 alt="{{ $cart->product_title }}">
        @endif
    </div>
    <div class="product-name">
        <h5>{{ $cart->product_title }}</h5>
    </div>
</td>
                                            
                                            <td class="color" data-title="COLOR">
                                            @if($cart->color)
                                                <div class="color-display" style="background-color: {{ $cart->getColorHexAttribute() }};"></div>
                                                 <span class="color-name">{{ ucfirst($cart->color) }}</span>
                                            @else
                                                <span class="text-muted">Not specified</span>
                                            @endif
                                            </td>
                                        
                                        <td class="price" data-title="Price">
                                            <span>PKR {{ number_format($cart->unit_price, 2) }}</span>
                                        </td>
                                        
                                        <td class="quantity" data-title="Quantity">
                                            <div class="quantity-controls">
                                                <button class="qty-btn minus" data-id="{{ $cart->id }}">-</button>
                                                <span class="qty-val">{{$cart->quantity}}</span>
                                                <button class="qty-btn plus" data-id="{{ $cart->id }}" disabled>+</button>
                                            </div>
                                        </td>
                                        <td class="total" data-title="Total">
                                            <span>PKR {{ number_format($cart->price, 2) }}</span>
                                        </td>
                                        
                                        <td class="remove" data-title="Remove">
                                            <form action="{{ route('remove.cart.item', $cart->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="remove-btn">
                                                    <i class="fi-rs-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $totalPrice += $cart->price ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="cart-actions">
                            <a href="{{route('user.shop')}}" class="btn-continue">
                                <i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping
                            </a>
                            <div>
                                <a href="{{route('user.clear_cart')}}" class="text-muted mr-20" onclick="return confirm('Are you sure you want to clear your cart?')">
                                    <i class="fi-rs-cross-small mr-5"></i>Clear Cart
                                </a>
                                <a href="{{route('user.checkout')}}" class="btn-checkout">
                                    <i class="fi-rs-box-alt mr-10"></i> Proceed to Checkout
                                </a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-5 ms-auto">
                                <div class="cart-totals">
                                    <h4>Cart Totals</h4>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="cart_total_label">Subtotal</td>
                                                <td class="cart_total_amount">PKR {{ number_format($totalPrice, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount">Free Shipping</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount total-price">PKR {{ number_format($totalPrice, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-end mt-4">
                                        <a href="{{route('user.checkout')}}" class="btn-checkout">
                                            <i class="fi-rs-box-alt mr-10"></i> Proceed to Checkout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    @include('user.footer')    
    <script src="user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="user/assets/js/plugins/slick.js"></script>
    <script src="user/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="user/assets/js/plugins/wow.js"></script>
    <script src="user/assets/js/plugins/jquery-ui.js"></script>
    <script src="user/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="user/assets/js/plugins/magnific-popup.js"></script>
    <script src="user/assets/js/plugins/select2.min.js"></script>
    <script src="user/assets/js/plugins/waypoints.js"></script>
    <script src="user/assets/js/plugins/counterup.js"></script>
    <script src="user/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="user/assets/js/plugins/images-loaded.js"></script>
    <script src="user/assets/js/plugins/isotope.js"></script>
    <script src="user/assets/js/plugins/scrollup.js"></script>
    <script src="user/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="user/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="user/assets/js/plugins/jquery.elevatezoom.js"></script>
    <script src="user/assets/js/main.js?v=3.3"></script>
    <script src="user/assets/js/shop.js?v=3.3"></script>
    
    <script>
         $(document).ready(function() {
        $('.qty-btn.minus').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var id = btn.data('id');
            var qtyElement = btn.siblings('.qty-val');
            var currentQty = parseInt(qtyElement.text());
            
            if (currentQty > 1) {
                var newQty = currentQty - 1;
                qtyElement.text(newQty);
                
                $.ajax({
                    url: '/update-cart-item/' + id,
                    method: 'POST',
                    data: {
                        quantity: newQty,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            qtyElement.text(currentQty);
                            swal("Error", response.message || "Failed to update quantity", "error");
                        }
                    },
                    error: function(xhr) {
                        qtyElement.text(currentQty);
                        swal("Error", xhr.responseJSON?.message || "Failed to update quantity", "error");
                    }
                });
            }
        });

        $('.qty-btn.plus').prop('disabled', true).css('cursor', 'not-allowed');
        
        $('[href="{{route('user.clear_cart')}}"]').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: 'Clear Your Cart?',
                text: 'This will remove all items from your cart. Are you sure?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willClear) => {
                if (willClear) {
                    window.location.href = url;
                }
            });
        });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('form').forEach(form => {
                form.style.border = 'none';
                form.style.outline = 'none';
            });
            
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('focus', function(e) {
                    this.style.outline = 'none';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>