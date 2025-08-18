<section class="testimonials-section section-padding bg-light">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="display-4">Customer <span class="text-gradient">Love</span></h2>
            <p class="lead">What our customers say about us</p>
        </div>
        
        <div class="testimonials-carousel" id="testimonialsCarousel">
            @foreach($approvedTestimonials as $testimonial)
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                        <i class="mdi mdi-star text-warning"></i>
                    @endfor
                    @for($i = $testimonial->rating; $i < 5; $i++)
                        <i class="mdi mdi-star-outline text-warning"></i>
                    @endfor
                </div>
                <p class="testimonial-text">{{ $testimonial->feedback }}</p>
                <div class="testimonial-author">
                    <div class="author-initials">
                        {{ substr($testimonial->name, 0, 1) }}{{ isset(explode(' ', $testimonial->name)[1]) ? substr(explode(' ', $testimonial->name)[1], 0, 1) : '' }}
                    </div>
                    <div class="author-info">
                        <h5>{{ $testimonial->name }}</h5>
                        <span>Verified Customer</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>

    .testimonials-dots {
    position: absolute;
    bottom: -40px;
    list-style: none;
    display: flex;
    justify-content: center;
    padding: 0;
    margin: 0;
    width: 100%;
}

.testimonials-dots li {
    margin: 0 5px;
}

.testimonials-dots li button {
    font-size: 0;
    line-height: 0;
    display: block;
    width: 12px;
    height: 12px;
    padding: 0;
    cursor: pointer;
    color: transparent;
    border: 0;
    outline: none;
    background: #ccc;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.testimonials-dots li.slick-active button {
    background: #c9af98;
}

.testimonials-dots li button:hover {
    background: #c9af98;
}

   .testimonials-section {
    background-color: #f8f9fa;
    padding: 80px 0;
}

.testimonial-card {
    background: white;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(58, 70, 96, 0.08);
    transition: all 0.3s ease;
    margin: 0 15px;
    height: 100%;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(58, 70, 96, 0.15);
}

.testimonial-rating {
    color: #ffc107;
    margin-bottom: 15px;
    font-size: 18px;
}

.testimonial-text {
    font-size: 16px;
    color: #555;
    font-style: italic;
    margin-bottom: 20px;
    position: relative;
    line-height: 1.6;
}

.testimonial-text::before {
    content: '"';
    font-size: 60px;
    color: rgba(201, 175, 152, 0.2);
    position: absolute;
    top: -30px;
    left: -10px;
    font-family: serif;
    line-height: 1;
}

.testimonial-author {
    display: flex;
    align-items: center;
    margin-top: 20px;
}

.author-initials {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #c9af98;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 18px;
    margin-right: 15px;
}

.author-info h5 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #3a4660;
}

.author-info span {
    font-size: 13px;
    color: #888;
}

@media (max-width: 768px) {
    .testimonial-card {
        padding: 20px;
    }
    
    .testimonial-text {
        font-size: 15px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.testimonials-carousel')) {
        $('.testimonials-carousel').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dotsClass: 'slick-dots testimonials-dots',
            customPaging: function(slider, i) {
                return '';
            },
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
});
</script>