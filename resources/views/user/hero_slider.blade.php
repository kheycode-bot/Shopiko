<section class="hero-slider">
    <div class="slider-container">
        <div class="slide active" style="background: linear-gradient(rgba(58, 70, 96, 0.2), rgba(58, 70, 96, 0.2)), url('user/assets/imgs/slider/1.png') center/cover no-repeat;">
            <div class="slide-content">
                <h1>Create Your Signature Style</h1>
                <p class="lead">Design custom products that reflect your unique personality</p>
                <a href="{{route('user.shop')}}" class="btn btn-glow">
                    Start Designing <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
        
        <div class="slide" style="background: linear-gradient(rgba(58, 70, 96, 0.2), rgba(58, 70, 96, 0.2)), url('user/assets/imgs/slider/3.png') center/cover no-repeat;">
            <div class="slide-content">
                <h1>Personalized Gifts</h1>
                <p class="lead">Thoughtful customized presents for every occasion</p>
                <a href="{{route('user.shop')}}" class="btn btn-glow">
                    Explore Collections <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    :root {
        --primary: #3a4660;
        --secondary: #c9af98;
        --accent: #845007;
        --transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
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
        transition: var(--transition);
    }
    
    .slide.active .slide-content {
        transform: translateY(0);
    }
    
    .slide h1 {
        font-size: 48px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        line-height: 1.2;
        transform: translateY(20px);
        transition: var(--transition);
    }
    
    .slide.active h1 {
        transform: translateY(0);
    }
    
    .slide .lead {
        font-size: 20px;
        margin-bottom: 30px;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        transform: translateY(20px);
        transition: var(--transition);
        transition-delay: 0.1s;
    }
    
    .slide.active .lead {
        transform: translateY(0);
    }
    
    .btn-glow {
        display: inline-flex;
        align-items: center;
        padding: 15px 35px;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: white;
        background: linear-gradient(45deg, var(--primary), #2a3447);
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(58, 70, 96, 0.3);
        position: relative;
        overflow: hidden;
        transition: var(--transition);
        transform: translateY(20px);
        opacity: 0;
    }
    
    .slide.active .btn-glow {
        transform: translateY(0);
        opacity: 1;
        transition-delay: 0.2s;
    }
    
    .btn-glow:hover {
        background: linear-gradient(45deg, var(--accent), var(--secondary));
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
    
    .btn-glow i {
        transition: transform 0.3s ease;
    }
    
    .btn-glow:hover i {
        transform: translateX(5px);
    }
    
    @media (max-width: 768px) {
        .hero-slider {
            height: 60vh;
        }
        
        .slide h1 {
            font-size: 36px;
        }
        
        .slide .lead {
            font-size: 18px;
        }
        
        .btn-glow {
            padding: 12px 25px;
            font-size: 14px;
        }
    }
</style>

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
    });
</script>