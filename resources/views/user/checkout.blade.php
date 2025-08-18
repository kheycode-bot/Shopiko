<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopiko | Checkout</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="user/assets/css/main.css">
    <link rel="stylesheet" href="user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #scrollUp {
            bottom: 30px;
            left: 30px;
            right: auto;
            width: 50px;
            height: 50px;
            background: #3a4660;
            color: white;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            z-index: 9998;
        }
        
        #scrollUp:hover {
            background: #845007;
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        
        /* Checkout page specific styles */
        .checkout-page {
            background-color: #f8f5f2;
            padding: 50px 0;
        }
        
        .checkout-summary {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(58, 70, 96, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .checkout-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #3a4660;
            font-size: 2rem;
            margin-bottom: 30px;
            position: relative;
        }
        
        .checkout-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, #c9af98, #845007);
        }
        
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .cart-table th {
            background-color: #f3f4f6;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #3a4660;
        }
        
        .cart-table td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        
        .product-thumbnail img {
            max-width: 80px;
            border-radius: 8px;
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
        
        .detail-qty {
            max-width: 80px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
        }
        
        .action a {
            color: #9ca3af;
            font-size: 18px;
            transition: color 0.3s ease;
        }
        
        .action a:hover {
            color: #ef4444;
        }
        
        .cart-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-payment {
            display: inline-flex;
            align-items: center;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background: linear-gradient(45deg, #3a4660, #2a3447);
            border: none;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(58, 70, 96, 0.2);
        }
        
        .btn-payment:hover {
            background: linear-gradient(45deg, #845007, #c9af98);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(133, 80, 7, 0.3);
            color: white;
        }
        
        .btn-payment i {
            margin-right: 10px;
        }
        
        .empty-cart {
            text-align: center;
            padding: 50px 0;
        }
        
        .empty-cart h1 {
            font-family: 'Playfair Display', serif;
            color: #3a4660;
            margin-bottom: 30px;
        }
        
        .empty-cart img {
            max-width: 300px;
            margin: 0 auto;
        }
        
        .divider {
            position: relative;
            text-align: center;
            margin: 40px 0;
        }
        
        .divider:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #e5e7eb;
            z-index: 1;
        }
        
        .divider i {
            position: relative;
            z-index: 2;
            background: white;
            padding: 0 20px;
            color: #c9af98;
            font-size: 24px;
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
        
        .action button {
            color: #ef4444 !important;
            font-size: 18px;
            background: none !important;
            border: none !important;
            padding: 0 !important;
            transition: all 0.3s ease;
        }

        .action button:hover {
            color: #dc2626 !important;
            transform: scale(1.1);
        }
        
        /* Modal styles */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .modal-header {
            border-bottom: 1px solid #e5e7eb;
            padding: 20px 25px;
        }
        
        .modal-title {
            font-weight: 700;
            color: #3a4660;
        }
        
        .modal-body {
            padding: 25px;
        }
        
        .modal-footer {
            border-top: 1px solid #e5e7eb;
            padding: 20px 25px;
        }
        
        .form-label {
            font-weight: 600;
            color: #3a4660;
            margin-bottom: 8px;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #845007;
            box-shadow: 0 0 0 0.25rem rgba(133, 80, 7, 0.25);
        }
        
        @media (max-width: 992px) {
            .cart-table {
                display: block;
                overflow-x: auto;
            }
        }
        
        @media (max-width: 768px) {
            .checkout-page {
                padding: 30px 0;
            }
            
            .checkout-title {
                font-size: 1.8rem;
            }
            
            .cart-actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-payment {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .checkout-title {
                font-size: 1.5rem;
            }
            
            .cart-table th, 
            .cart-table td {
                padding: 10px 5px;
                font-size: 14px;
            }
            
            .product-thumbnail img {
                max-width: 60px;
            }
            
            .btn-payment {
                padding: 12px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @include('user.header')
    @include('user.mobile_header')    
    <main class="main checkout-page">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="checkout-summary">
                            <h2 class="checkout-title">Your Order Summary</h2>
                            @if ($cartData->isEmpty())
                            <div class="empty-cart">
                                <h1>Your Cart is Empty</h1>
                                <img src="{{ asset('user/assets/imgs/empty-cart-img.png') }}" alt="Empty Cart">
                                <div class="mt-30">
                                    <a href="{{ url('/') }}" class="btn btn-payment">
                                        <i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping
                                    </a>
                                </div>
                            </div>
                            @else
                            <?php $totalPrice = 0; ?>
                            <div class="table-responsive">
                                <table class="cart-table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Color</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartData as $cart)
                                        <tr>
                                            <td class="product-thumbnail">
                                                @if($cart->preview_image)
                                                    <img src="{{ asset($cart->preview_image) }}" alt="Customized Product">
                                                @else
                                                    <img src="{{ asset('products_images/' . $cart->image) }}" alt="{{ $cart->product_title }}">
                                                @endif
                                            </td>
                                            <td class="product-name">
                                                <a href="{{url('product_details', $cart->product_id)}}">{{$cart->product_title}}</a>
                                            </td>
                                            <td class="color">
                                                @if($cart->color)
                                                    <div class="color-display" style="background-color: {{ $cart->getColorHexAttribute() }};"></div>
                                                    <span class="color-name">{{ ucfirst($cart->color) }}</span>
                                                @else
                                                    <span class="text-muted">Not specified</span>
                                                @endif
                                            </td>
                                            <td>PKR {{ number_format($cart->unit_price, 2) }}</td>
                                            <td>
                                                <div class="detail-qty">
                                                    <span class="qty-val">{{$cart->quantity}}</span>
                                                </div>
                                            </td>
                                            <td>PKR {{ number_format($cart->price, 2) }}</td>
                                            <td class="action">
                                                <form action="{{ route('remove.cart.item', $cart->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
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
                                <a href="{{route('user.clear_cart')}}" class="btn-payment" style="background: #ef4444;">
                                    <i class="fi-rs-cross-small mr-10"></i>Clear Cart
                                </a>
                                <button type="button" class="btn-payment" id="cash-on-delivery-btn" data-bs-toggle="modal" data-bs-target="#customerInfoModal">
                                    <i class="fi-rs-shopping-bag mr-10"></i>Cash On Delivery
                                </button>
                                <a href="{{url('/stripe', $totalPrice)}}" class="btn-payment">
                                    <i class="fi-rs-credit-card mr-10"></i>Pay With Card
                                </a>
                            </div>
                            <div class="divider">
                                
                            </div>
                            <div class="text-end">
                                <h4 class="text-lg font-bold">Total: PKR {{ number_format($totalPrice, 2) }}</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Customer Info Modal -->
    <div class="modal fade" id="customerInfoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="customer-info-form" method="POST" action="{{ route('cash.order') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required 
                                   value="{{ Auth::user()->name ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                   value="{{ Auth::user()->email ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required
                                   value="{{ Auth::user()->phone ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Delivery Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ Auth::user()->address ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Order Notes (Optional)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('user.footer')    

    <script src="user/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="user/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="user/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
        document.addEventListener('DOMContentLoaded', function() {
            $.scrollUp({
                scrollName: 'scrollUp',
                scrollDistance: 300,
                scrollFrom: 'top',
                scrollSpeed: 300,
                easingType: 'linear',
                animation: 'fade',
                animationInSpeed: 200,
                animationOutSpeed: 200,
                scrollText: '<i class="fas fa-arrow-up"></i>',
                activeOverlay: false,
                zIndex: 9998
            });
            
            const elements = document.querySelectorAll('.checkout-summary, .cart-table tr');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = 1;
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            elements.forEach((el, i) => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(20px)';
                el.style.transition = `all 0.5s ease ${i * 0.1}s`;
                observer.observe(el);
            });
            
            const paymentButtons = document.querySelectorAll('.btn-payment');
            paymentButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Handle customer info form submission
            document.getElementById('customer-info-form')?.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading indicator
                Swal.fire({
                    title: 'Processing Order',
                    html: 'Please wait while we process your order...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Submit the form via AJAX
                fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Placed!',
                            text: data.message,
                            showConfirmButton: true,
                            timer: 3000
                        }).then(() => {
                            window.location.href = data.redirect;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Order Failed',
                            text: data.message || 'An error occurred'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message || 'An unexpected error occurred. Please try again.'
                    });
                });
            });
        });
    </script>
</body>
</html>