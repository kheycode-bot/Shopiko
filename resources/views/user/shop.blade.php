<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Shopiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="user/assets/imgs/theme/favicon.ico">

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
            font-family: 'Poppins', sans-serif;
            color: var(--dark-text);
            line-height: 1.6;
        }

        .navbar {
            border-bottom: none !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .nav-links a {
            position: relative;
            text-decoration: none !important;
            color: var(--dark-text);
            font-weight: 500;
        }

        .footer-links a {
            text-decoration: none !important;
            color: var(--gray-text);
        }

        .nav-links a:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: var(--accent);
            left: 0;
            bottom: -5px;
            transition: var(--transition);
        }
        
        header * {
            border: none !important;
            text-decoration: none !important;
            box-shadow: none !important;
            outline: none !important;
        }
        
        footer {
            border-top: none !important;
            padding: 2rem 0;
            background-color: var(--primary);
            color: white;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
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
            color: rgba(255,255,255,0.7);
        }
        
        .footer-links a:hover {
            color: var(--secondary) !important;
            padding-left: 5px;
        }
        
        .shop-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .shop-sidebar {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 100px;
            height: fit-content;
        }
        
        .sidebar-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
        }
        
        .sidebar-links {
            list-style: none;
            padding: 0;
        }
        
        .sidebar-links li {
            margin-bottom: 0.5rem;
        }
        
        .sidebar-links a {
            color: var(--gray-text);
            transition: var(--transition);
            display: block;
            padding: 0.5rem 0;
        }
        
        .sidebar-links a:hover, 
        .sidebar-links a.active {
            color: var(--accent);
            font-weight: 500;
        }
        
        .filter-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .shop-main {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
        }
        
        .main-search-container {
        max-width: 800px; 
        margin: 0 auto 2rem auto;
        position: relative;
        width: 100%;
        flex: 1;
        display: flex;
    }
        .search-input {
            width: 100%;
            padding: 0.75rem 1.5rem;
            padding-right: 50px;
            border: 1px solid #ddd;
            border-radius: 50px;
            font-size: 1rem;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(132, 80, 7, 0.1);
        }
        
        .search-btn {
    position: absolute;
    right: 15px;
    top: 40%;
    margin-top:-5px;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    color: var(--accent);
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: var(--transition);
}

.search-btn:hover {
    background-color: rgba(132, 80, 7, 0.1);
}
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .product-card {
            border-radius: var(--border-radius);
            overflow: hidden;
            transition: var(--transition);
            background: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.05);
            position: relative;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-color: rgba(0,0,0,0.1);
        }
        
        .product-img-container {
            position: relative;
            overflow: hidden;
            height: 250px; 
            background-color: #f8f9fa; 
        }
        
        .product-img {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            transition: var(--transition);
            padding: 15px; 
        }
        
        .product-card:hover .product-img {
            transform: scale(1.05);
        }
        
        .sale-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--sale);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
        }
        
        .card-body {
            padding: 1.25rem;
        }
        
        .product-title {
            font-size: 1rem;
            margin-bottom: 0.75rem;
            color: var(--dark-text);
            font-weight: 600;
            text-align: center; 

        }
        
        .price-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            
        }
        
        .current-price {
            font-weight: bold;
            color: var(--accent);
            font-size: 1.1rem;
        }
        
        .old-price {
            text-decoration: line-through;
            color: var(--gray-text);
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
            width: 100%;
            border-radius: 50px;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: #6d4006;
            border-color: #6d4006;
        }
        
        .no-products-found {
            background-color: #f8f9fa;
            border-radius: var(--border-radius);
            padding: 3rem;
            margin: 2rem 0;
            text-align: center;
        }
        
        .no-products-icon {
            font-size: 3rem;
            color: var(--accent);
            margin-bottom: 1rem;
        }
        
        .no-products-title {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .no-products-suggestions {
            color: var(--gray-text);
            margin-bottom: 2rem;
        }
        
        .no-products-suggestions ul {
            list-style: none;
            padding: 0;
        }
        
        .price-slider-container {
            padding: 0.5rem 0;
            
        }
        
        .price-slider {
            width: 100%;
            margin: 0.5rem 0;
            -webkit-appearance: none;
            height: 6px;
            border-radius: 3px;
            background: #ddd;
            outline: none;
        }
        
        .price-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--accent);
            cursor: pointer;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        
        .page-item .page-link {
            color: var(--accent);
            border: 1px solid #ddd;
            margin: 0 0.25rem;
            border-radius: 4px;
        }
        
        .page-item.active .page-link {
            background-color: var(--accent);
            border-color: var(--accent);
            color: white;
        }
        
        .page-item.disabled .page-link {
            color: #6c757d;
        }
        
        .product-hover-actions {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 1rem;
            opacity: 0;
            transition: var(--transition);
            z-index: 2; 
        }
        
        .product-card:hover .product-hover-actions {
            opacity: 1;
        }
        
        .product-hover-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: var(--transition);
            border: none;
        }
        
        .product-hover-btn:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-3px);
        }
        
       
        .sort-dropdown-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 1.5rem;
            flex-shrink: 0; 
            align-items: center;
            
        }
        
        .d-flex.flex-column.flex-md-row.justify-content-between.align-items-center.mb-4 {
        gap: 1rem; 
        align-items: stretch;
    }
        .sort-dropdown {
            border: 1px solid #ddd;
            border-radius: 50px;
            padding: 0.5rem 1rem;
            background: white;
            color: var(--dark-text);
            font-weight: 500;
            height: 100%; 
            min-height: 45px;
            
        }
        
        .sort-dropdown:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(132, 80, 7, 0.1);
        }
        
        .quick-links {
            margin-bottom: 2rem;
        }
        
        .quick-links .sidebar-links a {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .whatsapp-chat {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
        }
        
        .whatsapp-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }
        
        .whatsapp-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.6);
        }
        
        .whatsapp-btn i {
            color: white;
            font-size: 36px;
        }
        
        .whatsapp-chat a {
    text-decoration: none !important;
    outline: none !important;
    border: none !important;
}

.whatsapp-btn:focus {
    outline: 2px solid rgba(255,255,255,0.5);
    outline-offset: 2px;
}

        .whatsapp-tooltip {
            position: absolute;
            right: 70px;
            background: white;
            padding: 8px 15px;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        
        .whatsapp-btn:hover + .whatsapp-tooltip {
            opacity: 1;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 12px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
        
        @media (max-width: 992px) {
            .shop-container {
                grid-template-columns: 1fr;
            }
            
            .shop-sidebar {
                position: static;
                margin-bottom: 2rem;
            }
            
            .sort-dropdown-container {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
@include('user.header')

<div class="shop-container">
    <aside class="shop-sidebar">
        <div class="quick-links">
            <h3 class="sidebar-title">Quick Links</h3>
            <ul class="sidebar-links">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.shop') }}" class="{{ !request('category_id') ? 'active' : '' }}">
                        <i class="fas fa-store"></i> Shop
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-section">
            <h3 class="sidebar-title">Categories</h3>
            <ul class="sidebar-links">
    <li>
        <a href="{{ route('user.shop', array_merge(request()->query(), ['category_id' => null])) }}" 
           class="{{ !request('category_id') ? 'active' : '' }}">
            All Products
        </a>
    </li>
    @foreach($categories as $category)
    <li>
        <a href="{{ route('user.shop', array_merge(request()->query(), ['category_id' => $category->id])) }}" 
           class="{{ request('category_id') == $category->id ? 'active' : '' }}">
            {{ $category->category_name }}
        </a>
    </li>
    @endforeach
</ul>
        </div>

        <div class="filter-section">
            <h4 class="filter-title"><i class="fas fa-filter"></i> Price Range</h4>
            <div class="price-slider-container">
            <form id="priceFilterForm">
    <input type="range" class="price-slider" id="priceRange" 
           min="0" max="10000" step="100" 
           value="{{ request('max_price', 10000) }}">
    <div class="d-flex justify-content-between mt-2">
        <span>Rs. 0</span>
        <span>Rs. <span id="priceValue">{{ number_format(request('max_price', 10000)) }}</span></span>
    </div>
    @if(request('category_id'))
        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
    @endif
    <input type="hidden" name="max_price" id="maxPriceInput" value="{{ request('max_price') }}">
    <button type="submit" class="btn btn-sm btn-primary mt-3 w-100">Apply Price Filter</button>
</form>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('user.shop') }}" class="btn btn-outline-secondary w-100">
                <i class="fas fa-times"></i> Clear All Filters
            </a>
        </div>
    </aside>
    
    <main class="shop-main">
       
<div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch mb-4">

    <div class="main-search-container mb-3 mb-md-0">
        <form action="{{ route('user.shop') }}" method="GET" id="searchForm" class="w-100">
            <input type="text" name="search" class="form-control search-input" 
                   placeholder="Search products..." value="{{ request('search') }}"
                   id="mainSearch">
            <button class="search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
            @if(request()->anyFilled(['category_id', 'max_price', 'sort']))
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                <input type="hidden" name="sort" value="{{ request('sort', 'newest') }}">
            @endif
        </form>
    </div>
    
  
    <div class="sort-dropdown-container">
        <form action="{{ route('user.shop') }}" method="GET" id="sortForm" class="h-100">
            <select name="sort" class="sort-dropdown h-100" onchange="this.form.submit()">
                <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
            </select>
            @if(request()->anyFilled(['category_id', 'max_price', 'search']))
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif
        </form>
    </div>
</div>
        
        @if($products->count() > 0)
        <div class="product-grid">
    @foreach($products as $product)
    <div class="product-card">
        <div class="product-img-container">
            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="product-img">
            @if($product->discount_price > 0)
                <span class="sale-badge">Sale</span>
            @endif
            
            <div class="product-hover-actions">
                <form action="{{ route('add.to.cart', $product->id) }}" method="POST" class="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="customization_data" value='{"color":"default","customText":"","textFont":"Arial"}' id="customization-data-{{ $product->id }}">
                    <button type="submit" class="product-hover-btn" title="Add to Cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </form>
                <a href="{{ route('product.details', $product->id) }}" class="product-hover-btn" title="View Details">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <h5 class="product-title">{{ $product->title }}</h5>
            <div class="price-container">
                @if($product->discount_price > 0)
                <span class="current-price">{{ number_format($product->discount_price) }} PKR</span>
                <span class="old-price">{{ number_format($product->price) }} PKR</span>
                @else
                <span class="current-price">{{ number_format($product->price) }} PKR</span>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
            
            <div class="pagination-container">
                @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator && $products->hasPages())
                    {{ $products->appends(request()->query())->links() }}
                @endif
            </div>
        @else
            <div class="no-products-found">
                <div class="no-products-icon">
                    <i class="fas fa-search fa-3x mb-3"></i>
                </div>
                <h3 class="no-products-title">No Products Found</h3>
                
                @if(request('search'))
                    <p>Your search for <strong>"{{ request('search') }}"</strong> didn't match any products.</p>
                @endif
                
                <div class="suggestions mt-3">
                    <p>Try these suggestions:</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success mr-2"></i> Check your spelling</li>
                        <li><i class="fas fa-check-circle text-success mr-2"></i> Try different keywords</li>
                        <li><i class="fas fa-check-circle text-success mr-2"></i> Remove some filters</li>
                    </ul>
                </div>
                
                <a href="{{ route('user.shop') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-undo mr-2"></i> Clear All Filters
                </a>
            </div>
        @endif
    </main>
</div>

@include('user.footer')

<div class="whatsapp-chat">
<a href="https://wa.me/03092936921?text=Hello%20Shopiko,%20I%20have%20a%20question%20about..."class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-whatsapp"></i>
    </a>
    <span class="whatsapp-tooltip">Chat with us</span>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        const priceSlider = $('#priceRange');
        const priceValue = $('#priceValue');
        
        priceSlider.val({{ request('max_price', 10000) }});
        priceSlider.on('input', function() {
            priceValue.text(parseInt($(this).val()).toLocaleString());
        });

        $('#priceFilterForm').on('submit', function(e) {
    e.preventDefault();
    const maxPrice = priceSlider.val();
    const categoryId = "{{ request('category_id') }}";
    let url = "{{ route('user.shop') }}?max_price=" + maxPrice;
    
    if(categoryId) {
        url += "&category_id=" + categoryId;
    }
    
    const search = "{{ request('search') }}";
    if(search) {
        url += "&search=" + encodeURIComponent(search);
    }
    
    const sort = "{{ request('sort') }}";
    if(sort) {
        url += "&sort=" + sort;
    }
    
    window.location.href = url;
});

        $('.product-hover-btn .fa-shopping-cart').closest('button').on('click', function(e) {
            e.preventDefault();
            const productId = $(this).closest('.product-card').find('a[href*="product.details"]').attr('href').split('/').pop();
            alert('Product added to cart!');
        });

        $('.add-to-cart-form').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const url = form.attr('action');
        
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Added to Cart',
                    text: 'Product has been added to your cart',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                
                updateCartCount();
            },
            error: function(xhr) {
                if (xhr.status === 401) {
                    window.location.href = "/login";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Could not add product to cart',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        });
    });
    
    function updateCartCount() {
        $.get("/cart/count", function(count) {
            $('.cart-count').text(count);
        });
    }
    });
</script>
</body>
</html>