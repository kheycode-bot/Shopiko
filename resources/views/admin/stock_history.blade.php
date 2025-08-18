<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stock History | Admin</title>
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
        
        .info-box {
            box-shadow: 0 0 1px rgba(0,0,0,0.1);
            border-radius: 0.25rem;
            margin-left: 180px;
        }
        .info-box-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.875rem;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .badge {
            font-size: 85%;
            padding: 0.35em 0.65em;
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
                        <h3 class="page-title">Stock History</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.inventory') }}">Inventory</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Stock History</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h4 class="card-title">Stock History: {{ $product->title }}</h4>
                                        <a href="{{ route('admin.inventory') }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-arrow-left"></i> Back to Inventory
                                        </a>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <div class="info-box bg-info">
                                                <span class="info-box-icon"><i class="fas fa-boxes"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Current Stock</span>
                                                    <span class="info-box-number">{{ $product->stock }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="info-box bg-warning">
                                                <span class="info-box-icon"><i class="fas fa-exclamation"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Low Stock Threshold</span>
                                                    <span class="info-box-number">{{ $product->low_stock_threshold ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Quantity</th>
                                                    <th>Previous Stock</th>
                                                    <th>New Stock</th>
                                                    <th>User</th>
                                                    <th>Notes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product->stockMovements as $movement)
                                                <tr>
                                                    <td>{{ $movement->created_at->format('Y-m-d H:i') }}</td>
                                                    <td>
                                                        @if($movement->movement_type === 'addition')
                                                            <span class="badge badge-success">Addition</span>
                                                        @elseif($movement->movement_type === 'deduction')
                                                            <span class="badge badge-danger">Deduction</span>
                                                        @else
                                                            <span class="badge badge-info">Correction</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $movement->quantity }}</td>
                                                    <td>{{ $movement->previous_stock }}</td>
                                                    <td>{{ $movement->new_stock }}</td>
                                                    <td>{{ $movement->user->name ?? 'System' }}</td>
                                                    <td>{{ $movement->notes ?? '-' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
</body>
</html>