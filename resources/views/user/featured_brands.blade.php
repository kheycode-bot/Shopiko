<section class="trending-section section-padding">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="display-4">Trending <span class="text-gradient">Now</span></h2>
            <p class="lead">Discover what others are customizing</p>
        </div>
        
        <div class="trending-container">
            <div class="trending-track">
                @foreach($mostOrderedProducts as $index => $product)
                <div class="trending-item">
                    <div class="trending-card">
                        @if($index === 0)
                        <div class="trending-badge">Most Popular</div>
                        @elseif($index === 1)
                        <div class="trending-badge">Trending</div>
                        @endif
                        <div class="trending-image" style="background-image: url('{{ asset($product->image) }}')"></div>
                        <div class="trending-content">
                            <h3>{{ $product->title }}</h3>
                            <div class="trending-meta">
                                <span class="trending-orders">{{ $product->total_orders }}+ Orders</span>
                                <div class="trending-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
<a href="{{ route('product.details', $product->id) }}" class="btn btn-trending">
                                    Customize Yours <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .text-gradient {
        background: linear-gradient(45deg, #c9af98, #845007);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline;
    }
    
    .trending-section {
        background-color: #f9f7f4;
        position: relative;
        overflow: hidden;
        padding: 60px 0;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    
    .trending-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('user/assets/imgs/patterns/dots-pattern.png') repeat;
        opacity: 0.03;
        pointer-events: none;
    }
    
    .trending-container {
        overflow: hidden;
        position: relative;
        width: 100%;
        max-width: 2000px; 
        margin: 0 auto;
    }
    
    .trending-track {
        display: flex;
        gap: 20px; 
        width: max-content;
        animation: scroll 30s linear infinite;
    }
    
    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-50% - 10px)); }
    }
    
    .trending-item {
        flex: 0 0 300px; /* Fixed width for items */
    }
    
    .trending-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(58, 70, 96, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .trending-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(58, 70, 96, 0.15);
    }
    
    .trending-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: linear-gradient(45deg, #845007, #c9af98);
        color: white;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 11px;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(133, 80, 7, 0.3);
    }
    
      .trending-image {
        height: 180px;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        background-color: #f5f5f5;
    }
    
    .trending-image::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background: linear-gradient(to top, rgba(0,0,0,0.4), transparent);
    }
    
    .trending-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .trending-content h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #3a4660;
    }
    
    .trending-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .trending-orders {
        font-size: 12px;
        color: #666;
    }
    
    .trending-stars {
        color: #ffc107;
        font-size: 13px;
    }
    
    .btn-trending {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: 600;
        color: white;
        background: linear-gradient(45deg, #3a4660, #2a3447);
        border: none;
        border-radius: 50px;
        margin-top: auto;
        transition: all 0.3s ease;
        box-shadow: 0 3px 12px rgba(58, 70, 96, 0.2);
    }
    
    .btn-trending:hover {
        background: linear-gradient(45deg, #845007, #c9af98);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(133, 80, 7, 0.3);
        color: white;
    }
    
    /* Pause animation on hover */
    .trending-container:hover .trending-track {
        animation-play-state: paused;
    }
    
    @media (max-width: 992px) {
        .trending-container {
            max-width: 700px;
        }
        
        .trending-item {
            flex: 0 0 240px;
        }
        
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-100% - 20px)); }
        }
    }
    
    @media (max-width: 768px) {
        .trending-container {
            max-width: 500px;
        }
        
        .trending-item {
            flex: 0 0 220px;
        }
    }
    
    @media (max-width: 576px) {
        .trending-container {
            max-width: 300px;
        }
        
        .trending-item {
            flex: 0 0 280px;
        }
        
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-100% - 20px)); }
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Clone items for seamless looping
        const track = document.querySelector('.trending-track');
        const items = document.querySelectorAll('.trending-item');
        
        // Only clone if not already duplicated
        if (items.length <= 3) {
            items.forEach(item => {
                track.appendChild(item.cloneNode(true));
            });
        }
        
        // Initialize animation
        track.style.animation = 'scroll 30s linear infinite';
        
        // Pause animation when hovering over individual cards
        const cards = document.querySelectorAll('.trending-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                track.style.animationPlayState = 'paused';
            });
            card.addEventListener('mouseleave', function() {
                track.style.animationPlayState = 'running';
            });
        });
    });
</script>