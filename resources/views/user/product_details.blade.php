<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $product->title }} | Shopiko </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ $product->description ?? 'Shopiko product details' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="{{ $product->title }}">
    <meta property="og:description" content="{{ $product->description ?? 'Shopiko premium product' }}">
    <meta property="og:image" content="{{ $product->image_url }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&family=Poppins:wght@300;400;500;600&family=Montserrat:wght@400;500;600&family=Open+Sans:wght@400;600&family=Dancing+Script:wght@400;700&family=Great+Vibes&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        .product-detail-section {
            padding: 30px 0;
            background-color: #f9fafb;
        }
        
        .product-image-container {
            height: 800px;
            padding: 5px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(58, 70, 96, 0.05);
            overflow: hidden;
            position: relative;
        }
        
        .preview-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            border-radius: 12px;
        }
        
        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #845007;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .product-main-image {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            border-radius: 8px;
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }
        
        .product-main-image.zoomed {
            transform: scale(2);
            cursor: zoom-out;
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
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 12px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        .product-info-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(58, 70, 96, 0.05);
            padding: 25px;
            height: 100%;
        }
        
        .product-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #3a4660;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        
        .product-meta {
            margin-bottom: 20px;
            color: #6b7280;
            font-size: 0.95rem;
        }
        
        .product-meta a {
            color: #845007;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .price-container {
            margin-bottom: 25px;
        }
        
        .current-price {
            font-size: 28px;
            font-weight: 700;
            color: #3a4660;
        }
        
        .current-price::before {
            content: "Rs. ";
        }
        
        .original-price {
            text-decoration: line-through;
            color: #9ca3af;
            font-size: 18px;
            margin-left: 10px;
        }
        
        .original-price::before {
            content: "Rs. ";
        }
        
        .discount-badge {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .stock-status {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .stock-status .text-success {
            color: #28a745;
        }

        .stock-status .text-warning {
            color: #ffc107;
        }

        .stock-status .text-danger {
            color: #dc3545;
        }

        .stock-status i {
            margin-right: 5px;
        }
        
        .product-description {
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 25px;
        }
        
        .customization-section {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            background: white;
        }
        
        .customization-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: #3a4660;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 8px;
        }
        
        .customization-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: linear-gradient(45deg, #c9af98, #845007);
        }
        
        .option-title {
            font-weight: 600;
            color: #3a4660;
            margin-bottom: 10px;
            display: block;
        }
        
        .color-options {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }
        
        .color-option {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .color-option.selected {
            border-color: #3a4660;
            transform: scale(1.1);
        }
        
        .color-option.selected:after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            text-shadow: 0 0 3px rgba(0,0,0,0.5);
        }
        
        .custom-image-upload {
            border: 2px dashed #d1d5db;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 15px;
            background: #f9fafb;
            transition: all 0.3s ease;
        }
        
        .custom-image-upload:hover {
            border-color: #845007;
            background: #f5f5f5;
        }
        
        .custom-image-upload i {
            font-size: 32px;
            color: #9ca3af;
            margin-bottom: 8px;
        }
        
        .custom-image-preview {
            max-width: 100%;
            max-height: 150px;
            margin-top: 10px;
            border-radius: 8px;
            display: none;
        }
        
        .custom-text-input textarea {
            min-height: 90px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
        }
        
        .char-count {
            font-size: 12px;
            color: #9ca3af;
        }
        
        .font-options {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }
        
        .font-option {
            padding: 6px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s ease;
        }
        
        .font-option.selected {
            background: linear-gradient(45deg, #c9af98, #845007);
            color: white;
            border-color: transparent;
        }
        
        .font-arial { font-family: 'Arial', sans-serif; }
        .font-times { font-family: 'Times New Roman', serif; }
        .font-verdana { font-family: 'Verdana', sans-serif; }
        .font-roboto { font-family: 'Roboto', sans-serif; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        .font-opensans { font-family: 'Open Sans', sans-serif; }
        .font-dancing { font-family: 'Dancing Script', cursive; }
        .font-greatvibes { font-family: 'Great Vibes', cursive; }
        .font-pacifico { font-family: 'Pacifico', cursive; }
        
        .preview-area {
            background-color: #f9fafb;
            border-radius: 12px;
            min-height: 300px;
            padding: 20px;
            margin-top: 15px;
            border: 1px dashed #d1d5db;
            position: relative;
        }

        .product-preview-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: #f8f9fa;
            user-select: none;
            -webkit-user-select: none;
        }
        
        .product-base-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: filter 0.5s ease;
        }
        
        /* Updated draggable elements styles */
        .custom-image-container, .custom-text-container {
            will-change: transform;
            touch-action: none;
            position: absolute;
            left: 0;
            top: 0;
            transform: translate(calc(50% - 50%), calc(50% - 50%));
            z-index: 2;
            cursor: move;
            min-width: 50px;
            min-height: 50px;
            max-width: 150px;
            max-height: 150px;
            transition: transform 0.1s ease-out;
        }
        
        .custom-image-container {
            width: 100px;
            height: auto;
        }
        
        .custom-image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            pointer-events: none;
        }
        
        .custom-text-container {
            background-color: transparent;
            padding: 8px;
            border-radius: 4px;
            max-width: 80%;
            word-wrap: break-word;
        }
        
        .dragging {
            opacity: 0.9;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            transition: none !important;
            z-index: 100;
        }
        
        .position-controls {
            margin-top: 15px;
            padding: 10px;
            background: #f5f5f5;
            border-radius: 8px;
        }
        
        .control-group {
            margin-bottom: 10px;
        }
        
        .control-label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }
        
        .control-value {
            font-size: 12px;
            color: #888;
            margin-left: 5px;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .quantity-selector input {
            width: 60px;
            text-align: center;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 6px;
            margin: 0 8px;
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
        }

        .btn-outline-danger {
            background: linear-gradient(45deg, #3a4660, #2a3447);
            color: white;
        }

        .btn-outline-danger:hover {
            background: linear-gradient(45deg, #2a3447, #1a2337);
            color: white;
        }
        
        .add-to-cart-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 600;
            color: white;
            background: linear-gradient(45deg, #3a4660, #2a3447);
            border: none;
            border-radius: 50px;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .add-to-cart-btn:hover {
            background: linear-gradient(45deg, #2a3447, #1a2337);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        @media (max-width: 992px) {
            .product-image-container {
                height: 400px;
            }
        }
        
        @media (max-width: 768px) {
            .product-image-container {
                height: 350px;
            }
            
            .whatsapp-chat {
                bottom: 20px;
                right: 20px;
            }
            
            .whatsapp-btn {
                width: 50px;
                height: 50px;
            }
            
            .whatsapp-btn i {
                font-size: 28px;
            }
        }
        
        @media (max-width: 576px) {
            .product-image-container {
                height: 300px;
                padding: 0;
            }
            
            .product-info-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    @include('user.header')
    @include('user.mobile_header')
    
    <main class="main">
        <section class="product-detail-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="product-image-container">
                            <img src="{{ $product->image_url }}" 
                                 alt="{{ $product->title }}" 
                                 class="product-main-image img-fluid"
                                 id="product-main-image">
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="product-info-card">
                            <h1 class="product-title">{{ $product->title }}</h1>

                            <div class="product-meta">
                                <span class="me-3">Category:</span>
                                @if(!empty($product->category))
                                    @if(is_object($product->category))
                                        <a href="{{ route('user.shop', ['category_id' => $product->category->id]) }}">
                                            {{ $product->category->category_name ?? $product->category->name }}
                                        </a>
                                    @else
                                        <span>{{ $product->category }}</span>
                                    @endif
                                @else
                                    <span>Uncategorized</span>
                                @endif
                            </div>

                            <div class="price-container">
                                @if($product->discount_price > 0 && $product->price > 0)
                                    <span class="current-price">{{ number_format($product->discount_price) }}</span>
                                    <span class="original-price">{{ number_format($product->price) }}</span>
                                    <span class="discount-badge">
                                        Save {{ round(100 - ($product->discount_price / $product->price * 100)) }}%
                                    </span>
                                @else
                                    <span class="current-price">{{ number_format($product->price) }}</span>
                                @endif
                            </div>

                            <div class="stock-status mb-3">
                                @if($product->stock > 10)
                                    <span class="text-success"><i class="fas fa-check-circle"></i> In Stock</span>
                                @elseif($product->stock > 0)
                                    <span class="text-warning"><i class="fas fa-exclamation-circle"></i> Only {{ $product->stock }} left!</span>
                                @else
                                    <span class="text-danger"><i class="fas fa-times-circle"></i> Out of Stock</span>
                                @endif
                            </div>

                            <div class="product-description">
                                <p>Customized {{ $product->title }} on your own</p>
                            </div>

                            <div class="customization-section">
                                <h5 class="customization-title">Customize Your Product</h5>
                                
                                <div class="mb-3">
                                    <span class="option-title">Select Color</span>
                                    <div class="color-options">
                                        <div class="color-option selected" style="background-color: #FF0000;" data-color="Red"></div>
                                        <div class="color-option" style="background-color: #00FF00;" data-color="Green"></div>
                                        <div class="color-option" style="background-color: #0000FF;" data-color="Blue"></div>
                                        <div class="color-option" style="background-color: #FFFF00;" data-color="Yellow"></div>
                                        <div class="color-option" style="background-color: #FF00FF;" data-color="Magenta"></div>
                                        <div class="color-option" style="background-color: #00FFFF;" data-color="Cyan"></div>
                                        <div class="color-option" style="background-color: #000000;" data-color="Black"></div>
                                        <div class="color-option" style="background-color: #FFFFFF; border: 1px solid #ddd;" data-color="White"></div>
                                        <div class="color-option" style="background-color: #FFA500;" data-color="Orange"></div>
                                        <div class="color-option" style="background-color: #800080;" data-color="Purple"></div>
                                        <div class="color-option" style="background-color: #A52A2A;" data-color="Brown"></div>
                                        <div class="color-option" style="background-color: #FFC0CB;" data-color="Pink"></div>
                                        <div class="color-option" style="background-color: #808080;" data-color="Gray"></div>
                                        <div class="color-option" style="background-color: #008000;" data-color="Dark Green"></div>
                                        <div class="color-option" style="background-color: #000080;" data-color="Navy Blue"></div>
                                        <div class="color-option" style="background-color: #FF6347;" data-color="Tomato"></div>
                                        <div class="color-option" style="background-color: #40E0D0;" data-color="Turquoise"></div>
                                        <div class="color-option" style="background-color: #EE82EE;" data-color="Violet"></div>
                                        <div class="color-option" style="background-color: #F5DEB3;" data-color="Wheat"></div>
                                        <div class="color-option" style="background-color: #4682B4;" data-color="Steel Blue"></div>
                                    </div>
                                    <input type="hidden" name="selected_color" id="selected_color" value="Red">
                                </div>
                                
                                <div class="mb-3">
                                    <span class="option-title">Add Your Image</span>
                                    <div class="custom-image-upload" id="image-upload-area">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Click to upload your image</p>
                                        <p class="text-muted small">(JPG, PNG, max 5MB)</p>
                                        <img id="custom-image-preview" class="custom-image-preview">
                                    </div>
                                    <input type="file" id="image-upload-input" accept="image/*" style="display: none;">
                                    
                                    <div class="position-controls" id="image-position-controls" style="display: none;">
                                        <div class="control-group">
                                            <label class="control-label">Horizontal Position <span class="control-value" id="image-x-value">50%</span></label>
                                            <input type="range" id="image-x-slider" min="0" max="100" value="50" class="form-range">
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Vertical Position <span class="control-value" id="image-y-value">50%</span></label>
                                            <input type="range" id="image-y-slider" min="0" max="100" value="50" class="form-range">
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Size <span class="control-value" id="image-size-value">100px</span></label>
                                            <input type="range" id="image-size-slider" min="50" max="200" value="100" class="form-range">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="reset-image-position">Reset Position</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="clear-image">
                                    <i class="fas fa-trash-alt me-1"></i> Remove Image
                                </button>
                                
                                <div class="mb-3">
                                    <span class="option-title">Add Custom Text</span>
                                    <div class="custom-text-input">
                                        <textarea class="form-control" id="custom-text" placeholder="Enter text here (max 100 chars)" maxlength="100"></textarea>
                                        <div class="text-end char-count"><span id="char-count">0</span>/100</div>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <span class="option-title">Select Font</span>
                                            <div class="font-options">
                                                <div class="font-option font-arial selected" data-font="Arial">Arial</div>
                                                <div class="font-option font-times" data-font="Times New Roman">Times</div>
                                                <div class="font-option font-verdana" data-font="Verdana">Verdana</div>
                                                <div class="font-option font-roboto" data-font="Roboto">Roboto</div>
                                                <div class="font-option font-poppins" data-font="Poppins">Poppins</div>
                                                <div class="font-option font-montserrat" data-font="Montserrat">Montserrat</div>
                                                <div class="font-option font-opensans" data-font="Open Sans">Open Sans</div>
                                                <div class="font-option font-dancing" data-font="Dancing Script">Dancing</div>
                                                <div class="font-option font-greatvibes" data-font="Great Vibes">Great Vibes</div>
                                                <div class="font-option font-pacifico" data-font="Pacifico">Pacifico</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="option-title">Text Color</span>
                                            <div class="color-options">
                                                <div class="color-option selected" style="background-color: #000000;" data-text-color="Black"></div>
                                                <div class="color-option" style="background-color: #FFFFFF; border: 1px solid #ddd;" data-text-color="White"></div>
                                                <div class="color-option" style="background-color: #FF0000;" data-text-color="Red"></div>
                                                <div class="color-option" style="background-color: #0000FF;" data-text-color="Blue"></div>
                                                <div class="color-option" style="background-color: #008000;" data-text-color="Dark Green"></div>
                                                <div class="color-option" style="background-color: #800080;" data-text-color="Purple"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="position-controls" id="text-position-controls" style="display: none;">
                                        <div class="control-group">
                                            <label class="control-label">Horizontal Position <span class="control-value" id="text-x-value">50%</span></label>
                                            <input type="range" id="text-x-slider" min="0" max="100" value="50" class="form-range">
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Vertical Position <span class="control-value" id="text-y-value">50%</span></label>
                                            <input type="range" id="text-y-slider" min="0" max="100" value="50" class="form-range">
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Font Size <span class="control-value" id="text-size-value">16px</span></label>
                                            <input type="range" id="text-size-slider" min="10" max="36" value="16" class="form-range">
                                        </div>
                                        <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="reset-text-position">Reset Position</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-danger mt-2" id="clear-text">
                                    <i class="fas fa-trash-alt me-1"></i> Remove Text
                                </button>
                           
                            <div class="preview-area" id="customization-preview">
                                <div class="preview-loader" id="preview-loader">
                                    <div class="loader"></div>
                                </div>
                                <div class="product-preview-container">
                                    <div class="product-base" id="product-base">
                                        <img src="{{ $product->image_url }}" alt="Product Base" class="product-base-image" id="preview-product-image">
                                    </div>
                                    <div class="custom-image-container" id="custom-image-container"></div>
                                    <div class="custom-text-container" id="custom-text-container"></div>
                                </div>
                            </div>

                            <form action="{{ route('add.to.cart', $product->id) }}" method="POST" id="product-form">
                                @csrf
                                <input type="hidden" name="customization_data" id="customization_data">
                                
                                <div class="quantity-selector">
                                    <span class="option-title me-2">Quantity:</span>
                                    <button type="button" class="quantity-btn" id="decrement-qty">-</button>
                                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{ $product->stock ?? 100 }}">
                                    <button type="button" class="quantity-btn" id="increment-qty">+</button>
                                </div>
                                
                                <button type="submit" class="add-to-cart-btn mt-3">
                                    <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <section class="related-products-section">
            <div class="container">
                <div class="section-title">
                    <h2>You May Also Like</h2>
                </div>
                <div class="row">
                    @foreach($relatedProducts as $related)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="{{ route('product.details', $related->id) }}" class="text-decoration-none">
                            <div class="related-product-card">
                                <div class="related-product-img">
                                    <img src="{{ $related->image_url }}" alt="{{ $related->title }}">
                                </div>
                                <div class="related-product-body">
                                    <h5 class="related-product-title">{{ $related->title }}</h5>
                                    <div class="related-product-price">
                                        Rs. {{ number_format($related->discount_price ?: $related->price) }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </main>

    @include('user.footer')

    <div class="whatsapp-chat">
        <a href="https://wa.me/03092936921?text=Hello%20Shopiko,%20I%20have%20a%20question%20about..." class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-whatsapp"></i>
        </a>
        <span class="whatsapp-tooltip">Chat with us</span>
    </div>
    
    <script src="{{ asset('user/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script>
$(document).ready(function() {
    let customImage = null;
    let customText = null;
    let isDragging = false;
    let currentDragElement = null;
    let startX, startY, startTransformX, startTransformY;

    // Initialize loader and element positioning
    setTimeout(function() {
        hideLoader();
        initializeElementPositioning();
    }, 1000);

    // Initialize element positions
    function initializeElementPositioning() {
        // Set initial transform for image container if it exists
        if ($('#custom-image-container').length) {
            centerElement($('#custom-image-container'));
        }
        
        // Set initial transform for text container if it exists
        if ($('#custom-text-container').length) {
            centerElement($('#custom-text-container'));
        }
    }

    // Center an element within its parent
    function centerElement(element) {
        const parent = element.parent();
        const parentRect = parent[0].getBoundingClientRect();
        const elementRect = element[0].getBoundingClientRect();
        
        const centerX = (parentRect.width - elementRect.width) / 2;
        const centerY = (parentRect.height - elementRect.height) / 2;
        
        element.css('transform', `translate(${centerX}px, ${centerY}px)`);
    }

    // Product image zoom functionality
    $('#product-main-image').click(function() {
        $(this).toggleClass('zoomed');
    });

    // Image upload handling
    $('#image-upload-area').click(function() {
        $('#image-upload-input').click();
    });

    // Color selection
    $('.color-option').click(function() {
        showLoader();
        $(this).addClass('selected').siblings().removeClass('selected');
        const selectedColor = $(this).data('color');
        $('#selected_color').val(selectedColor);
        
        updateProductColor(selectedColor);
        
        setTimeout(hideLoader, 300);
    });

    // Update product color
    function updateProductColor(color) {
        const productImg = $('#preview-product-image');
        const colorHex = getColorHex(color);
        productImg.css('filter', `hue-rotate(${getHueRotation(colorHex)})`);
    }

    // Get hex value for color name
    function getColorHex(colorName) {
        const colors = {
            'Red': '#FF0000', 'Green': '#00FF00', 'Blue': '#0000FF',
            'Yellow': '#FFFF00', 'Magenta': '#FF00FF', 'Cyan': '#00FFFF',
            'Black': '#000000', 'White': '#FFFFFF', 'Orange': '#FFA500',
            'Purple': '#800080', 'Brown': '#A52A2A', 'Pink': '#FFC0CB',
            'Gray': '#808080', 'Dark Green': '#008000', 'Navy Blue': '#000080',
            'Tomato': '#FF6347', 'Turquoise': '#40E0D0', 'Violet': '#EE82EE',
            'Wheat': '#F5DEB3', 'Steel Blue': '#4682B4'
        };
        return colors[colorName] || '#FFFFFF';
    }

    // Calculate hue rotation for color filter
    function getHueRotation(hexColor) {
        const r = parseInt(hexColor.substr(1, 2), 16) / 255;
        const g = parseInt(hexColor.substr(3, 2), 16) / 255;
        const b = parseInt(hexColor.substr(5, 2), 16) / 255;
        
        const max = Math.max(r, g, b);
        const min = Math.min(r, g, b);
        let h;
        
        if (max === min) {
            h = 0;
        } else {
            const d = max - min;
            switch (max) {
                case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                case g: h = (b - r) / d + 2; break;
                case b: h = (r - g) / d + 4; break;
            }
            h /= 6;
        }
        
        return Math.round(h * 360) + 'deg';
    }

    // Handle image upload
    $('#image-upload-input').change(function(e) {
        if (e.target.files && e.target.files[0]) {
            if (e.target.files[0].size > 2 * 1024 * 1024) {
                Swal.fire({
                    icon: 'error',
                    title: 'File too large',
                    text: 'Please select an image smaller than 2MB',
                    confirmButtonText: 'OK'
                });
                return;
            }

            showLoader();
            const reader = new FileReader();
            reader.onload = function(event) {
                resizeImage(event.target.result, 800, 800, function(resizedImage) {
                    if (!customImage) {
                        customImage = $('<img>').attr('src', resizedImage).css({
                            'width': '100%',
                            'height': '100%',
                            'object-fit': 'contain'
                        });
                        $('#custom-image-container')
                            .empty()
                            .append(customImage)
                            .css({
                                'width': '100px',
                                'height': 'auto'
                            })
                            .show();
                            
                        // Initialize position after image loads
                        customImage.on('load', function() {
                            resetImagePosition();
                            initDraggable('#custom-image-container');
                            $('#image-position-controls').show();
                            hideLoader();
                        });
                    } else {
                        customImage.attr('src', resizedImage);
                        hideLoader();
                    }
                });
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Resize uploaded image
    function resizeImage(src, maxWidth, maxHeight, callback) {
        const img = new Image();
        img.onload = function() {
            let width = img.width;
            let height = img.height;

            if (width > maxWidth) {
                height = Math.round((height * maxWidth) / width);
                width = maxWidth;
            }

            if (height > maxHeight) {
                width = Math.round((width * maxHeight) / height);
                height = maxHeight;
            }

            const canvas = document.createElement('canvas');
            canvas.width = width;
            canvas.height = height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0, width, height);
            
            callback(canvas.toDataURL('image/jpeg', 0.8));
        };
        img.src = src;
    }

    // Clear uploaded image
    $('#clear-image').click(function() {
        $('#custom-image-container').hide().empty();
        $('#image-position-controls').hide();
        customImage = null;
        $('#image-upload-input').val('');
    });

    // Handle custom text input
    $('#custom-text').on('input', function() {
        showLoader();
        $('#char-count').text($(this).val().length);
        
        setTimeout(function() {
            if ($(this).val()) {
                if (!customText) {
                    customText = $('<div>').addClass('custom-text').text($(this).val());
                    $('#custom-text-container')
                        .empty()
                        .append(customText)
                        .show();
                        
                    resetTextPosition();
                    initDraggable('#custom-text-container');
                    $('#text-position-controls').show();
                    updateTextStyle();
                } else {
                    customText.text($(this).val());
                }
            } else {
                $('#custom-text-container').hide();
                $('#text-position-controls').hide();
                customText = null;
            }
            hideLoader();
        }.bind(this), 300);
    });

    // Clear custom text
    $('#clear-text').click(function() {
        $('#custom-text-container').hide().empty();
        $('#text-position-controls').hide();
        $('#custom-text').val('');
        $('#char-count').text('0');
        customText = null;
    });

    // Font selection
    $('.font-option').click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
        updateTextStyle();
    });

    // Text color selection
    $('.color-options .color-option[data-text-color]').click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
        updateTextStyle();
    });

    // Update text styling
    function updateTextStyle() {
        if (!customText) return;
        
        const font = $('.font-option.selected').data('font');
        const textColor = $('.color-options .color-option.selected[data-text-color]').data('text-color');
        
        customText.css({
            'font-family': font,
            'color': textColor === 'White' ? '#ffffff' : 
                    textColor === 'Black' ? '#000000' : textColor,
            'font-size': $('#text-size-slider').val() + 'px'
        });
    }

    // Slider controls
    $('#image-x-slider, #image-y-slider, #image-size-slider').on('input', function() {
        updateElementPosition(this);
    });

    $('#text-x-slider, #text-y-slider, #text-size-slider').on('input', function() {
        updateElementPosition(this);
    });

    // Update element position based on slider
    function updateElementPosition(slider) {
        const sliderId = $(slider).attr('id');
        const type = sliderId.split('-')[0]; 
        const prop = sliderId.split('-')[1];  
        const value = $(slider).val();
        
        $(`#${type}-${prop}-value`).text(value + (prop === 'size' ? 'px' : '%'));
        
        const container = $(`#custom-${type}-container`);
        const isImage = type === 'image';
        const parent = container.parent();
        const parentRect = parent[0].getBoundingClientRect();
        
        if (prop === 'x' || prop === 'y') {
            // Get current transform
            const transform = container.css('transform');
            let matrix = [1, 0, 0, 1, 0, 0];
            
            if (transform && transform !== 'none') {
                const match = transform.match(/^matrix\((.+)\)$/);
                if (match) {
                    matrix = match[1].split(', ').map(parseFloat);
                }
            }
            
            // Update position based on slider
            if (prop === 'x') {
                matrix[4] = (value / 100) * parentRect.width;
            } else {
                matrix[5] = (value / 100) * parentRect.height;
            }
            
            container.css('transform', `matrix(${matrix.join(', ')})`);
        } else if (prop === 'size') {
            if (isImage) {
                container.css({
                    'width': value + 'px',
                    'height': 'auto'
                });
            } else {
                container.find('.custom-text').css('font-size', value + 'px');
            }
        }
    }

    $('#reset-image-position').click(function() {
        resetImagePosition();
    });

    $('#reset-text-position').click(function() {
        resetTextPosition();
    });

    function resetImagePosition() {
        const container = $('#custom-image-container');
        const parent = container.parent();
        const parentRect = parent[0].getBoundingClientRect();
        const containerRect = container[0].getBoundingClientRect();
        
        const centerX = (parentRect.width - containerRect.width) / 2;
        const centerY = (parentRect.height - containerRect.height) / 2;
        
        container.css('transform', `translate(${centerX}px, ${centerY}px)`);
        
        // Update sliders
        $('#image-x-slider').val(50);
        $('#image-y-slider').val(50);
        $('#image-size-slider').val(100);
        $('#image-x-value').text('50%');
        $('#image-y-value').text('50%');
        $('#image-size-value').text('100px');
    }

    function resetTextPosition() {
        const container = $('#custom-text-container');
        const parent = container.parent();
        const parentRect = parent[0].getBoundingClientRect();
        const containerRect = container[0].getBoundingClientRect();
        
        const centerX = (parentRect.width - containerRect.width) / 2;
        const centerY = (parentRect.height - containerRect.height) / 2;
        
        container.css('transform', `translate(${centerX}px, ${centerY}px)`);
        
        // Update sliders
        $('#text-x-slider').val(50);
        $('#text-y-slider').val(50);
        $('#text-size-slider').val(16);
        $('#text-x-value').text('50%');
        $('#text-y-value').text('50%');
        $('#text-size-value').text('16px');
        
        if (customText) {
            customText.css('font-size', '16px');
        }
    }

    function initDraggable(selector) {
        const element = $(selector);
        
        element.on('mousedown touchstart', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            isDragging = true;
            currentDragElement = $(this);
            
            const transform = currentDragElement.css('transform');
            let matrix = [1, 0, 0, 1, 0, 0];
            
            if (transform && transform !== 'none') {
                const match = transform.match(/^matrix\((.+)\)$/);
                if (match) {
                    matrix = match[1].split(', ').map(parseFloat);
                }
            }
            
            startTransformX = matrix[4];
            startTransformY = matrix[5];
            
            const event = e.originalEvent.touches ? e.originalEvent.touches[0] : e;
            startX = event.clientX;
            startY = event.clientY;
            
            currentDragElement.css({
                'transition': 'none',
                'z-index': '100'
            }).addClass('dragging');
        });

        $(document).on('mousemove touchmove', function(e) {
            if (!isDragging || !currentDragElement) return;
            
            const container = currentDragElement.parent();
            const containerRect = container[0].getBoundingClientRect();
            
            const event = e.originalEvent.touches ? e.originalEvent.touches[0] : e;
            const currentX = event.clientX;
            const currentY = event.clientY;
            
            const newX = startTransformX + (currentX - startX);
            const newY = startTransformY + (currentY - startY);
            
            currentDragElement.css('transform', `translate(${newX}px, ${newY}px)`);
            
            const percentX = Math.round((newX / containerRect.width) * 100);
            const percentY = Math.round((newY / containerRect.height) * 100);
            
            if (currentDragElement.is('#custom-image-container')) {
                $('#image-x-slider').val(percentX);
                $('#image-y-slider').val(percentY);
                $('#image-x-value').text(percentX + '%');
                $('#image-y-value').text(percentY + '%');
            } else {
                $('#text-x-slider').val(percentX);
                $('#text-y-slider').val(percentY);
                $('#text-x-value').text(percentX + '%');
                $('#text-y-value').text(percentY + '%');
            }
        });

        $(document).on('mouseup touchend', function() {
            if (!isDragging) return;
            
            isDragging = false;
            if (currentDragElement) {
                currentDragElement.css({
                    'transition': 'transform 0.2s ease-out',
                    'z-index': ''
                }).removeClass('dragging');
            }
            currentDragElement = null;
        });
    }

    $('#increment-qty').click(function() {
        const qtyInput = $('#quantity');
        let qty = parseInt(qtyInput.val());
        const maxQty = parseInt(qtyInput.attr('max')) || 100;
        if (qty < maxQty) {
            qtyInput.val(qty + 1);
        }
    });

    $('#decrement-qty').click(function() {
        const qtyInput = $('#quantity');
        let qty = parseInt(qtyInput.val());
        if (qty > 1) {
            qtyInput.val(qty - 1);
        }
    });

    $('#product-form').submit(function(e) {
        e.preventDefault();
        
        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');

        const customizationData = {
            color: $('#selected_color').val(),
            customImage: $('#custom-image-container img').attr('src') || null,
            customText: $('#custom-text').val() || null,
            textFont: $('.font-option.selected').data('font'),
            textColor: $('.color-options .color-option.selected[data-text-color]').data('text-color'),
            imagePosition: {
                x: $('#image-x-slider').val(),
                y: $('#image-y-slider').val(),
                size: $('#image-size-slider').val()
            },
            textPosition: {
                x: $('#text-x-slider').val(),
                y: $('#text-y-slider').val(),
                size: $('#text-size-slider').val()
            }
        };
        
        $('#customization_data').val(JSON.stringify(customizationData));
        
        generateExactPreview()
            .then(previewImage => {
                if (!$('#preview_image_data').length) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'preview_image',
                        id: 'preview_image_data',
                        value: previewImage
                    }).appendTo(form);
                } else {
                    $('#preview_image_data').val(previewImage);
                }
                
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success && response.redirect) {
                            window.location.href = response.redirect;
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Failed to add product to cart',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON?.message || 'Failed to add product to cart',
                            confirmButtonText: 'OK'
                        });
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i> Add to Cart');
                    }
                });
            })
            .catch(error => {
                console.error('Preview generation failed:', error);
                submitBtn.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i> Add to Cart');
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to generate product preview. Please try again.',
                    confirmButtonText: 'OK'
                });
            });
    });

    function generateExactPreview() {
        return new Promise((resolve, reject) => {
            try {
                const container = $('.product-preview-container');
                const canvas = document.createElement('canvas');
                
                canvas.width = container.width();
                canvas.height = container.height();
                const ctx = canvas.getContext('2d');

                const productImg = new Image();
                productImg.crossOrigin = 'Anonymous';
                productImg.src = $('#preview-product-image').attr('src');
                
                productImg.onload = function() {
                    ctx.filter = $('#preview-product-image').css('filter');
                    ctx.drawImage(productImg, 0, 0, canvas.width, canvas.height);
                    ctx.filter = 'none';
                    
                    const customImgContainer = $('#custom-image-container');
                    if (customImgContainer.is(':visible') && customImgContainer.find('img').length) {
                        const customImg = new Image();
                        customImg.src = customImgContainer.find('img').attr('src');
                        customImg.onload = function() {
                            const pos = customImgContainer.position();
                            const width = customImgContainer.width();
                            const height = customImgContainer.height();
                            
                            ctx.drawImage(customImg, pos.left, pos.top, width, height);
                            
                            drawCustomText();
                        };
                    } else {
                        drawCustomText();
                    }
                    
                    function drawCustomText() {
                        const textContainer = $('#custom-text-container');
                        if (textContainer.is(':visible') && textContainer.text().trim()) {
                            const text = textContainer.text();
                            const pos = textContainer.position();
                            const fontSize = parseInt(textContainer.css('font-size'));
                            const fontFamily = textContainer.css('font-family');
                            const color = textContainer.css('color');
                            
                            ctx.font = `${fontSize}px ${fontFamily}`;
                            ctx.fillStyle = color;
                            ctx.textAlign = 'left';
                            ctx.textBaseline = 'top';
                            ctx.fillText(text, pos.left, pos.top);
                        }
                        
                        canvas.toBlob(blob => {
                            const reader = new FileReader();
                            reader.onload = () => resolve(reader.result);
                            reader.readAsDataURL(blob);
                        }, 'image/png', 1.0);
                    }
                };
                
                productImg.onerror = function() {
                    reject(new Error('Failed to load product image'));
                };
            } catch (e) {
                reject(new Error('Failed to generate preview: ' + e.message));
            }
        });
    }

    function showLoader() {
        $('#preview-loader').stop().fadeIn(200);
    }
    
   
    function hideLoader() {
        $('#preview-loader').stop().fadeOut(200);
    }
});
</script>
</body>
</html>