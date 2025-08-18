<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspirations | Shopiko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

        
        
        .inspirations-hero {
            background: linear-gradient(rgba(58, 70, 96, 0.7), rgba(58, 70, 96, 0.7)), 
                        url('https://images.unsplash.com/photo-1556905055-8f358a7a47b2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 400px;
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

        .btn-explore {
            display: inline-block;
            background: var(--accent);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(132, 80, 7, 0.3);
        }

        .btn-explore:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(132, 80, 7, 0.4);
        }

        .inspirations-container {
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

        .gallery-filter {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 40px;
        }

        .filter-btn {
            padding: 8px 20px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 50px;
            font-weight: 600;
            color: var(--dark-text);
            transition: var(--transition);
            cursor: pointer;
        }

        .filter-btn:hover, .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .inspiration-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            position: relative;
        }

        .inspiration-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(58, 70, 96, 0.15);
        }

        .card-image {
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .inspiration-card:hover .card-image img {
            transform: scale(1.05);
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(58,70,96,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .inspiration-card:hover .card-overlay {
            opacity: 1;
        }

        .customize-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .customize-btn:hover {
            background: var(--secondary);
            transform: scale(1.1);
        }

        .card-info {
            padding: 20px;
        }

        .card-info h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .card-info p {
            color: var(--gray-text);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: var(--gray-text);
        }

        .likes {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .likes i {
            color: var(--accent);
        }

       /* Updated Modal Styles */
.customization-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.8);
    z-index: 1000;
    align-items: center;
    justify-content: center;
    overflow-y: auto;
    padding: 20px;
    box-sizing: border-box;
}

.customization-container {
    background: white;
    width: 100%;
    max-width: 1000px;
    border-radius: var(--border-radius);
    overflow: hidden;
    display: grid;
    grid-template-columns: 1fr 1fr;
    max-height: 90vh;
    margin: auto;
    position: relative;
    transform: translateY(0);
    animation: modalFadeIn 0.3s ease-out;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .customization-container {
        grid-template-columns: 1fr;
        max-height: 95vh;
    }
    
    .customization-preview {
        height: 300px;
    }
}

        .customization-preview {
            position: relative;
            height: 500px;
            background: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .customization-preview img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .customization-controls {
            padding: 30px;
        }

        .customization-controls h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .option-group {
            margin-bottom: 25px;
        }

        .option-group h4 {
            font-size: 1rem;
            color: var(--primary);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .color-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: var(--transition);
        }

        .color-option:hover, .color-option.active {
            border-color: var(--accent);
            transform: scale(1.1);
        }

        .text-options input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-family: inherit;
            margin-bottom: 10px;
        }

        .font-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .font-option {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .font-option:hover, .font-option.active {
            border-color: var(--accent);
            color: var(--accent);
        }

        .btn-add-to-cart {
            display: block;
            width: 100%;
            background: var(--accent);
            color: white;
            border: none;
            padding: 15px;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 30px;
        }

        .btn-add-to-cart:hover {
            background: var(--primary);
        }

        .close-customization {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--box-shadow);
            z-index: 10;
        }

        .preview-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 5;
            display: none;
        }

        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid var(--accent);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .quantity-selector input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 8px;
            margin: 0 10px;
        }

        .quantity-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #f3f4f6;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: #e5e7eb;
        }

        @media (max-width: 992px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .customization-container {
                grid-template-columns: 1fr;
            }
            
            .customization-preview {
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
        }
    </style>
</head>
<body>
@include('user.header')
    
    <section class="inspirations-hero">
        <div class="hero-content">
            <h1>Design Inspirations</h1>
            <p>Discover beautiful creations from our community and customize them to make them uniquely yours</p>
            <a href="#gallery" class="btn-explore">Explore Designs</a>
        </div>
    </section>

    <div class="inspirations-container">
        <div class="section-title" id="gallery">
            <h2>Featured Designs</h2>
            <p>Browse through our collection of popular designs. Click any design to start customizing.</p>
        </div>

        <div class="gallery-filter">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="apparel">Apparel</button>
            <button class="filter-btn" data-filter="gifts">Gifts</button>
            <button class="filter-btn" data-filter="home-decor">Home Decor</button>
            <button class="filter-btn" data-filter="accessories">Accessories</button>
        </div>

        <div class="gallery-grid">
           
            <div class="inspiration-card" data-category="apparel">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Custom T-Shirt Design">
                    <div class="card-overlay">
                        <a href="#" class="customize-btn" data-design="1" data-product-id="1" data-title="Minimalist Typography Tee">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Minimalist Typography Tee</h3>
                    <p>A clean, modern t-shirt design featuring customizable text in your choice of font and color.</p>
                    <div class="card-meta">
                        <span>By: CreativeStudio</span>
                        <div class="likes">
                            <i class="fas fa-heart"></i>
                            <span>248</span>
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="inspiration-card" data-category="gifts">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Personalized Mug Design">
                    <div class="card-overlay">
                        <a href="#" class="customize-btn" data-design="2" data-product-id="2" data-title="Morning Motivation Mug">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Morning Motivation Mug</h3>
                    <p>Start your day right with this customizable mug featuring inspirational quotes.</p>
                    <div class="card-meta">
                        <span>By: DesignHaven</span>
                        <div class="likes">
                            <i class="fas fa-heart"></i>
                            <span>189</span>
                        </div>
                    </div>
                </div>
            </div>

         
            <div class="inspiration-card" data-category="home-decor">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Wall Art Design">
                    <div class="card-overlay">
                        <a href="#" class="customize-btn" data-design="3" data-product-id="3" data-title="Family Name Wall Art">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Family Name Wall Art</h3>
                    <p>Elegant wall decor featuring your family name in a beautiful script font.</p>
                    <div class="card-meta">
                        <span>By: ArtisanDecor</span>
                        <div class="likes">
                            <i class="fas fa-heart"></i>
                            <span>312</span>
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="inspiration-card" data-category="accessories">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Phone Case Design">
                    <div class="card-overlay">
                        <a href="#" class="customize-btn" data-design="4" data-product-id="4" data-title="Geometric Phone Case">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Geometric Phone Case</h3>
                    <p>Stylish phone case with customizable geometric patterns and colors.</p>
                    <div class="card-meta">
                        <span>By: ModernDesigns</span>
                        <div class="likes">
                            <i class="fas fa-heart"></i>
                            <span>156</span>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="inspiration-card" data-category="apparel">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1527719327859-c6ce80353573?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Hoodie Design">
                    <div class="card-overlay">
                        <a href="#" class="customize-btn" data-design="5" data-product-id="5" data-title="Vintage Logo Hoodie">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Vintage Logo Hoodie</h3>
                    <p>Comfortable hoodie with a retro-inspired logo that you can personalize.</p>
                    <div class="card-meta">
                        <span>By: RetroThreads</span>
                        <div class="likes">
                            <i class="fas fa-heart"></i>
                            <span>278</span>
                        </div>
                    </div>
                </div>
            </div>

         
            <div class="inspiration-card" data-category="gifts">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Notebook Design">
                    <div class="card-overlay">
                        <a href="#" class="customize-btn" data-design="6" data-product-id="6" data-title="Personalized Journal">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="card-info">
                    <h3>Personalized Journal</h3>
                    <p>Custom notebook with your name or special message embossed on the cover.</p>
                    <div class="card-meta">
                        <span>By: WriteAway</span>
                        <div class="likes">
                            <i class="fas fa-heart"></i>
                            <span>203</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <div class="customization-modal" id="customizationModal">
        <div class="customization-container">
            <div class="close-customization">
                <i class="fas fa-times"></i>
            </div>
            <div class="customization-preview">
                <div class="preview-loader">
                    <div class="loader"></div>
                </div>
                <img src="" alt="Customization Preview" id="customizationPreview">
            </div>
            <div class="customization-controls">
                <h3 id="designTitle">Customize Your Design</h3>
                
                <form id="customizationForm">
                    @csrf
                    <input type="hidden" id="productId" name="product_id">
                    <input type="hidden" id="previewImage" name="preview_image">
                    
                    <div class="option-group">
                        <h4>Color Options</h4>
                        <div class="color-options">
                            <div class="color-option active" style="background-color: #3a4660;" data-color="#3a4660" data-color-name="Navy Blue"></div>
                            <div class="color-option" style="background-color: #845007;" data-color="#845007" data-color-name="Dark Brown"></div>
                            <div class="color-option" style="background-color: #c9af98;" data-color="#c9af98" data-color-name="Beige"></div>
                            <div class="color-option" style="background-color: #ffffff; border: 1px solid #ddd;" data-color="#ffffff" data-color-name="White"></div>
                            <div class="color-option" style="background-color: #000000;" data-color="#000000" data-color-name="Black"></div>
                            <div class="color-option" style="background-color: #FF0000;" data-color="#FF0000" data-color-name="Red"></div>
                            <div class="color-option" style="background-color: #00FF00;" data-color="#00FF00" data-color-name="Green"></div>
                            <div class="color-option" style="background-color: #0000FF;" data-color="#0000FF" data-color-name="Blue"></div>
                        </div>
                        <input type="hidden" id="selectedColor" name="selected_color" value="Navy Blue">
                    </div>
                    
                    <div class="option-group text-options">
                        <h4>Personalize Text</h4>
                        <input type="text" placeholder="Enter your custom text" id="customText" name="custom_text" maxlength="50">
                        <div class="text-right"><small><span id="charCount">0</span>/50 characters</small></div>
                    </div>
                    
                    <div class="option-group">
                        <h4>Font Style</h4>
                        <div class="font-options">
                            <div class="font-option active" data-font="Montserrat">Modern</div>
                            <div class="font-option" data-font="Playfair Display">Elegant</div>
                            <div class="font-option" data-font="Courier New">Typewriter</div>
                            <div class="font-option" data-font="Brush Script MT">Handwritten</div>
                        </div>
                        <input type="hidden" id="selectedFont" name="selected_font" value="Montserrat">
                    </div>
                    
                    <div class="option-group">
                        <h4>Text Color</h4>
                        <div class="color-options">
                            <div class="color-option active" style="background-color: #000000;" data-text-color="#000000" data-text-color-name="Black"></div>
                            <div class="color-option" style="background-color: #ffffff; border: 1px solid #ddd;" data-text-color="#ffffff" data-text-color-name="White"></div>
                            <div class="color-option" style="background-color: #FF0000;" data-text-color="#FF0000" data-text-color-name="Red"></div>
                            <div class="color-option" style="background-color: #0000FF;" data-text-color="#0000FF" data-text-color-name="Blue"></div>
                            <div class="color-option" style="background-color: #008000;" data-text-color="#008000" data-text-color-name="Dark Green"></div>
                        </div>
                        <input type="hidden" id="selectedTextColor" name="selected_text_color" value="Black">
                    </div>
                    
                    <div class="option-group">
                        <h4>Quantity</h4>
                        <div class="quantity-selector">
                            <button type="button" class="quantity-btn" id="decrement-qty">-</button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="100">
                            <button type="button" class="quantity-btn" id="increment-qty">+</button>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-add-to-cart">
                        <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       $(document).ready(function() {
    const customizationModal = $('#customizationModal');
    const customizeBtns = $('.customize-btn');
    const closeCustomization = $('.close-customization');
    const customizationPreview = $('#customizationPreview');
    const designTitle = $('#designTitle');
    const productIdField = $('#productId');
    const previewImageField = $('#previewImage');
    const customizationForm = $('#customizationForm');
    const previewLoader = $('.preview-loader');
    
    let currentPreviewImage = '';
    let isUpdatingPreview = false;
    
    $('.filter-btn').on('click', function() {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        const filter = $(this).data('filter');
        const cards = $('.inspiration-card');
        
        if (filter === 'all') {
            cards.show();
        } else {
            cards.each(function() {
                $(this).toggle($(this).data('category') === filter);
            });
        }
    });
    
    function showCenteredModal() {
        customizationModal.css({
            'display': 'flex',
            'align-items': 'center',
            'justify-content': 'center'
        }).hide().fadeIn(300);
    }
    
    function showLoader() {
        previewLoader.show();
    }
    
    function hideLoader() {
        previewLoader.hide();
    }
    
    function resetCustomizationForm() {
        customizationForm[0].reset();
        $('#charCount').text('0');
        $('.color-option').removeClass('active');
        $('.color-option[data-color-name="Navy Blue"]').addClass('active');
        $('.font-option').removeClass('active');
        $('.font-option[data-font="Montserrat"]').addClass('active');
        $('.color-option[data-text-color]').removeClass('active');
        $('.color-option[data-text-color-name="Black"]').addClass('active');
        $('#quantity').val(1);
        $('#selectedColor').val('Navy Blue');
        $('#selectedFont').val('Montserrat');
        $('#selectedTextColor').val('Black');
    }
    
    customizeBtns.on('click', function(e) {
        e.preventDefault();
        
        const productId = $(this).data('product-id');
        const title = $(this).data('title');
        const imgSrc = $(this).closest('.card-image').find('img').attr('src');
        
        resetCustomizationForm();
        
        designTitle.text(`Customize: ${title}`);
        customizationPreview.attr('src', imgSrc);
        currentPreviewImage = imgSrc;
        productIdField.val(productId);
        
        showCenteredModal();
    });
    
    closeCustomization.on('click', function() {
        customizationModal.fadeOut();
    });
    
    customizationModal.on('click', function(e) {
        if (e.target === this) {
            customizationModal.fadeOut();
        }
    });
    
    $('.color-option').on('click', function() {
        $('.color-option').not(this).removeClass('active');
        $(this).addClass('active');
        
        if ($(this).data('color-name')) {
            $('#selectedColor').val($(this).data('color-name'));
        } else if ($(this).data('text-color-name')) {
            $('#selectedTextColor').val($(this).data('text-color-name'));
        }
        
        updatePreview();
    });
    
 
    $('.font-option').on('click', function() {
        $('.font-option').not(this).removeClass('active');
        $(this).addClass('active');
        $('#selectedFont').val($(this).data('font'));
        updatePreview();
    });
    
  
    $('#increment-qty').on('click', function() {
        const qtyInput = $('#quantity');
        let qty = parseInt(qtyInput.val());
        if (qty < 100) qtyInput.val(qty + 1);
    });
    
    $('#decrement-qty').on('click', function() {
        const qtyInput = $('#quantity');
        let qty = parseInt(qtyInput.val());
        if (qty > 1) qtyInput.val(qty - 1);
    });
    
   
    $('#customText').on('input', function() {
        $('#charCount').text($(this).val().length);
        updatePreview();
    });
    
   
    function updatePreview() {
        if (isUpdatingPreview) return;
        
        isUpdatingPreview = true;
        showLoader();
        
        setTimeout(() => {
            
            customizationPreview.attr('src', currentPreviewImage);
            previewImageField.val(currentPreviewImage);
            
            hideLoader();
            isUpdatingPreview = false;
        }, 500);
    }
    
 
    customizationForm.on('submit', function(e) {
        e.preventDefault();
        
        const customText = $('#customText').val().trim();
        
       
        if (!customText) {
            Swal.fire({
                icon: 'error',
                title: 'Missing Information',
                text: 'Please enter your custom text',
                confirmButtonColor: '#845007'
            });
            return;
        }
        
        const customizationData = {
            color: $('#selectedColor').val(),
            text: customText,
            font: $('#selectedFont').val(),
            text_color: $('#selectedTextColor').val(),
            quantity: $('#quantity').val()
        };
        
        const formData = {
            _token: $('input[name="_token"]').val(),
            product_id: productIdField.val(),
            customization_data: JSON.stringify(customizationData),
            preview_image: previewImageField.val(),
            quantity: customizationData.quantity
        };
        
        showLoader();
        
        $.ajax({
            url: '/add-to-cart/' + productIdField.val(),
            method: 'POST',
            data: formData,
            success: function(response) {
                hideLoader();
                
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Cart',
                        text: response.message,
                        showConfirmButton: true,
                        confirmButtonText: 'View Cart',
                        confirmButtonColor: '#845007',
                        showCancelButton: true,
                        cancelButtonText: 'Continue Shopping',
                        cancelButtonColor: '#3a4660'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/cart';
                        } else {
                            customizationModal.fadeOut();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        confirmButtonColor: '#845007'
                    });
                }
            },
            error: function(xhr) {
                hideLoader();
                
                let errorMessage = 'Failed to add to cart';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.statusText) {
                    errorMessage += `: ${xhr.statusText}`;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                    confirmButtonColor: '#845007'
                });
            }
        });
    });
    
    $('#customText').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            return false;
        }
    });
});
</script>
</body>
</html>