<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }} | Shopiko </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            --sale: #e63946;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Montserrat', sans-serif;
            color: var(--dark-text);
            line-height: 1.6;
        }

       
        
        .product-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .product-detail {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .product-gallery {
            padding: 2rem;
            background: var(--light-bg);
        }
        
        .main-image {
            width: 100%;
            height: 400px;
            object-fit: contain;
            margin-bottom: 1rem;
        }
        
        .thumbnail-container {
            display: flex;
            gap: 0.5rem;
        }
        
        .thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border: 2px solid transparent;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .thumbnail:hover, .thumbnail.active {
            border-color: var(--accent);
        }
        
        .product-info {
            padding: 2rem;
        }
        
        .product-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .product-category {
            font-size: 0.9rem;
            color: var(--gray-text);
            margin-bottom: 1rem;
        }
        
        .product-category a {
            color: var(--accent);
            text-decoration: none;
        }
        
        .price-container {
            margin: 1.5rem 0;
        }
        
        .current-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--sale);
        }
        
        .old-price {
            text-decoration: line-through;
            color: var(--gray-text);
            margin-left: 0.5rem;
        }
        
        .sale-badge {
            display: inline-block;
            background: var(--sale);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }
        
        .product-description {
            margin: 1.5rem 0;
            line-height: 1.7;
        }
        
        .add-to-cart-form {
            margin-top: 2rem;
        }
        
        .quantity-input {
            width: 80px;
            text-align: center;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            margin-right: 1rem;
        }
        
        .add-to-cart-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: var(--transition);
        }
        
        .add-to-cart-btn:hover {
            background: var(--accent);
            transform: translateY(-2px);
        }
        
        .product-meta {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #eee;
        }
        
        .meta-item {
            margin-bottom: 0.5rem;
        }
        
        .meta-label {
            font-weight: 600;
            color: var(--primary);
            margin-right: 0.5rem;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .main-image {
                height: 300px;
            }
            
            .product-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    
    <div class="product-container">
        <div class="product-detail">
            <div class="row">
                <!-- Product Gallery -->
                <div class="col-md-6">
                    <div class="product-gallery">
                        <img src="{{ $product->image_url }}" alt="{{ $product->title }}" class="main-image" id="mainImage">
                        <div class="thumbnail-container">
                            @foreach($product->images as $image)
                            <img src="{{ $image->url }}" alt="{{ $product->title }}" class="thumbnail" onclick="changeMainImage(this)">
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="col-md-6">
                    <div class="product-info">
                        <h1 class="product-title">{{ $product->title }}</h1>
                        
                        @if(!empty($product->category_name))
                        <div class="product-category">
                            <i class="fas fa-tag me-1"></i>
                            <a href="{{ route('category.products', $product->category->id) }}">
                                {{ $product->category_name }}
                            </a>
                        </div>
                        @endif
                        
                        <div class="price-container">
                            @if($product->discount_price > 0 && $product->price > 0)
                                <span class="current-price">Rs. {{ number_format($product->discount_price) }}</span>
                                <span class="old-price">Rs. {{ number_format($product->price) }}</span>
                                <span class="sale-badge">
                                    {{ round(100 - ($product->discount_price/$product->price)*100) }}% OFF
                                </span>
                            @else
                                <span class="current-price">Rs. {{ number_format($product->price) }}</span>
                            @endif
                        </div>
                        
                        <div class="product-description">
                            {{ $product->description }}
                        </div>
                        
                        <form action="{{ route('add-to-cart', $product->id) }}" method="POST" class="add-to-cart-form">
                            @csrf
                            <div class="d-flex align-items-center">
                                <input type="number" 
                                       name="quantity" 
                                       value="1" 
                                       min="1" 
                                       max="{{ $product->stock ?? 10 }}" 
                                       class="quantity-input">
                                <button type="submit" class="add-to-cart-btn">
                                    <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                </button>
                            </div>
                        </form>
                        
                        <div class="product-meta">
                            <div class="meta-item">
                                <span class="meta-label">SKU:</span>
                                <span>{{ $product->sku ?? 'N/A' }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Availability:</span>
                                <span>{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeMainImage(element) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = element.src;
            
            // Update active thumbnail
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            element.classList.add('active');
        }
        
        $(document).ready(function() {
            // Quantity validation
            $('input[name="quantity"]').on('change', function() {
                const max = parseInt($(this).attr('max')) || 100;
                const min = parseInt($(this).attr('min')) || 1;
                let value = parseInt($(this).val()) || min;
                
                if (value > max) {
                    value = max;
                    $(this).val(max);
                    alert('Maximum available quantity is ' + max);
                } else if (value < min) {
                    value = min;
                    $(this).val(min);
                }
                
                $(this).val(value);
            });
        });
    </script>
</body>
</html>