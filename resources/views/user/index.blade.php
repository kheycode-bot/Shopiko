<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Shopiko | Home</title>
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
            transition: all 0.3s ease;
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
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 12px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
        
        .hero-slider {
            position: relative;
            height: 80vh;
            max-height: 800px;
            overflow: hidden;
        }
        
        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            z-index: 1;
        }
        
        .slide.active {
            opacity: 1;
            z-index: 2;
        }
        
        .slide-content {
            max-width: 800px;
            padding: 0 30px;
            transform: translateY(20px);
            transition: transform 0.8s ease;
        }
        
        .slide.active .slide-content {
            transform: translateY(0);
        }
        
        .slide h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            line-height: 1.2;
        }
        
        .slide .lead {
            font-size: 20px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        
        .btn-primary {
            display: inline-flex;
            align-items: center;
            padding: 15px 35px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background-color: var(--primary);
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        
        .btn-primary:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        
        /* Customization form styles */
        .customization-options {
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
        }

        .customization-option {
            margin-bottom: 0.5rem;
        }

        .customization-option label {
            display: block;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }
        
        /* Categories Section Styles */
        .categories-section {
            position: relative;
            overflow: hidden;
            background-color: #f8f5f2;
        }
        
        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #3a4660;
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .text-gradient {
            background: linear-gradient(45deg, #c9af98, #845007);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
        }
        
        .feature-box {
            position: relative;
            height: 280px;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(58, 70, 96, 0.1);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        .large-box {
            height: 580px;
        }
        
        .feature-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 30px;
            background: linear-gradient(to bottom, rgba(58,70,96,0.3), rgba(58,70,96,0.7));
            transition: all 0.4s ease;
        }
        
        .feature-box:hover .feature-overlay {
            background: linear-gradient(to bottom, rgba(58,70,96,0.2), rgba(58,70,96,0.8);
        }
        
        .feature-overlay h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: rgba(255,255,255,0.95);
            text-shadow: 2px 2px 6px rgba(0,0,0,0.3);
            transform: translateY(20px);
            transition: all 0.4s ease;
        }
        
        .feature-overlay p {
            font-size: 1.1rem;
            margin-bottom: 25px;
            color: rgba(255,255,255,0.9);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
            transform: translateY(20px);
            transition: all 0.4s ease 0.1s;
            max-width: 80%;
        }
        
        .feature-box:hover .feature-overlay h2,
        .feature-box:hover .feature-overlay p {
            transform: translateY(0);
        }
        
        .btn-glow {
            display: inline-flex;
            align-items: center;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            background: linear-gradient(45deg, #3a4660, #2a3447);
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(58, 70, 96, 0.3);
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            transform: translateY(20px);
            opacity: 0;
        }
        
        .feature-box:hover .btn-glow {
            transform: translateY(0);
            opacity: 1;
            transition-delay: 0.2s;
        }
        
        .btn-glow:hover {
            background: linear-gradient(45deg, #845007, #c9af98);
            transform: translateY(-3px) !important;
            box-shadow: 0 8px 25px rgba(133, 80, 7, 0.4);
            border-color: rgba(255,255,255,0.5);
        }

        /* Design Studio Section Styles */
        .design-studio-section {
            background: linear-gradient(135deg, #f8f5f2 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }
        
        .design-studio-image {
            position: relative;
            padding: 20px;
        }
        
        .image-frame {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(58, 70, 96, 0.15);
            transform: perspective(1000px) rotateY(-5deg);
            transition: all 0.5s ease;
        }
        
        .design-studio-image:hover .image-frame {
            transform: perspective(1000px) rotateY(0deg);
        }
        
        .floating-badge {
            position: absolute;
            top: 40px;
            right: 0;
            background: white;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            font-weight: 600;
            color: #3a4660;
            transform: translateX(30px);
            opacity: 0;
            transition: all 0.5s ease 0.2s;
        }
        
        .design-studio-image:hover .floating-badge {
            transform: translateX(0);
            opacity: 1;
        }
        
        .floating-badge i {
            color: #c9af98;
            margin-right: 8px;
        }
        
        .studio-features {
            list-style: none;
            padding: 0;
        }
        
        .studio-features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .studio-features i {
            width: 40px;
            height: 40px;
            background: rgba(201, 175, 152, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #c9af98;
            font-size: 18px;
        }
        
        .btn-studio {
            display: inline-flex;
            align-items: center;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: 600;
            color: white;
            background: linear-gradient(45deg, #c9af98, #845007);
            border: none;
            border-radius: 50px;
            box-shadow: 0 5px 20px rgba(133, 80, 7, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-studio:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(133, 80, 7, 0.4);
            color: white;
        }

        /* Products Section - Updated with fixes */
        .shopiko-products-section {
            position: relative;
            z-index: 1;
            background: #f9fafb;
            padding: 60px 0;
            margin-bottom: 60px;
            overflow: visible;
        }

        .product-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            height: 100%;
            position: relative;
            background: white;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .image-container {
            height: 250px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .image-container img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .price-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .current-price {
            font-weight: 700;
            color: #111827;
        }

        .original-price {
            text-decoration: line-through;
            color: #6b7280;
            font-size: 0.875rem;
        }

        /* Features Section - Updated with z-index fix */
        .features-section {
            position: relative;
            z-index: 0;
            background: linear-gradient(135deg, var(--primary) 0%, var(--dark-text) 100%);
            color: white;
            padding: 60px 0;
        }
        
        .feature-card {
            text-align: center;
            padding: 25px 15px;
            transition: var(--transition);
            height: 100%;
            position: relative;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: var(--transition);
        }
        
        .feature-card:hover .feature-icon {
            background: var(--secondary);
            transform: rotateY(180deg);
        }
        
        .feature-icon i {
            font-size: 28px;
            color: white;
        }
        
        .feature-card h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .feature-card p {
            font-size: 14px;
            color: rgba(255,255,255,0.8);
            margin-bottom: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .col-lg-3 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 768px) {
            #scrollUp {
                bottom: 80px;
                left: 20px;
                width: 45px;
                height: 45px;
                line-height: 45px;
                font-size: 18px;
            }
            
            .whatsapp-chat {
                bottom: 20px;
                right: 20px;
            }
            
            .whatsapp-btn {
                width: 50px;
                height: 50px;
            }
            
            .whatsapp-btn i {
                font-size: 30px;
            }
            
            .whatsapp-tooltip {
                right: 60px;
                font-size: 12px;
                padding: 6px 12px;
            }
            
            .hero-slider {
                height: 60vh;
            }
            
            .slide h1 {
                font-size: 36px;
            }
            
            .slide .lead {
                font-size: 18px;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .feature-box {
                height: 250px;
            }
            
            .large-box {
                height: 400px;
            }
            
            .feature-overlay h2 {
                font-size: 2rem;
            }

            .shopiko-products-section {
                padding: 40px 0;
                margin-bottom: 40px;
            }

            .image-container {
                height: 200px;
            }
        }

        @media (max-width: 576px) {
            .col-lg-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            .image-container {
                height: 180px;
            }
            
            .product-card {
                margin-bottom: 1.5rem;
            }

            .shopiko-products-section {
                padding: 30px 0;
                margin-bottom: 30px;
            }
        }

        .featured-products-section {
    position: relative;
    z-index: 1;
    background: #f9fafb;
    padding: 60px 0;
    margin-bottom: 60px;
    overflow: visible;
}

.featured-products-section .product-card {
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    overflow: hidden;
    height: 100%;
    position: relative;
    background: white;
}

.featured-products-section .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.featured-products-section .image-container {
    height: 250px;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}

.featured-products-section .image-container img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.featured-products-section .price-container {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.featured-products-section .current-price {
    font-weight: 700;
    color: #111827;
}

.featured-products-section .original-price {
    text-decoration: line-through;
    color: #6b7280;
    font-size: 0.875rem;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .featured-products-section .col-lg-3 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (max-width: 768px) {
    .featured-products-section {
        padding: 40px 0;
        margin-bottom: 40px;
    }

    .featured-products-section .image-container {
        height: 200px;
    }
}

@media (max-width: 576px) {
    .featured-products-section .col-lg-3 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    .featured-products-section .image-container {
        height: 180px;
    }
    
    .featured-products-section .product-card {
        margin-bottom: 1.5rem;
    }

    .featured-products-section {
        padding: 30px 0;
        margin-bottom: 30px;
    }
}
    </style>
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')    
    <main class="main">
        @include('user.hero_slider')
        @include('user.slider')
        @include('user.app_features')
        @include('user.featured_brands')
        @include('user.design_studio')
        @include('user.why_choose_us')
        @include('user.testimonial')
    </main>

    @include('user.footer')

    <div class="whatsapp-chat">
        <a href="https://wa.me/03092936921?text=Hello%20Shopiko,%20I%20have%20a%20question%20about..." class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-whatsapp"></i>
        </a>
        <span class="whatsapp-tooltip">Chat with us</span>
    </div>
    
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
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            let currentSlide = 0;
            
            slides[currentSlide].classList.add('active');
            
            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 5000);
            
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
        });

        document.addEventListener('DOMContentLoaded', function() {
            const productImages = document.querySelectorAll('.shopiko-product-card img');
            
            productImages.forEach(img => {
                const placeholder = img.parentElement.querySelector('.image-placeholder');
                
                const loadingTimeout = setTimeout(() => {
                    if (!img.complete) {
                        console.warn('Image loading stalled for product:', img.dataset.productId);
                        img.src = img.getAttribute('onerror').match(/this\.src='(.*?)'/)[1];
                    }
                }, 5000); 
                
                if (img.complete) {
                    handleImageLoad(img, placeholder);
                    clearTimeout(loadingTimeout);
                } else {
                    img.addEventListener('load', () => {
                        handleImageLoad(img, placeholder);
                        clearTimeout(loadingTimeout);
                    });
                    
                    img.addEventListener('error', () => {
                        console.error('Image failed to load:', img.src);
                        img.src = img.getAttribute('onerror').match(/this\.src='(.*?)'/)[1];
                        clearTimeout(loadingTimeout);
                    });
                }
            });

            function handleImageLoad(img, placeholder) {
                img.classList.add('loaded');
                img.style.opacity = '1';
                if (placeholder) {
                    placeholder.style.opacity = '0';
                    setTimeout(() => {
                        placeholder.style.display = 'none';
                    }, 300);
                }
            }
            
            const productsContainer = document.getElementById('products-container');
            if (productsContainer) {
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        mutation.removedNodes.forEach(function(node) {
                            if (node.classList && node.classList.contains('shopiko-product-card')) {
                                console.error('Product card was removed from DOM!');
                                document.querySelector('.debug-container').innerHTML += 
                                    '<div class="text-red-600 my-2 p-2 bg-red-50 rounded">A product card was unexpectedly removed from the DOM</div>';
                            }
                        });
                    });
                });
                
                observer.observe(productsContainer, {
                    childList: true,
                    subtree: true
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('products-container');
            if (!container) {
                console.error('Products container not found!');
                return;
            }

            const products = document.querySelectorAll('.product-card');
            console.log('DOM Products Count:', products.length);
            
            products.forEach(product => {
                const rect = product.getBoundingClientRect();
                const style = window.getComputedStyle(product);
                
                console.log(`Product ${product.dataset.productId}`, {
                    inViewport: rect.top < window.innerHeight && rect.bottom >= 0,
                    display: style.display,
                    visibility: style.visibility,
                    opacity: style.opacity,
                    dimensions: `${rect.width}px × ${rect.height}px`
                });
            });

            const images = document.querySelectorAll('.image-container img');
            images.forEach(img => {
                img.addEventListener('error', function() {
                    console.error('Image failed to load:', this.src);
                    this.src = this.getAttribute('onerror').match(/this\.src='(.*?)'/)[1];
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            sections.forEach(section => {
                section.style.opacity = 0;
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'all 0.5s ease';
                observer.observe(section);
            });

            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>