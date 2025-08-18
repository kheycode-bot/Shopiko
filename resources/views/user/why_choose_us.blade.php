<section class="why-choose-section section-padding">
    <div class="container">
    <div class="section-title text-center mb-5">
    <h2 class="display-4">Why <span class="text-gradient">Choose Us</span></h2>
    <p class="lead">We go the extra mile to make your experience special</p>
</div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Unlimited Customization</h3>
                    <p>Complete creative freedom with our advanced design tools and hundreds of options.</p>
                    <div class="feature-wave"></div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>We use only the highest quality materials and printing techniques for lasting results.</p>
                    <div class="feature-wave"></div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3>Fast Turnaround</h3>
                    <p>Most custom items ship within 2-3 business days without rushing your design process.</p>
                    <div class="feature-wave"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .why-choose-section {
        background: linear-gradient(135deg, #3a4660 0%, #2a3447 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .why-choose-section .section-title h2,
    .why-choose-section .section-title p {
        color: white;
    }
    
    .text-gradient {
    background: linear-gradient(45deg, #c9af98, #845007);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    display: inline;
    font-weight: 700; /* Optional: makes the gradient text bolder */
}

.section-title h2 {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: #3a4660; /* Your primary dark blue color */
    position: relative;
    display: inline-block;
}

.section-title .lead {
    color: #666; /* Subtitle color */
    font-size: 1.25rem;
    margin-top: 15px;
}
    .feature-card {
        background: rgba(255,255,255,0.05);
        border-radius: 16px;
        padding: 40px 30px;
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255,255,255,0.1);
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        background: rgba(255,255,255,0.1);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(45deg, #c9af98, #845007);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 28px;
        color: white;
        transition: all 0.4s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: rotateY(180deg);
    }
    
    .feature-card h3 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
        text-align: center;
    }
    
    .feature-card p {
        color: rgba(255,255,255,0.8);
        text-align: center;
        margin-bottom: 0;
    }
    
    .feature-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, #c9af98, #845007);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.6s ease;
    }
    
    .feature-card:hover .feature-wave {
        transform: scaleX(1);
    }
</style>