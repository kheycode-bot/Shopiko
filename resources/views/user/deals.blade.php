<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Deals | Shopiko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3a4660;
            --secondary: #c9af98;
            --accent: #845007;
            --light-bg: #f8f5f2;
            --dark-text: #2a3447;
            --light-text: #f5f5f5;
            --gray-text: #666;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(58, 70, 96, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Deals Hero Section */
        .deals-hero {
            background: linear-gradient(rgba(58, 70, 96, 0.8), rgba(58, 70, 96, 0.8)), 
                        url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-bottom: 60px;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        /* Deals Countdown */
        .deals-countdown {
            background: var(--accent);
            color: white;
            padding: 15px 0;
            text-align: center;
            margin-bottom: 40px;
        }

        .countdown-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .countdown-box {
            background: rgba(255,255,255,0.2);
            padding: 15px 25px;
            border-radius: var(--border-radius);
            min-width: 80px;
        }

        .countdown-value {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
        }

        .countdown-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Deals Grid */
        .deals-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px 60px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .section-title p {
            color: var(--gray-text);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .deals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .deal-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            position: relative;
        }

        .deal-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(58, 70, 96, 0.15);
        }

        .deal-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            z-index: 2;
        }

        .deal-image {
            height: 250px;
            position: relative;
            overflow: hidden;
        }

        .deal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .deal-card:hover .deal-image img {
            transform: scale(1.05);
        }

        .deal-info {
            padding: 20px;
            position: relative;
        }

        .deal-info h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .deal-info p {
            color: var(--gray-text);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .deal-price {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .current-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent);
        }

        .original-price {
            font-size: 1rem;
            color: var(--gray-text);
            text-decoration: line-through;
        }


        .footer-section {
        background: linear-gradient(135deg, #2a3447 0%, #3a4660 100%);
    }
    
    .footer-logo {
        font-size: 28px;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }
    
    .social-icons {
        display: flex;
        gap: 15px;
    }
    
    .social-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .social-icon:hover {
        background: #c9af98 !important;
        color: #3a4660 !important;
        transform: translateY(-3px);
    }
    
    .footer-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        font-family: 'Montserrat', sans-serif;
    }
    
    .footer-links {
        list-style: none;
        padding: 0;
    }
    
    .footer-links li {
        margin-bottom: 10px;
    }
    
    .footer-links a {
        transition: all 0.3s ease;
    }
    
    .footer-links a:hover {
        color: #c9af98 !important;
        padding-left: 5px;
    }
    
    .contact-info {
        list-style: none;
        padding: 0;
    }
    
    .contact-info li {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
    }
    
    .contact-info i {
        margin-right: 10px;
        margin-top: 3px;
    }
    
    .footer-newsletter-form {
        display: flex;
        gap: 10px;
    }
    
    .footer-newsletter-form input {
        flex-grow: 1;
        padding: 10px 15px;
        border-radius: 6px;
    }
    
    .footer-newsletter-form input::placeholder {
        color: rgba(255,255,255,0.5);
    }
    
    .footer-newsletter-form button {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .footer-newsletter-form button:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(133, 80, 7, 0.4);
    }
    
    .payment-methods img {
        height: 25px;
        margin-left: 10px;
        filter: brightness(0) invert(1);
        opacity: 0.7;
        transition: all 0.3s ease;
    }
    
    .payment-methods img:hover {
        opacity: 1;
    }
        .discount {
            background: var(--primary);
            color: white;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .deal-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: var(--gray-text);
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
        }

        .deal-actions {
            display: flex;
            gap: 10px;
        }

        .btn-add-to-cart {
            display: inline-block;
            background: var(--accent);
            color: white;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            flex-grow: 1;
            text-align: center;
        }

        .btn-add-to-cart:hover {
            background: var(--primary);
        }

        .btn-wishlist {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: white;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            color: var(--gray-text);
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-wishlist:hover {
            color: var(--accent);
            border-color: var(--accent);
        }

        /* Featured Deal */
        .featured-deal {
            grid-column: span 2;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .featured-deal .deal-image {
            height: 100%;
        }

        .featured-deal .deal-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Newsletter */
        .newsletter-section {
            background: var(--light-bg);
            padding: 60px 0;
            margin: 60px 0;
            text-align: center;
        }

        .newsletter-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 30px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .newsletter-input {
            flex-grow: 1;
            padding: 15px 20px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-family: inherit;
        }

        .newsletter-btn {
            background: var(--accent);
            color: white;
            border: none;
            padding: 0 30px;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-btn:hover {
            background: var(--primary);
        }

        @media (max-width: 992px) {
            .featured-deal {
                grid-column: span 1;
                grid-template-columns: 1fr;
            }
            
            .featured-deal .deal-image {
                height: 300px;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    @include('user.header')
    
    <section class="deals-hero">
        <div class="hero-content">
            <h1>Exclusive Deals</h1>
            <p>Limited-time offers on our most popular products. Don't miss out on these incredible savings!</p>
        </div>
    </section>

    <div class="deals-countdown">
        <div class="countdown-container">
            <div class="countdown-box">
                <div class="countdown-value" id="days">05</div>
                <div class="countdown-label">Days</div>
            </div>
            <div class="countdown-box">
                <div class="countdown-value" id="hours">12</div>
                <div class="countdown-label">Hours</div>
            </div>
            <div class="countdown-box">
                <div class="countdown-value" id="minutes">45</div>
                <div class="countdown-label">Minutes</div>
            </div>
            <div class="countdown-box">
                <div class="countdown-value" id="seconds">30</div>
                <div class="countdown-label">Seconds</div>
            </div>
        </div>
    </div>

    <div class="deals-container">
        <div class="section-title">
            <h2>Today's Best Deals</h2>
            <p>Shop our limited-time offers and save big on your favorite products</p>
        </div>

        <div class="deals-grid">
           

            <div class="deal-card">
                <span class="deal-badge">Hot Deal</span>
                <div class="deal-image">
                    <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Deal 1">
                </div>
                <div class="deal-info">
                    <h3>Minimalist Typography Tee</h3>
                    <p>A clean, modern t-shirt design featuring customizable text in your choice of font and color.</p>
                    <div class="deal-price">
                        <span class="current-price">$24.99</span>
                        <span class="original-price">$39.99</span>
                        <span class="discount">38% OFF</span>
                    </div>
                    <div class="deal-meta">
                        <span>32 in stock</span>
                        <span><i class="fas fa-fire" style="color: var(--accent);"></i> 24 sold today</span>
                    </div>
                    <div class="deal-actions">
                        <button class="btn-add-to-cart">Add to Cart</button>
                        <button class="btn-wishlist">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="deal-card">
                <span class="deal-badge">Weekend Special</span>
                <div class="deal-image">
                    <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Deal 2">
                </div>
                <div class="deal-info">
                    <h3>Morning Motivation Mug</h3>
                    <p>Start your day right with this customizable mug featuring inspirational quotes.</p>
                    <div class="deal-price">
                        <span class="current-price">$14.99</span>
                        <span class="original-price">$24.99</span>
                        <span class="discount">40% OFF</span>
                    </div>
                    <div class="deal-meta">
                        <span>45 in stock</span>
                        <span><i class="fas fa-fire" style="color: var(--accent);"></i> 18 sold today</span>
                    </div>
                    <div class="deal-actions">
                        <button class="btn-add-to-cart">Add to Cart</button>
                        <button class="btn-wishlist">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="deal-card">
                <span class="deal-badge">Clearance</span>
                <div class="deal-image">
                    <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Deal 3">
                </div>
                <div class="deal-info">
                    <h3>Family Name Wall Art</h3>
                    <p>Elegant wall decor featuring your family name in a beautiful script font.</p>
                    <div class="deal-price">
                        <span class="current-price">$49.99</span>
                        <span class="original-price">$79.99</span>
                        <span class="discount">38% OFF</span>
                    </div>
                    <div class="deal-meta">
                        <span>Only 5 left</span>
                        <span><i class="fas fa-fire" style="color: var(--accent);"></i> 12 sold today</span>
                    </div>
                    <div class="deal-actions">
                        <button class="btn-add-to-cart">Add to Cart</button>
                        <button class="btn-wishlist">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="deal-card">
                <span class="deal-badge">Flash Sale</span>
                <div class="deal-image">
                    <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Deal 4">
                </div>
                <div class="deal-info">
                    <h3>Geometric Phone Case</h3>
                    <p>Stylish phone case with customizable geometric patterns and colors.</p>
                    <div class="deal-price">
                        <span class="current-price">$12.99</span>
                        <span class="original-price">$19.99</span>
                        <span class="discount">35% OFF</span>
                    </div>
                    <div class="deal-meta">
                        <span>28 in stock</span>
                        <span><i class="fas fa-fire" style="color: var(--accent);"></i> 36 sold today</span>
                    </div>
                    <div class="deal-actions">
                        <button class="btn-add-to-cart">Add to Cart</button>
                        <button class="btn-wishlist">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="newsletter-section">
        <div class="newsletter-container">
            <h2>Want More Deals?</h2>
            <p>Subscribe to our newsletter and be the first to know about exclusive offers, new arrivals, and special discounts.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" class="newsletter-input" required>
                <button type="submit" class="newsletter-btn">Subscribe</button>
            </form>
        </div>
    </section>

    




    <script>
        // Countdown Timer
        function updateCountdown() {
            const now = new Date();
            const endDate = new Date();
            endDate.setDate(now.getDate() + 5); // Set to 5 days from now
            
            const diff = endDate - now;
            
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);
            
            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }
        
        updateCountdown();
        setInterval(updateCountdown, 1000);
        
        // Wishlist functionality
        document.querySelectorAll('.btn-wishlist').forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    icon.style.color = 'var(--accent)';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    icon.style.color = '';
                }
            });
        });
    </script>
</body>
</html>