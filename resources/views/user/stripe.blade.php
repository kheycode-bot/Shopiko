<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopiko | Payment</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="shortcut icon" type="image/x-icon" href="/user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="/user/assets/css/main.css">
    <link rel="stylesheet" href="/user/assets/css/custom.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <style>
        .payment-page {
            background-color: #f9fafb;
            padding: 60px 0;
        }

        
        .payment-header {
            background: linear-gradient(135deg, #3a4660 0%, #2a3447 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(58, 70, 96, 0.1);
        }
        
        .payment-header h1 {
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
        
        .payment-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            padding: 30px;
        }
        
        .payment-card .panel-heading {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
            padding: 15px 20px;
            border-radius: 8px 8px 0 0;
            margin: -30px -30px 30px -30px;
        }
        
        .payment-card .panel-title {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 18px;
            margin: 0;
        }
        
        .form-control {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 15px;
            height: auto;
            box-shadow: none;
        }
        
        .form-control:focus {
            border-color: #c9af98;
            box-shadow: 0 0 0 0.2rem rgba(201, 175, 152, 0.25);
        }
        
        label.control-label {
            color: #4b5563;
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .btn-pay {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(133, 80, 7, 0.2);
            transition: all 0.3s ease;
            width: 100%;
            font-size: 16px;
        }
        
        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(133, 80, 7, 0.3);
            color: white;
        }
        
        .alert {
            border-radius: 8px;
            padding: 15px;
        }
        
        .alert-success {
            background-color: #d1fae5;
            border-color: #a7f3d0;
            color: #065f46;
        }
        
        .alert-danger {
            background-color: #fee2e2;
            border-color: #fecaca;
            color: #b91c1c;
        }
        
        .payment-summary {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .payment-summary h4 {
            color: #3a4660;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .payment-summary h4:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(45deg, #c9af98, #845007);
            border-radius: 3px;
        }
        
        .payment-summary .total-amount {
            font-size: 24px;
            color: #845007;
            font-weight: 700;
            text-align: center;
            margin: 20px 0;
        }
        
        @media (max-width: 768px) {
            .payment-header h1 {
                font-size: 2rem;
            }
            
            .payment-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')
    
    <main class="main">
        <div class="payment-page">
            <div class="container">
                <div class="payment-header text-center">
                    <div class="container">
                        <h1>Secure Payment</h1>
                        <div class="breadcrumb">
                            <a href="/" rel="nofollow">Home</a>
                            <span></span> Cart
                            <span></span> Payment
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="payment-card panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <h3 class="panel-title">Payment Details</h3>
                            </div>
                            <div class="panel-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif

                                <form role="form" 
                                      action="{{ route('stripe.post', $totalPrice) }}" 
                                      method="post" 
                                      class="require-validation"
                                      data-cc-on-file="false"
                                      data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                      id="payment-form">
                                    @csrf

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label>
                                            <input class='form-control' size='4' type='text'>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group card required'>
                                            <label class='control-label'>Card Number</label>
                                            <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label>
                                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label>
                                            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label>
                                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-pay" type="submit">Pay Now (${{$totalPrice}})</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="payment-summary">
                            <h4>Order Summary</h4>
                            <div class="total-amount">PKR {{ number_format($totalPrice, 2) }}</div>
                            <p class="text-muted text-center">Secure payment processed by Stripe</p>
                        </div>
                        
                        <div class="payment-security">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-lock fa-2x text-success mr-3"></i>
                                <div>
                                    <h5 class="mb-0 ml-3">Secure Payment</h5>
                                    <small class="text-muted ml-3">256-bit SSL encryption</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-shield-alt fa-2x text-primary mr-3"></i>
                                <div>
                                    <h5 class="mb-0 ml-3">Payment Protection</h5>
                                    <small class="text-muted ml-3">Your payment information is safe with us</small>
                                </div>
                            </div>
                        </div>
                    </div>
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
    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
        
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });
        
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
    </script>
</body>
</html>