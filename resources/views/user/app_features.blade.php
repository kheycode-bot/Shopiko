<section class="features-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h4>Free Shipping</h4>
                    <p>On all orders over $50</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Dedicated customer care</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h4>Money Back</h4>
                    <p>30 days return policy</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h4>Gift Cards</h4>
                    <p>Perfect gift solution</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h4>Promotions</h4>
                    <p>Regular special offers</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Happy Sell</h4>
                    <p>100% satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .features-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--dark-text) 100%);
        color: white;
        margin-top: 0;
        padding-top: 2rem;

    }
    
    
    .feature-card {
        text-align: center;
        padding: 25px 15px;
        transition: var(--transition);
        height: 100%;
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
    
    @media (max-width: 768px) {
        .feature-card {
            padding: 20px 10px;
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
        }
        
        .feature-icon i {
            font-size: 24px;
        }
    }
</style>