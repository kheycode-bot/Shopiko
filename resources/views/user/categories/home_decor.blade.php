<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopiko | Home Decor Collection</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Style Your Space - Custom Home Decor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Shopiko Home Decor Collection">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('user/assets/imgs/categories/home.webp') }}">
    <meta property="og:image" content="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3a4660;
            --secondary: #845007;
            --accent: #c9af98;
            --light-text: #ffffff;
            --dark-text: #3a4660;
            --light-bg: #f8f5f2;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-text);
            background-color: #f9f9f9;
        }

        h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            color: var(--dark-text);
        }

        h1 {
            color: var(--light-text);
        }

        /* Hero Section */
        .category-hero {
            background: linear-gradient(rgba(58, 70, 96, 0.7), rgba(58, 70, 96, 0.7)), 
            url('https://images.unsplash.com/photo-1517705008128-361805f42e86?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--light-text);
            margin-bottom: 60px;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
            animation: fadeInDown 1s ease;
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease 0.3s both;
            color: var(--light-text)
        }

        .btn-explore {
            display: inline-block;
            background: var(--accent);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(132, 80, 7, 0.3);
            font-size: 1.1rem;
            animation: fadeIn 1s ease 0.6s both;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .btn-explore:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(132, 80, 7, 0.4);
            color: white;
        }

        /* Home Decor Section */
        .decor-section {
            padding: 80px 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-header h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent);
        }

        .section-header p {
            font-size: 1.1rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Decor Grid */
        .decor-grid-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .decor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            justify-content: center;
        }

        .decor-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: var(--transition);
            position: relative;
        }
        
        .decor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(58, 70, 96, 0.15);
        }
        
        .decor-image {
            height: 300px;
            background: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .decor-image img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.5s ease;
        }
        
        .decor-card:hover .decor-image img {
            transform: scale(1.05);
        }
        
        .decor-info {
            padding: 25px 20px;
            text-align: center;
        }
        
        .decor-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-text);
            margin-bottom: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 3em;
        }
        
        .decor-price {
            font-weight: 700;
            color: var(--secondary);
            font-size: 1.2rem;
        }

        /* Room Preview Badge */
        .room-preview {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(255,255,255,0.9);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
            z-index: 3;
        }
        
        .room-preview:hover {
            background: var(--primary);
            color: white;
        }
        
        .room-preview i {
            font-size: 14px;
        }

        /* Customize Icon */
        .customize-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: rgba(58, 70, 96, 0.9);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
            z-index: 2;
            text-decoration: none !important;
        }

        .customize-icon i {
            font-size: 20px;
        }

        .decor-image:hover .customize-icon {
            opacity: 1;
        }

        .customize-icon:hover {
            background: var(--secondary);
            transform: translate(-50%, -50%) scale(1.1);
        }

        .decor-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.1);
            opacity: 0;
            transition: var(--transition);
            z-index: 1;
        }

        .decor-image:hover::before {
            opacity: 1;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 60px;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .pagination .page-link {
            color: var(--primary);
            margin: 0 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 8px 16px;
            transition: var(--transition);
        }

        .pagination .page-link:hover {
            background-color: var(--light-bg);
            color: var(--secondary);
        }

        /* WhatsApp Button */
        .whatsapp-chat {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
        }
        
        .whatsapp-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            transition: var(--transition);
            animation: pulse 2s infinite;
        }
        
        .whatsapp-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.6);
        }
        
        .whatsapp-btn i {
            color: white;
            font-size: 36px;
        }
        
        .whatsapp-tooltip {
            position: absolute;
            right: 70px;
            background: white;
            padding: 8px 15px;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        
        .whatsapp-btn:hover + .whatsapp-tooltip {
            opacity: 1;
        }

        /* Scroll Up Button */
        #scrollUp {
            bottom: 30px;
            left: 30px;
            right: auto;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: var(--transition);
            z-index: 9998;
        }
        
        #scrollUp:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .decor-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .category-hero {
                height: 400px;
            }
            
            .hero-content h1 {
                font-size: 3rem;
            }
            
            .hero-content p {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 768px) {
            .category-hero {
                height: 350px;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .section-header h2 {
                font-size: 2rem;
            }
            
            .decor-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 20px;
            }
            
            .decor-image {
                height: 250px;
            }
        }

        @media (max-width: 576px) {
            .category-hero {
                height: 300px;
                margin-bottom: 40px;
            }
            
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .section-header {
                margin-bottom: 40px;
            }
            
            .section-header h2 {
                font-size: 1.8rem;
            }
            
            .decor-grid {
                grid-template-columns: 1fr;
                max-width: 350px;
                margin: 0 auto;
            }
            
            .decor-image {
                height: 280px;
            }
            
            .decor-section {
                padding: 50px 0;
            }
        }
    </style>
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')
    
    <main class="main">
        <!-- Hero Section -->
        <section class="category-hero">
            <div class="hero-content">
                <h1>Home Decor Collection</h1>
                <p>Transform Your Space with Personalized Touches</p>
                <a href="#products" class="btn-explore">Explore Decor</a>
            </div>
        </section>
        
        <!-- Decor Collection Section -->
        <section class="decor-section" id="products">
            <div class="container">
                <div class="section-header">
                    <h2>Our Premium Home Decor</h2>
                    <p>Discover beautifully crafted pieces that bring personality and warmth to every room in your home.</p>
                </div>
                
                <div class="decor-grid-container">
                    <div class="decor-grid">
                        @foreach($products as $product)
                        <div class="decor-card">
                            <div class="decor-image">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                                <a href="{{ route('product.details', $product->id) }}" class="customize-icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="#" class="room-preview">
                                    <i class="fas fa-eye"></i> Room View
                                </a>
                            </div>
                            <div class="decor-info">
                                <h3 class="decor-title">{{ $product->title }}</h3>
                                <div class="decor-price">PKR {{ $product->discount_price ?? $product->price }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('user.footer')

    <!-- WhatsApp Button -->
    <div class="whatsapp-chat">
        <a href="https://wa.me/03092936921?text=Hello%20Shopiko,%20I%20have%20a%20question%20about%20your%20home%20decor..." class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-whatsapp"></i>
        </a>
        <span class="whatsapp-tooltip">Chat about decor</span>
    </div>
    
    <!-- Scripts -->
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
    <script src="{{ asset('user/assets/js/main.js?v=3.3') }}"></script>
    <script src="{{ asset('user/assets/js/shop.js?v=3.3') }}"></script>
    
    <script>
        // Initialize scrollUp plugin
        $(document).ready(function() {
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

            // Animate decor cards on scroll
            const decorCards = document.querySelectorAll('.decor-card');
            
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

            decorCards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease';
                observer.observe(card);
            });

            // Room preview functionality
            document.querySelectorAll('.room-preview').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productImage = this.closest('.decor-card').querySelector('.decor-image img');
                    const imageUrl = productImage.src;
                    
                    // Here you would implement your room preview functionality
                    console.log('Show room view for: ' + imageUrl);
                    alert('Room preview feature would show how this item looks in a room setting');
                });
            });
        });
    </script>
</body>
</html>