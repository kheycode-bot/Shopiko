    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inventory Management | Admin</title>
        <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
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

            .content-wrapper {
                
                margin-left: 120px;
            
            }
            .table-white-text tbody td {
        color: white;
            }

            .table-responsive {
                overflow-x: auto;
                
            }
            .table-hover tbody tr:hover {
                background-color: rgba(235, 235, 235, 0);
            }
            .badge {
                font-size: 85%;
                padding: 0.35em 0.65em;
            }
            .table-warning {
                background-color: #fff3cd;
            }
            .table-info {
                background-color: #d1ecf1;
            }
            .alert ul {
                margin-bottom: 0;
                padding-left: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container-scroller">
            @include('admin.navbar')
            <div class="container-fluid page-body-wrapper">
                @include('admin.sidebar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">Inventory Management</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                <div class="card-body">
        @if(isset($lowStockProducts) && $lowStockProducts->count() > 0)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> Low Stock Alerts</h4>
            <ul>
                @foreach($lowStockProducts as $product)
                <li>
                    <a href="{{ route('admin.edit_product', $product->id) }}">
                        {{ $product->title }} (Stock: {{ $product->stock }}, Threshold: {{ $product->low_stock_threshold }})
                    </a>
                </li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(isset($overstockProducts) && $overstockProducts->count() > 0)
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <h4 class="alert-heading"><i class="fas fa-info-circle"></i> Overstock Alerts</h4>
            <ul>
                @foreach($overstockProducts as $product)
                <li>
                    <a href="{{ route('admin.edit_product', $product->id) }}">
                        {{ $product->title }} (Stock: {{ $product->stock }}, Expected: {{ $product->quantity }})
                    </a>
                </li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

                                        @if($overstockProducts->count() > 0)
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            <h4 class="alert-heading"><i class="fas fa-info-circle"></i> Overstock Alerts</h4>
                                            <ul>
                                                @foreach($overstockProducts as $product)
                                                <li>
                                                    <a href="{{ route('admin.edit_product', $product->id) }}">
                                                        {{ $product->title }} (Stock: {{ $product->stock }}, Expected: {{ $product->quantity }})
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif

                                        <div class="d-flex justify-content-between mb-3">
                                            <h4 class="card-title">Product Inventory</h4>
                                            <a href="{{ route('admin.show_product') }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-arrow-left"></i> Back to Products
                                            </a>
                                        </div>
                                        
                                        <div class="table-responsive">
        <table class="table table-bordered table-hover table-white-text">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Current Stock</th>
                    <th>Low Stock Threshold</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="{{ $product->checkLowStock() ? 'table-warning' : '' }} {{ $product->checkOverstock() ? 'table-info' : '' }}">
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->low_stock_threshold ?? 'N/A' }}</td>
                    <td>
                        @if($product->checkLowStock())
                            <span class="badge badge-warning">Low Stock</span>
                        @elseif($product->checkOverstock())
                            <span class="badge badge-info">Overstock</span>
                        @else
                            <span class="badge badge-success">Normal</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.stock.history', $product->id) }}" 
                        class="btn btn-sm btn-info" title="View History">
                            <i class="fas fa-history"></i>
                        </a>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" 
                                data-target="#adjustStockModal-{{ $product->id }}">
                            <i class="fas fa-edit"></i> Adjust
                        </button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($products as $product)
        <div class="modal fade" id="adjustStockModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="adjustStockModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="adjustStockModalLabel">Adjust Stock: {{ $product->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.update.stock', $product->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Current Stock: {{ $product->stock }}</label>
                            </div>
                            <div class="form-group">
                                <label for="movement_type">Adjustment Type</label>
                                <select class="form-control" name="movement_type" required>
                                    <option value="addition">Add to Stock</option>
                                    <option value="deduction">Remove from Stock</option>
                                    <option value="correction">Stock Correction</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="adjustment">Quantity</label>
                                <input type="number" class="form-control" name="adjustment" 
                                    required min="1" value="1">
                            </div>
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea class="form-control" name="notes" rows="3" placeholder="Optional notes about this adjustment"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Stock</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
        <script src="{{ asset('admin/assets/js/settings.js') }}"></script>
        <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    </body>
    </html>