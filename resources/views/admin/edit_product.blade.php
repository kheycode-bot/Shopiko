<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Edit Product</title>
    
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

    <style>
        :root {
            --dark-bg: #121212;
            --darker-bg: #0a0a0a;
            --card-bg: #1e1e1e;
            --text-primary: #e0e0e0;
            --text-secondary: #b0b0b0;
            --border-color: #333;
            --primary-color: #4e73df;
            --primary-hover: #3a5ec0;
            --input-bg: #2d2d2d;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-primary);
            overflow-x: hidden;
        }

        .page-body-wrapper {
            display: flex;
            min-height: calc(100vh - 60px);
            padding-top: 60px;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 60px;
            height: calc(100vh - 60px);
            width: 250px;
            background: var(--darker-bg);
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            z-index: 9;
            transition: all 0.3s ease;
            border-right: 1px solid var(--border-color);
        }

        .main-content-wrapper {
            flex: 1;
            margin-left: 150px;
            padding: 30px;
            transition: all 0.3s ease;
            background-color: var(--dark-bg);
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
        }

        .main-content-card {
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            background: var(--card-bg);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .form-header h3 {
            color: var(--text-primary);
            margin-bottom: 5px;
        }

        .form-group label {
            color: var(--text-primary);
            font-weight: 500;
            margin-bottom: 5px;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 8px 12px;
            height: auto;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .custom-file-label {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            padding: 8px 12px;
            height: auto;
        }

        .image-section {
            margin-top: 15px;
            padding: 15px;
            background-color: var(--darker-bg);
            border-radius: 5px;
            border: 1px solid var(--border-color);
        }
        
        .image-label {
            display: block;
            margin-bottom: 10px;
            color: var(--text-primary);
            font-weight: 500;
        }
        
        .current-image {
            max-width: 100%;
            max-height: 250px;
            border-radius: 4px;
            border: 1px solid var(--border-color);
            display: block;
            margin: 0 auto;
        }
        
        .image-preview-container {
            margin-top: 15px;
            display: none;
        }
        
        .image-preview {
            max-width: 100%;
            max-height: 250px;
            border-radius: 4px;
            border: 1px solid var(--border-color);
            display: block;
            margin: 0 auto;
        }

        .btn {
            padding: 8px 20px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
            height: 60px;
            background-color: var(--darker-bg) !important;
            border-bottom: 1px solid var(--border-color);
        }

        .form-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .text-danger {
            font-size: 13px;
        }

        .alert {
            border-radius: 6px;
            text-align: center;
        }

        .alert-success {
            background-color: #1a3e1a;
            border-color: #1a3e1a;
            color: #a0e0a0;
        }

        .alert-danger {
            background-color: #3e1a1a;
            border-color: #3e1a1a;
            color: #e0a0a0;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            
            .sidebar.sidebar-visible {
                transform: translateX(0);
            }
            
            .main-content-wrapper {
                margin-left: 0;
                padding: 20px;
            }
        }

        @media (max-width: 767px) {
            .main-content-wrapper {
                padding: 15px;
            }
            
            .form-container {
                max-width: 100%;
            }
            
            .row {
                margin-left: -5px;
                margin-right: -5px;
            }
            
            .col-md-6 {
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')

    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        @include('admin.sidebar')

        <div class="main-panel">
            <div class="content-wrapper main-content-wrapper">
                <div class="form-container">
                    <div class="card main-content-card">
                        <div class="card-body">
                            <div class="form-header">
                                <h3>Edit Product</h3>
                            </div>

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                                
                                <div class="form-group">
                                    <label for="title">Product Title</label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ $product->title }}" required>
                                    @error('title'))
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control" id="category_id" name="category_id" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>

                                    @error('category'))
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price (PKR)</label>
                                            <input type="number" step="0.01" class="form-control" id="price" 
                                                   name="price" value="{{ $product->price }}" required>
                                            @error('price'))
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount_price">Discount Price (PKR)</label>
                                            <input type="number" step="0.01" class="form-control" id="discount_price" 
                                                   name="discount_price" value="{{ $product->discount_price }}">
                                            @error('discount_price'))
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stock">Current Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" 
                                                   value="{{ $product->stock }}" required min="0">
                                            @error('stock')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="low_stock_threshold">Low Stock Threshold</label>
                                            <input type="number" class="form-control" id="low_stock_threshold" 
                                                   name="low_stock_threshold" value="{{ $product->low_stock_threshold }}" min="0">
                                            <small class="text-muted">Leave at 0 to disable low stock alerts</small>
                                            @error('low_stock_threshold')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="image-section">
                                        <span class="image-label">Current Image:</span>
                                        @if($product->image)
                                        @if(file_exists(public_path($product->image)))
                                        <img src="{{ asset($product->image) }}" 
                                        class="current-image" 
                                        alt="Current Product Image">
                                            @else
                                                <div class="text-muted">Image file not found on server</div>
                                        @endif
                                             @else
                                                <div class="text-muted">No image available</div>
                                        @endif
                                    </div>
                                    
                                    <div class="custom-file mt-3">
                                        <input type="file" class="custom-file-input" id="image" name="image" 
                                               accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp">
                                        <label class="custom-file-label" for="image">Choose new image file</label>
                                    </div>
                                    <small class="text-muted">Leave empty to keep current image. Allowed formats: JPEG, PNG, JPG, GIF, SVG, WEBP (Max 2MB)</small>
                                    @error('image'))
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    
                                    <div class="image-preview-container mt-3">
                                        <span class="image-label">New Image Preview:</span>
                                        <img id="imagePreview" class="image-preview" src="#" alt="Image Preview">
                                    </div>
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="mdi mdi-content-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('admin.show_product') }}" class="btn btn-secondary">
                                        <i class="mdi mdi-close"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = this.files[0];
            const label = document.querySelector('.custom-file-label');
            const previewContainer = document.querySelector('.image-preview-container');
            const preview = document.getElementById('imagePreview');
            
            if (file) {
                label.textContent = file.name;
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                label.textContent = 'Choose new image file';
                previewContainer.style.display = 'none';
            }
        });

        document.getElementById('discount_price').addEventListener('change', function() {
            const price = parseFloat(document.getElementById('price').value);
            const discountPrice = parseFloat(this.value);
            
            if (discountPrice && price && discountPrice >= price) {
                alert('Discount price must be less than regular price');
                this.value = '';
            }
        });
    </script>
</body>
</html>