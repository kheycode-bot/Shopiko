<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Products</title>
    
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
            margin-left: 120px;
            padding: 30px;
            transition: all 0.3s ease;
            background-color: var(--dark-bg);
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
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .form-header h3 {
            color: var(--text-primary);
        }

        .form-header p {
            color: var(--text-secondary);
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: var(--text-primary);
            background-color: var(--card-bg);
        }

        .table th {
            background-color: var(--darker-bg);
            border-color: var(--border-color);
            font-weight: 600;
            padding: 12px;
        }

        .table td {
            border-color: var(--border-color);
            padding: 12px;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .product-img {
            width: 80px;
            height: auto;
            border-radius: 4px;
            border: 1px solid var(--border-color);
        }

        .price-original {
            text-decoration: line-through;
            color: var(--text-secondary);
        }

        .price-discount {
            color: var(--danger-color);
            font-weight: 600;
        }

        .action-buttons .btn {
            padding: 0.375rem 0.75rem;
            margin: 0 2px;
        }

        .search-container {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-form {
            flex-grow: 1;
        }

        .search-input {
            width: 100%;
            background-color: var(--input-bg);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .alert {
            border-radius: 6px;
            text-align: center;
            background-color: #1a3e1a;
            border-color: #1a3e1a;
            color: #a0e0a0;
        }

        .alert-info {
            background-color: #1a3a3e;
            border-color: #1a3a3e;
            color: #a0e0e0;
        }

        .pagination {
            justify-content: center;
        }

        .page-item .page-link {
            background-color: var(--card-bg);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-item.disabled .page-link {
            background-color: var(--input-bg);
            color: var(--text-secondary);
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
            
            .search-container {
                flex-direction: column;
                align-items: stretch;
            }
            
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
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
                <div class="card main-content-card">
                    <div class="card-body">
                        <div class="form-header">
                            <h3 class="page-title">Products</h3>
                            <p class="text-muted">Manage your product inventory</p>
                        </div>
                        
                        <div class="search-container">
                            <form method="GET" action="{{ route('admin.search_product') }}" class="search-form">
                                <div class="input-group">
                                    <input type="text" name="search" 
                                           class="form-control form-control-lg search-input" 
                                           placeholder="Search products by name or category..." 
                                           value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="mdi mdi-magnify"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div>
                                <a href="{{ route('admin.add_product') }}" class="btn btn-success">
                                    <i class="mdi mdi-plus"></i> Add Product
                                </a>
                            </div>
                        </div>

                        @if(request()->has('search'))
                            <div class="alert alert-info mb-4">
                                Showing results for: "{{ request('search') }}"
                                <a href="{{ route('admin.show_product') }}" class="float-right text-white">
                                    <i class="mdi mdi-close"></i> Clear search
                                </a>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                        <img src="{{ asset($product->image) }}" 
                                                 class="product-img" 
                                                 alt="{{ $product->title }}">
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>
                                            @if($product->discount_price)
                                                <span class="price-discount">{{ number_format($product->discount_price, 2) }} PKR</span><br>
                                                <span class="price-original">{{ number_format($product->price, 2) }} PKR</span>
                                            @else
                                                {{ number_format($product->price, 2) }} PKR
                                            @endif
                                        </td>
                                        <td class="action-buttons">
                                            <a href="{{ route('admin.edit_product', $product->id) }}" 
                                               class="btn btn-info btn-sm" 
                                               title="Edit">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.delete_product', $product->id) }}" 
                                               class="btn btn-danger btn-sm" 
                                               title="Delete"
                                               onclick="return confirm('Are you sure you want to delete this product?')">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
            
            @include('admin.footer')
        </div>
    </div>

    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
</body>
</html>