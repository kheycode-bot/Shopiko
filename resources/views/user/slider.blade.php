<section class="categories-section section-padding bg-light">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h2 class="display-4">Shop By <span class="text-gradient">Category</span></h2>
            <p class="lead">Discover our curated collections</p>
        </div>
        
        <div class="row">
            <!-- Gifts Category -->
            <div class="col-lg-6 mb-4">
                <div class="feature-box large-box" style="background: linear-gradient(rgba(58,70,96,0.1), rgba(58,70,96,0.2)), url('user/assets/imgs/categories/gifts.webp') center center/cover no-repeat;">
                    <div class="feature-overlay">
                        <h2 class="text-white">Gifts</h2>
                        <p class="text-light">Customized Gifts for Every Occasion</p>
                        <a href="{{ route('category.gifts') }}" class="btn btn-glow">
                            Shop Now <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Other Categories -->
            <div class="col-lg-6">
                <div class="row">
                    <!-- Apparel Block -->
                    <div class="col-md-6 mb-4">
                        <div class="feature-box" style="background: linear-gradient(rgba(58,70,96,0.1), rgba(58,70,96,0.2)), url('user/assets/imgs/categories/tshirt.jpeg') center center/cover no-repeat;">
                            <div class="feature-overlay">
                                <h2 class="text-white">Apparel</h2>
                                <p class="text-light">Your Style, Your Design</p>
                                <a href="{{ route('category.apparel') }}" class="btn btn-glow">
                                    Shop Now <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Photos Block -->
                    <div class="col-md-6 mb-4">
                        <div class="feature-box" style="background: linear-gradient(rgba(58,70,96,0.1), rgba(58,70,96,0.2)), url('user/assets/imgs/categories/camera.jpg') center center/cover no-repeat;">
                            <div class="feature-overlay">
                                <h2 class="text-white">Photos</h2>
                                <p class="text-light">Turn Memories into Art</p>
                                <a href="{{ route('category.photos') }}" class="btn btn-glow">
                                    Shop Now <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Accessories Block -->
                    <div class="col-md-6 mb-4">
                        <div class="feature-box" style="background: linear-gradient(rgba(58,70,96,0.1), rgba(58,70,96,0.2)), url('user/assets/imgs/categories/cup.webp') center center/cover no-repeat;">
                            <div class="feature-overlay">
                                <h2 class="text-white">Accessories</h2>
                                <p class="text-light">Personalized Essentials for You</p>
                                <a href="{{ route('category.accessories') }}" class="btn btn-glow">
                                    Shop Now <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Home Decor Block -->
                    <div class="col-md-6 mb-4">
                        <div class="feature-box" style="background: linear-gradient(rgba(58,70,96,0.1), rgba(58,70,96,0.2)), url('user/assets/imgs/categories/home.webp') center center/cover no-repeat;">
                            <div class="feature-overlay">
                                <h2 class="text-white">Home Decor</h2>
                                <p class="text-light">Style Your Space</p>
                                <a href="{{ route('category.home_decor') }}" class="btn btn-glow">
                                    Shop Now <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* ====== Section Styles ====== */
    .categories-section {
        position: relative;
        overflow: hidden;
        background-color: #f8f5f2;
    }
    
    /* ====== Title Styles ====== */
    .section-title h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #3a4660;
        font-size: 2.5rem;
        position: relative;
        display: inline-block;
        margin-bottom: 0px;
    }
    
    .text-gradient {
        background: linear-gradient(45deg, #c9af98, #845007);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 700;
    }
    
    .section-title .lead {
        color: #666;
        font-size: 1.25rem;
        margin-top: 10px;
    }
    
    /* ====== Feature Box Styles ====== */
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
        background: linear-gradient(to bottom, rgba(58,70,96,0.2), rgba(58,70,96,0.8));
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
    
    /* ====== Button Styles ====== */
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
    
    .btn-glow::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }
    
    .btn-glow:hover::before {
        left: 100%;
    }
    
    /* ====== Responsive Styles ====== */
    @media (max-width: 992px) {
        .large-box {
            height: 400px;
            margin-bottom: 20px;
        }
        
        .feature-box {
            height: 250px;
        }
        
        .feature-overlay h2 {
            font-size: 2rem;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
        }
    }
    
    @media (max-width: 768px) {
        .feature-overlay h2 {
            font-size: 1.8rem;
        }
        
        .feature-overlay p {
            font-size: 1rem;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
        }
        
        .section-title .lead {
            font-size: 1.1rem;
        }
    }
</style>