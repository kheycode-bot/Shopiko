<footer class="footer-section bg-dark pt-80 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <div class="footer-logo mb-4">
                    <span style="color: #3a4660;">SHOP</span><span style="color: #c9af98;">IKO</span>
                </div>
                <p class="mb-4" style="color: rgba(255,255,255,0.7);">Create your perfect customized products with Shopiko. Personalize apparel, accessories, home decor and unique gifts.</p>
                <div class="social-icons">
                    <a href="#" class="social-icon" style="background: rgba(255,255,255,0.1); color: #c9af98;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon" style="background: rgba(255,255,255,0.1); color: #c9af98;"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon" style="background: rgba(255,255,255,0.1); color: #c9af98;"><i class="fab fa-pinterest"></i></a>
                    <a href="#" class="social-icon" style="background: rgba(255,255,255,0.1); color: #c9af98;"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <!-- Column 2: Quick Links -->
            <div class="col-lg-2 col-md-4 mb-5">
                <h5 class="footer-title" style="color: #c9af98; border-bottom: 2px solid #845007;">Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="/" style="color: rgba(255,255,255,0.7);">Home</a></li>
                    <li><a href="/shop" style="color: rgba(255,255,255,0.7);">Shop</a></li>
                    <li><a href="/design-studio" style="color: rgba(255,255,255,0.7);">Create</a></li>
                    <li><a href="/about" style="color: rgba(255,255,255,0.7);">About Us</a></li>
                    <li><a href="/contact" style="color: rgba(255,255,255,0.7);">Contact</a></li>
                </ul>
            </div>
            
            <!-- Column 3: Categories -->
            <div class="col-lg-2 col-md-4 mb-5">
                <h5 class="footer-title" style="color: #c9af98; border-bottom: 2px solid #845007;">Categories</h5>
                <ul class="footer-links">
                    <li><a href="/shop?category=apparel" style="color: rgba(255,255,255,0.7);">Apparel</a></li>
                    <li><a href="/shop?category=home-decor" style="color: rgba(255,255,255,0.7);">Home Decor</a></li>
                    <li><a href="/shop?category=gifts" style="color: rgba(255,255,255,0.7);">Gifts</a></li>
                    <li><a href="/shop?category=photos" style="color: rgba(255,255,255,0.7);">Photos</a></li>
                    <li><a href="/new-arrivals" style="color: rgba(255,255,255,0.7);">New Arrivals</a></li>
                </ul>
            </div>
            
            <!-- Column 4: Contact & Newsletter -->
            <div class="col-lg-4 col-md-4 mb-5">
                <h5 class="footer-title" style="color: #c9af98; border-bottom: 2px solid #845007;">Contact Info</h5>
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt" style="color: #c9af98;"></i> <span style="color: rgba(255,255,255,0.7);">COMSATS University, Islamabad, Wah Campus</span></li>
                    <li><i class="fas fa-phone" style="color: #c9af98;"></i> <span style="color: rgba(255,255,255,0.7);">+92 315 4136636</span></li>
                    <li><i class="fas fa-envelope" style="color: #c9af98;"></i> <span style="color: rgba(255,255,255,0.7);">saduaad55@gmail.com</span></li>
                </ul>
                
                <h5 class="footer-title mt-4" style="color: #c9af98; border-bottom: 2px solid #845007;">Newsletter</h5>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" style="background: rgba(255,255,255,0.1); color: white; border: 1px solid #3a4660;">
                    <button type="submit" style="background: linear-gradient(to right, #3a4660, #845007);">Subscribe</button>
                </form>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom pt-4" style="border-top: 1px solid #3a4660;">
            <div class="row">
                <div class="col-md-6">
                    <p style="color: rgba(255,255,255,0.5);">&copy; Shopiko. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <div class="payment-methods">
                        <img src="user/assets/imgs/theme/payment/visa.png" alt="Visa">
                        <img src="user/assets/imgs/theme/payment/mastercard.png" alt="Mastercard">
                        <img src="user/assets/imgs/theme/payment/nayapay.jpg" alt="Paypal">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
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
    
    .newsletter-form {
        display: flex;
        gap: 10px;
    }
    
    .newsletter-form input {
        flex-grow: 1;
        padding: 10px 15px;
        border-radius: 6px;
    }
    
    .newsletter-form input::placeholder {
        color: rgba(255,255,255,0.5);
    }
    
    .newsletter-form button {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .newsletter-form button:hover {
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
</style>