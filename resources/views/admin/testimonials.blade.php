<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Manage Testimonials</title>
    
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
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-primary);
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
        
        .main-content-wrapper {
            padding: 30px;
            background-color: var(--dark-bg);
            margin-left: 120px;
            margin-top: 30px;
        }
        
        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
        }

        .card-title {
            color: var(--text-primary);
            text-align: center; 
            margin-bottom: 20px;
        }

        .card-description {
            color: var(--text-secondary);
            text-align: center; 
            margin-bottom: 30px;
        }

        .section-title {
            text-align: center; 
            width: 100%;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
        }

        .table {
            color: var(--text-primary);
        }

        .table thead th {
            border-bottom: 1px solid var(--border-color);
        }

        .table tbody tr {
            border-bottom: 1px solid var(--border-color);
        }

        .table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn-icon {
            padding: 0.375rem;
            line-height: 1;
        }

        .text-warning {
            color: #ffc107 !important;
        }

        .mdi-star, .mdi-star-outline {
            font-size: 1.1rem;
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
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Manage Testimonials</h4>
                                    <p class="card-description">
                                        Review and manage customer testimonials
                                    </p>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <h4 class="section-title">Pending Approval</h4>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Rating</th>
                                                    <th>Feedback</th>
                                                    <th>Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($pending as $testimonial)
                                                <tr>
                                                    <td>{{ $testimonial->id }}</td>
                                                    <td>{{ $testimonial->name }}</td>
                                                    <td>
                                                        @for($i = 0; $i < $testimonial->rating; $i++)
                                                            <i class="mdi mdi-star text-warning"></i>
                                                        @endfor
                                                        @for($i = $testimonial->rating; $i < 5; $i++)
                                                            <i class="mdi mdi-star-outline text-warning"></i>
                                                        @endfor
                                                    </td>
                                                    <td>{{ Str::limit($testimonial->feedback, 50) }}</td>
                                                    <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST" class="mr-2">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-success btn-icon" title="Approve">
                                                                    <i class="mdi mdi-check"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('admin.testimonials.delete', $testimonial->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger btn-icon" title="Delete">
                                                                    <i class="mdi mdi-delete"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">No pending testimonials</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <h4 class="section-title">Approved Testimonials</h4>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Rating</th>
                                                    <th>Feedback</th>
                                                    <th>Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($approved as $testimonial)
                                                <tr>
                                                    <td>{{ $testimonial->id }}</td>
                                                    <td>{{ $testimonial->name }}</td>
                                                    <td>
                                                        @for($i = 0; $i < $testimonial->rating; $i++)
                                                            <i class="mdi mdi-star text-warning"></i>
                                                        @endfor
                                                        @for($i = $testimonial->rating; $i < 5; $i++)
                                                            <i class="mdi mdi-star-outline text-warning"></i>
                                                        @endfor
                                                    </td>
                                                    <td>{{ Str::limit($testimonial->feedback, 50) }}</td>
                                                    <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.testimonials.delete', $testimonial->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon" title="Delete">
                                                                <i class="mdi mdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">No approved testimonials</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
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