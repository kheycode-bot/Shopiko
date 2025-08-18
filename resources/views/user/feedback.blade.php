<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <title>Customer Feedback | Shopiko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="user/assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="user/assets/css/main.css">
    <link rel="stylesheet" href="user/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--dark-text);
            background-color: #fff;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .feedback-hero {
            background: linear-gradient(135deg, #3a4660 0%, #2a3447 100%);
            color: white;
            padding: 80px 0;
            margin-bottom: 50px;
            text-align: center;
        }

        .feedback-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .feedback-hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

       
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .text-gradient {
            background: linear-gradient(45deg, #c9af98, #845007);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-title p {
            color: var(--gray-text);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .feedback-form-container {
            background: white;
            border-radius: var(--border-radius);
            padding: 40px;
            margin: 60px auto;
            box-shadow: var(--box-shadow);
            max-width: 800px;
        }

        .feedback-form {
            display: grid;
            gap: 25px;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--primary);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: var(--border-radius);
            font-family: inherit;
            transition: var(--transition);
            background-color: var(--light-bg);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 0 3px rgba(133, 80, 7, 0.1);
        }

        .rating-stars {
            font-size: 28px;
            color: #e5e7eb;
            cursor: pointer;
            display: inline-flex;
            gap: 5px;
        }

        .rating-stars i {
            transition: var(--transition);
        }

        .rating-stars i:hover,
        .rating-stars i.active {
            color: #ffc107;
            transform: scale(1.1);
        }

        .submit-btn {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-size: 16px;
            margin-top: 10px;
            width: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(133, 80, 7, 0.3);
        }

        .footer-section {
            background: linear-gradient(135deg, #2a3447 0%, #3a4660 100%);
            color: white;
            padding: 60px 0 30px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-logo span:first-child {
            color: var(--primary-light);
        }

        .footer-logo span:last-child {
            color: var(--secondary);
        }

        .footer-about {
            color: rgba(255,255,255,0.7);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            transition: var(--transition);
        }

        .social-icon:hover {
            background: var(--secondary);
            color: var(--primary);
            transform: translateY(-3px);
        }

        .footer-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent);
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--secondary);
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
            color: rgba(255,255,255,0.7);
        }

        .contact-info i {
            color: var(--secondary);
            margin-right: 10px;
            margin-top: 3px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: none;
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .newsletter-input::placeholder {
            color: rgba(255,255,255,0.5);
        }

        .newsletter-btn {
            background: linear-gradient(to right, var(--primary), var(--accent));
            color: white;
            border: none;
            padding: 0 20px;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(133, 80, 7, 0.3);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 30px;
            text-align: center;
            color: rgba(255,255,255,0.5);
            font-size: 14px;
        }

        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .payment-methods img {
            height: 25px;
            filter: brightness(0) invert(1);
            opacity: 0.7;
            transition: var(--transition);
        }

        .payment-methods img:hover {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .feedback-hero h1 {
                font-size: 2.2rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .feedback-form-container {
                padding: 30px 20px;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
            }
            
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-btn {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    @include('user.header')
    
    <main>
        <section class="feedback-hero">
            <div class="hero-content">
                <h1>Share Your Feedback</h1>
                <p>Your opinion helps us improve your shopping experience</p>
            </div>
        </section>

        <div class="feedback-container">
            <div class="section-title">
                <h2>We Value Your <span class="text-gradient">Opinion</span></h2>
                <p>Help us serve you better by sharing your thoughts</p>
            </div>

            <div class="feedback-form-container">
                <form class="feedback-form" id="feedbackForm" method="POST" action="/feedback">
                @csrf
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" required placeholder="Enter your name">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    
                    <div class="form-group">
                        <label>Rating</label>
                        <div class="rating-stars">
                            <i class="far fa-star" data-rating="1"></i>
                            <i class="far fa-star" data-rating="2"></i>
                            <i class="far fa-star" data-rating="3"></i>
                            <i class="far fa-star" data-rating="4"></i>
                            <i class="far fa-star" data-rating="5"></i>
                            <input type="hidden" name="rating" id="rating-value" value="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="feedback">Your Feedback</label>
                        <textarea id="feedback" name="feedback" rows="5" required placeholder="Tell us about your experience..."></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane mr-2"></i> Submit Feedback
                    </button>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer-section">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Column 1: About -->
                <div class="footer-col">
                    <div class="footer-logo">
                        <span style="color: #f5f5f5;">SHOP</span><span style="color: #c9af98;">IKO</span>
                    </div>
                    <p class="footer-about">
                        Create your perfect customized products with Shopiko. Personalize apparel, accessories, home decor and unique gifts.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                
                <!-- Column 2: Quick Links -->
                <div class="footer-col">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/shop">Shop</a></li>
                        <li><a href="/design-studio">Create</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Column 3: Categories -->
                <div class="footer-col">
                    <h3 class="footer-title">Categories</h3>
                    <ul class="footer-links">
                        <li><a href="/shop?category=apparel">Apparel</a></li>
                        <li><a href="/shop?category=home-decor">Home Decor</a></li>
                        <li><a href="/shop?category=gifts">Gifts</a></li>
                        <li><a href="/shop?category=photos">Photos</a></li>
                        <li><a href="/new-arrivals">New Arrivals</a></li>
                    </ul>
                </div>
                
                <!-- Column 4: Contact -->
                <div class="footer-col">
                    <h3 class="footer-title">Contact Info</h3>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> COMSATS University, Islamabad, Wah Campus</li>
                        <li><i class="fas fa-phone"></i> +92 315 4136636</li>
                        <li><i class="fas fa-envelope"></i> saduaad55@gmail.com</li>
                    </ul>
                    
                    <h3 class="footer-title" style="margin-top: 25px;">Newsletter</h3>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address" class="newsletter-input">
                        <button type="submit" class="newsletter-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; Shopiko. All rights reserved.</p>
                <div class="payment-methods">
                    <img src="{{ asset('user/assets/imgs/theme/payment/visa.png') }}" alt="Visa">
                    <img src="{{ asset('user/assets/imgs/theme/payment/mastercard.png') }}" alt="Mastercard">
                    <img src="{{ asset('user/assets/imgs/theme/payment/nayapay.jpg') }}" alt="NayaPay">
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.rating-stars i').forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                const stars = document.querySelectorAll('.rating-stars i');
                
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.remove('far');
                        s.classList.add('fas', 'active');
                    } else {
                        s.classList.remove('fas', 'active');
                        s.classList.add('far');
                    }
                });
                
                document.getElementById('rating-value').value = rating;
            });
        });

      document.getElementById('feedbackForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const submitBtn = this.querySelector('.submit-btn');
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    
    try {
        // Get form data
        const formData = {
            name: document.getElementById('name').value.trim(),
            email: document.getElementById('email').value.trim(),
            rating: document.getElementById('rating-value').value,
            feedback: document.getElementById('feedback').value.trim(),
            _token: document.querySelector('meta[name="csrf-token"]').content
        };

        // Client-side validation
        const errors = [];
        if (!formData.name) errors.push('Name is required');
        if (!formData.email) errors.push('Email is required');
        if (!formData.rating || formData.rating === '0') errors.push('Please select a rating');
        if (!formData.feedback) errors.push('Feedback is required');
        
        if (errors.length > 0) {
            throw new Error(errors.join('\n'));
        }

        const response = await fetch('/feedback', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': formData._token
            },
            body: JSON.stringify(formData)
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Server error occurred');
        }

        if (data.success) {
            // Success - show sweet alert or similar
            Swal.fire({
                icon: 'success',
                title: 'Thank you!',
                text: 'Your feedback has been submitted successfully.',
                confirmButtonColor: '#845007'
            });
            
            // Reset form
            this.reset();
            document.querySelectorAll('.rating-stars i').forEach(star => {
                star.classList.remove('fas', 'active');
                star.classList.add('far');
            });
            document.getElementById('rating-value').value = 0;
        } else {
            throw new Error(data.message || 'Submission failed');
        }
    } catch (error) {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Submission Failed',
            text: error.message,
            confirmButtonColor: '#845007'
        });
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    }
});
    </script>
</body>
</html>