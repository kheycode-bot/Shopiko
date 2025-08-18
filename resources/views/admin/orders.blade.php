<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Orders</title>
    
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
            --info-color: #17a2b8;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --secondary-color: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-primary);
            overflow-x: hidden;
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
        .page-body-wrapper {
            display: flex;
            min-height: calc(100vh - 60px);
            padding-top: 60px;
        }

        .main-panel {
            flex: 1;
            margin-left: 250px;
            transition: all 0.3s;
        }

        @media (max-width: 991px) {
            .main-panel {
                margin-left: 0;
            }
        }

        .content-wrapper {
            padding: 1.5rem;
        }

        .main-content-card {
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            background: var(--card-bg);
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .form-header h3 {
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--text-secondary);
            margin-bottom: 0;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: var(--text-primary);
            background-color: var(--card-bg);
            border-collapse: collapse;
        }

        .table th {
            background-color: var(--darker-bg);
            border-color: var(--border-color);
            font-weight: 600;
            padding: 12px 15px;
            text-align: left;
            position: sticky;
            top: 0;
        }

        .table td {
            border-color: var(--border-color);
            padding: 12px 15px;
            vertical-align: top;
            border-bottom: 1px solid var(--border-color);
        }

        .table tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .product-image {
            max-width: 80px;
            max-height: 80px;
            border-radius: 4px;
            border: 1px solid var(--border-color);
        }

        .color-display {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 5px;
            vertical-align: middle;
            border: 1px solid var(--border-color);
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-success {
            background-color: var(--success-color);
            color: white;
        }

        .badge-warning {
            background-color: var(--warning-color);
            color: #212529;
        }

        .badge-info {
            background-color: var(--info-color);
            color: white;
        }

        .badge-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .badge-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .badge-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-group .btn-sm {
            padding: 0.375rem 0.5rem;
            margin: 0 2px;
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
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

        .btn-info {
            background-color: var(--info-color);
            border-color: var(--info-color);
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .customization-preview {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
            padding: 10px;
            background-color: rgba(0,0,0,0.2);
            border-radius: 6px;
            border-left: 3px solid var(--primary-color);
        }

        .image-container {
            position: relative;
            display: inline-block;
            overflow: hidden;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        .product-image {
            display: block;
            transition: transform 0.3s ease;
            max-width: 80px;
            max-height: 80px;
            border-radius: 4px;
            border: 1px solid var(--border-color);
        }

        .image-container:hover .product-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-overlay a {
            z-index: 10;
            text-decoration: none;
        }

        .customization-detail {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .customization-label {
            font-weight: 500;
            color: var(--primary-color);
            min-width: 80px;
        }

        .customization-value {
            flex: 1;
        }

        .search-form {
            margin-bottom: 1.5rem;
        }

        .search-input {
            background-color: var(--input-bg);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .alert {
            border-radius: 6px;
            background-color: #1a3e1a;
            border-color: #1a3e1a;
            color: #a0e0a0;
        }

        .alert-info {
            background-color: #1a3a3e;
            border-color: #1a3a3e;
            color: #a0e0e0;
        }

        .alert-success {
            background-color: #1a3e1a;
            border-color: #1a3e1a;
            color: #a0e0a0;
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
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

        .modal-content {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
        }

        .detail-group {
            margin-bottom: 10px;
        }

        .detail-label {
            font-weight: 600;
            color: var(--primary-color);
            display: inline-block;
            min-width: 120px;
        }

        .detail-value {
            display: inline-block;
        }

        @media (max-width: 768px) {
            .table thead {
                display: none;
            }
            
            .table tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid var(--border-color);
                border-radius: 5px;
            }
            
            .table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 8px 10px;
                border-bottom: 1px solid var(--border-color);
            }
            
            .table td::before {
                content: attr(data-label);
                font-weight: 600;
                margin-right: 15px;
                color: var(--primary-color);
            }
            
            .table td:last-child {
                border-bottom: none;
            }
            
            .content-wrapper {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    @include('admin.navbar')
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="card main-content-card">
                    <div class="card-body">
                        <div class="form-header">
                            <h3 class="page-title">Order Management</h3>
                            <p class="text-muted">View and manage customer orders</p>
                        </div>
                        
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session()->get('message') }}
                                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('SearchOrder') }}" method="GET" class="mb-4 search-form">
                            <div class="input-group">
                                <input type="text" name="search" 
                                       class="form-control search-input" 
                                       placeholder="Search by Tracking ID, Customer Name or Email" 
                                       value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="mdi mdi-magnify"></i> Search
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if(request()->has('search'))
                            <div class="alert alert-info mb-4">
                                Showing results for: "{{ request('search') }}"
                                <a href="{{ route('admin.orders') }}" class="float-right text-white">
                                    <i class="mdi mdi-close"></i> Clear search
                                </a>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tracking ID</th>
                                        <th>Customer</th>
                                        <th>Contact</th>
                                        <th>Total</th>
                                        <th>Products</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($orders->count() > 0)
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->tracking_id ?? 'ORD-' . $order->id }}</td>
                                                <td>
                                                    <strong>{{ $order->name }}</strong>
                                                </td>
                                                <td>
                                                    {{ $order->email }}<br>
                                                    <small>{{ $order->phone }}</small>
                                                </td>
                                           <td>
PKR {{ number_format($order->total_price, 2) }}
</td>
                                                <td>
                                                <div class="product-info" style="position: relative;">
    @if($order->preview_image)
        <div class="image-container" style="position: relative; display: inline-block;">
            <img src="{{ asset($order->preview_image) }}" 
                 class="product-image"
                 alt="Customized Product Preview"
                 style="display: block;">
            <div class="image-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); opacity: 0; transition: opacity 0.3s; display: flex; align-items: center; justify-content: center;">
                <a href="{{ asset($order->preview_image) }}" 
                   download="custom-product-{{ $order->id }}.png" 
                   class="btn btn-sm btn-primary" 
                   style="color: white; z-index: 10;">
                    <i class="mdi mdi-download"></i> Download
                </a>
            </div>
        </div>
    @elseif($order->image)
        <img src="{{ asset('products_images/' . $order->image) }}" 
             class="product-image"
             alt="{{ $order->product_title }}">
    @endif
</div>
                                                        
                                                        <div class="product-details">
                                                            <strong>{{ $order->product_title }}</strong> (×{{ $order->quantity }})
                                                            
                                                            @if($order->color)
                                                                <div class="color-display" style="background-color: {{ $order->color_hex }}"></div>
                                                                <small>{{ ucfirst($order->color) }}</small>
                                                            @endif
                                                        </div>
                                                        
                                                        @if($order->customization_data)
                                                            <div class="customization-preview mt-2">
                                                                @php
                                                                    $customization = json_decode($order->customization_data, true);
                                                                @endphp
                                                                
                                                                @if($customization)
                                                                    @if(isset($customization['color']))
                                                                        <div class="customization-detail">
                                                                            <span class="customization-label">Color:</span>
                                                                            <span class="customization-value">
                                                                                <span class="color-display" style="background-color: {{ $customization['color'] }}"></span>
                                                                                {{ ucfirst($customization['color']) }}
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                    
                                                                    @if(isset($customization['customText']))
                                                                        <div class="customization-detail">
                                                                            <span class="customization-label">Text:</span>
                                                                            <span class="customization-value">"{{ $customization['customText'] }}"</span>
                                                                        </div>
                                                                        
                                                                        @if(isset($customization['textFont']))
                                                                            <div class="customization-detail">
                                                                                <span class="customization-label">Font:</span>
                                                                                <span class="customization-value">{{ $customization['textFont'] }}</span>
                                                                            </div>
                                                                        @endif
                                                                        
                                                                        @if(isset($customization['textColor']))
                                                                            <div class="customization-detail">
                                                                                <span class="customization-label">Text Color:</span>
                                                                                <span class="customization-value">
                                                                                    <span class="color-display" style="background-color: {{ $customization['textColor'] }}"></span>
                                                                                    {{ ucfirst($customization['textColor']) }}
                                                                                </span>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $order->created_at->format('M d, Y') }}<br>
                                                    <small>{{ $order->created_at->format('H:i A') }}</small>
                                                </td>
                                                <td>
    <span class="badge 
        @if($order->delivery_status == 'delivered') badge-success
        @elseif($order->delivery_status == 'pending') badge-warning
        @elseif($order->delivery_status == 'processing') badge-info
        @elseif($order->delivery_status == 'cancelled') badge-danger
        @elseif($order->delivery_status == 'declined') badge-secondary
        @elseif($order->delivery_status == 'shipped') badge-primary
        @endif">
        {{ ucfirst($order->delivery_status) }}
    </span>
</td>
<td>
    <div class="btn-group">
        <a href="{{ route('order.printBill', $order->id) }}" 
           class="btn btn-info btn-sm"
           title="Print Invoice">
            <i class="mdi mdi-file-document"></i>
        </a>
        
        <form action="{{ route('admin.approveOrder', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success btn-sm" title="Approve Order">
                <i class="mdi mdi-check"></i>
            </button>
        </form>
        
        <form action="{{ route('admin.declineOrder', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-secondary btn-sm" title="Decline Order">
                <i class="mdi mdi-close"></i>
            </button>
        </form>
        
        <form action="{{ route('admin.deliverOrder', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary btn-sm" title="Mark as Delivered">
                <i class="mdi mdi-truck-delivery"></i>
            </button>
        </form>
        
        <form action="{{ route('admin.deleteOrder', $order->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" 
                    title="Delete Order"
                    onclick="return confirm('Are you sure you want to delete this order?')">
                <i class="mdi mdi-delete"></i>
            </button>
        </form>
    </div>
</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center py-4">No orders found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                        @if($orders instanceof \Illuminate\Pagination\LengthAwarePaginator && $orders->count() > 0)
                            <div class="d-flex justify-content-center mt-4">
                                {{ $orders->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            @include('admin.footer')
        </div>
    </div>

    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customized Product Preview</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalPreviewImage" src="" alt="Full Preview" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details - <span id="orderTrackingId"></span></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Customer Information</h6>
                            <div class="detail-group">
                                <span class="detail-label">Name:</span>
                                <span id="customerName" class="detail-value"></span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Email:</span>
                                <span id="customerEmail" class="detail-value"></span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Phone:</span>
                                <span id="customerPhone" class="detail-value"></span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Address:</span>
                                <span id="customerAddress" class="detail-value"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Order Information</h6>
                            <div class="detail-group">
                                <span class="detail-label">Date:</span>
                                <span id="orderDate" class="detail-value"></span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Status:</span>
                                <span id="orderStatus" class="detail-value"></span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Payment:</span>
                                <span id="orderPayment" class="detail-value"></span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Total:</span>
                                <span id="orderTotal" class="detail-value"></span>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4" style="border-color: var(--border-color);">
                    
                    <h6>Product Details</h6>
                    <div id="productDetails"></div>
                    
                    <div id="customizationDetails" class="mt-4"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    
    <script>
        $('#previewModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var imageUrl = button.data('image');
            var modal = $(this);
            modal.find('#modalPreviewImage').attr('src', imageUrl);
        });

        $('#orderDetailsModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var order = JSON.parse(button.data('order'));
            var customization = button.data('customization');
            var modal = $(this);
            
            modal.find('#orderTrackingId').text(order.tracking_id || 'ORD-' + order.id);
            modal.find('#customerName').text(order.name);
            modal.find('#customerEmail').text(order.email);
            modal.find('#customerPhone').text(order.phone || 'N/A');
            modal.find('#customerAddress').text(order.address || 'N/A');
            modal.find('#orderDate').text(new Date(order.created_at).toLocaleString());
            modal.find('#orderStatus').html('<span class="badge ' + 
                (order.delivery_status == 'delivered' ? 'badge-success' : 
                 order.delivery_status == 'pending' ? 'badge-warning' : 
                 order.delivery_status == 'processing' ? 'badge-info' : 'badge-danger') + '">' + 
                order.delivery_status.charAt(0).toUpperCase() + order.delivery_status.slice(1) + '</span>');
            modal.find('#orderPayment').html('<span class="badge ' + 
                (order.payment_status == 'paid' ? 'badge-success' : 'badge-warning') + '">' + 
                order.payment_status.replace(/_/g, ' ').charAt(0).toUpperCase() + 
                order.payment_status.replace(/_/g, ' ').slice(1) + '</span>');
            modal.find('#orderTotal').text('PKR ' + parseFloat(order.price).toFixed(2));
            
            var productHtml = `
                <div class="product-detail-card" style="background-color: var(--input-bg); padding: 15px; border-radius: 6px;">
                    <div class="row">
                        <div class="col-md-3">
                            ${order.preview_image ? 
                                `<img src="{{ asset('storage') }}/${order.preview_image}" alt="Product" style="max-width: 100%; border-radius: 4px;">` : 
                                `<img src="{{ asset('products_images') }}/${order.image}" alt="Product" style="max-width: 100%; border-radius: 4px;">`}
                        </div>
                        <div class="col-md-9">
                            <h5>${order.product_title}</h5>
                            <div class="detail-group">
                                <span class="detail-label">Quantity:</span>
                                <span>${order.quantity}</span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Unit Price:</span>
                                <span>PKR ${parseFloat(order.price / order.quantity).toFixed(2)}</span>
                            </div>
                            <div class="detail-group">
                                <span class="detail-label">Total:</span>
                                <span>PKR ${parseFloat(order.price).toFixed(2)}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            modal.find('#productDetails').html(productHtml);
            
            if (customization) {
                try {
                    var customData = JSON.parse(customization);
                    var customHtml = `<h6>Customization Details</h6><div class="customization-details-card" style="background-color: var(--input-bg); padding: 15px; border-radius: 6px;">`;
                    
                    if (customData.color) {
                        customHtml += `
                            <div class="detail-group">
                                <span class="detail-label">Product Color:</span>
                                <span>
                                    <span class="color-display" style="background-color: ${customData.color};"></span>
                                    ${customData.color.charAt(0).toUpperCase() + customData.color.slice(1)}
                                </span>
                            </div>
                        `;
                    }
                    
                    if (customData.customText) {
                        customHtml += `
                            <div class="detail-group">
                                <span class="detail-label">Custom Text:</span>
                                <span>"${customData.customText}"</span>
                            </div>
                        `;
                        
                        if (customData.textFont) {
                            customHtml += `
                                <div class="detail-group">
                                    <span class="detail-label">Font:</span>
                                    <span>${customData.textFont}</span>
                                </div>
                            `;
                        }
                        
                        if (customData.textColor) {
                            customHtml += `
                                <div class="detail-group">
                                    <span class="detail-label">Text Color:</span>
                                    <span>
                                        <span class="color-display" style="background-color: ${customData.textColor};"></span>
                                        ${customData.textColor.charAt(0).toUpperCase() + customData.textColor.slice(1)}
                                    </span>
                                </div>
                            `;
                        }
                    }
                    
                    if (order.preview_image) {
                        customHtml += `
                            <div class="detail-group">
                                <span class="detail-label">Preview:</span>
                                <div class="mt-2">
                                    <img src="{{ asset('storage') }}/${order.preview_image}" 
                                         alt="Custom Preview" 
                                         style="max-width: 200px; border-radius: 4px; border: 1px solid var(--border-color);">
                                </div>
                            </div>
                        `;
                    }
                    
                    customHtml += `</div>`;
                    modal.find('#customizationDetails').html(customHtml);
                } catch (e) {
                    modal.find('#customizationDetails').html('<p>No customization details available</p>');
                }
            } else {
                modal.find('#customizationDetails').html('<p>No customization details available</p>');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.image-overlay a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.stopPropagation(); 
                });
            });
        });
    </script>
</body>
</html>