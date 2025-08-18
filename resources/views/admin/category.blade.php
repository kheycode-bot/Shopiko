<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Category</title>
    
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

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 8px;
        }
        
        .form-control {
            border-radius: 6px;
            border: 1px solid var(--border-color);
            padding: 12px 15px;
            height: auto;
            background-color: var(--input-bg);
            color: var(--text-primary);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
            background-color: var(--input-bg);
            color: var(--text-primary);
        }

        select.form-control {
            background-color: var(--input-bg);
            color: var(--text-primary);
        }
        
        .btn-submit {
            padding: 12px 30px;
            font-weight: 500;
            letter-spacing: 0.5px;
            min-width: 180px;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-submit:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .btn-dark {
            background-color: #444;
            border-color: #444;
            color: var(--text-primary);
        }

        .btn-dark:hover {
            background-color: #555;
            border-color: #555;
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

        .text-danger {
            color: #ff6b6b !important;
        }

        .text-muted {
            color: #777 !important;
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

        .category-list {
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 15px;
        }

        .category-item {
            margin-bottom: 10px;
        }

        .category-item .form-control {
            color: var(--text-primary) !important;
            background-color: var(--card-bg) !important;
}

        .sidebar-collapsed .sidebar {
            width: 80px;
        }

        .sidebar-collapsed .main-content-wrapper {
            margin-left: 80px;
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
                <div class="container-fluid">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session()->get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card main-content-card">
                                <div class="card-body">
                                    <div class="form-header">
                                        <h3 class="page-title">Add Category</h3>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="category-list">
                                                <h4 class="mb-4">All Categories</h4>
                                                @foreach ($categories as $category)
                                                    <div class="category-item input-group">
                                                        <input 
                                                            type="text" 
                                                            class="form-control" 
                                                            value="{{ $category->category_name }}" 
                                                            readonly>
                                                        <div class="input-group-append">
    <form action="{{ route('admin.delete_category', $category->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">
            Delete
        </button>
    </form>
</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card main-content-card">
                                                <div class="card-body">
                                                    <h4 class="mb-4">Add New Category</h4>
                                                    <form action="{{ route('admin.add_category') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="category" class="form-label">Category Name</label>
                                                            <input 
                                                                type="text" 
                                                                name="category" 
                                                                class="form-control" 
                                                                id="category" 
                                                                placeholder="Enter Category Name..." 
                                                                required>
                                                        </div>
                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-submit">Submit</button>
                                                            <a class="btn btn-dark ml-2" href="{{ route('admin.category') }}">Cancel</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
</body>
</html>