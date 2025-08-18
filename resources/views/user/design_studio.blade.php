<section class="design-studio-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="design-studio-image">
                    <div class="image-frame">
                        <img src="user/assets/imgs/designstudio.webp" alt="Design Studio" class="img-fluid rounded-lg">
                    </div>
                    <div class="floating-badge">
                        <i class="fas fa-magic"></i> 50,000+ Designs Created
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="design-studio-content">
                    <h2 class="display-4 mb-4">Our <span class="text-gradient">Design Studio</span></h2>
                    <p class="lead mb-4">Bring your imagination to life with our easy-to-use customization tools.</p>
                    <ul class="studio-features">
                        <li>
                            <i class="fas fa-palette"></i>
                            <span>Unlimited color combinations</span>
                        </li>
                        <li>
                            <i class="fas fa-font"></i>
                            <span>100+ premium fonts</span>
                        </li>
                        <li>
                            <i class="fas fa-images"></i>
                            <span>Upload your own images</span>
                        </li>
                        <li>
                            <i class="fas fa-eye"></i>
                            <span>Real-time 3D preview</span>
                        </li>
                    </ul>
                    <a href="{{route('user.shop')}}" class="btn btn-studio mt-4">
                        Try Our Designer <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
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
</style>