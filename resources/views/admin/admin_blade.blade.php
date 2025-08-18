<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Dashboard</title>
    
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/chart.js/Chart.min.css') }}">
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
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-primary);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
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
            padding: 0 15px;
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: var(--text-primary) !important;
        }

        .page-body-wrapper {
            background-color: var(--dark-bg);
            padding-top: 60px;
            margin-left: 0;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 60px;
            height: calc(100vh - 60px);
            width: 250px;
            background-color: var(--darker-bg) !important;
            border-right: 1px solid var(--border-color);
            z-index: 9;
            transition: all 0.3s ease;
        }

        .sidebar .nav {
            background-color: transparent !important;
            padding: 15px;
        }

        .sidebar .nav .nav-item .nav-link {
            color: var(--text-primary);
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .sidebar .nav .nav-item .nav-link:hover {
            background-color: rgba(255,255,255,0.05);
        }

        .main-panel {
            width: calc(100% - 250px);
            margin-left: 450px;
            min-height: calc(100vh - 60px);
            transition: all 0.3s ease;
            margin-top: 50px;
        }

        .content-wrapper {
            background-color: var(--dark-bg) !important;
            padding: 20px !important;
            margin-top: 0 !important;
        }

        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.3);
            color: var(--text-primary);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: var(--darker-bg) !important;
            border-bottom: 1px solid var(--border-color) !important;
            color: var(--text-primary) !important;
            padding: 15px 20px !important;
        }

        .card-body {
            padding: 20px !important;
        }

        .grid-margin.stretch-card {
            padding: 0 15px;
            margin-bottom: 30px;
        }

        .grid-margin .card-body {
            padding: 20px !important;
        }

        .grid-margin .card-body h3 {
            color: var(--text-primary) !important;
            font-size: 1.8rem !important;
            margin-bottom: 5px !important;
        }

        .grid-margin .card-body h6 {
            color: var(--text-secondary) !important;
            font-size: 0.9rem !important;
            margin-top: 5px !important;
        }

        .icon-item {
            font-size: 2rem !important;
            opacity: 0.8;
        }

        .chart-container {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 30px;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }

        .row {
            margin-left: -15px !important;
            margin-right: -15px !important;
        }

        [class*="col-"] {
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.sidebar-visible {
                transform: translateX(0);
            }
            
            .main-panel {
                width: 100% !important;
                margin-left: 0 !important;
            }
        }

        @media (max-width: 767px) {
            .content-wrapper {
                padding: 15px !important;
            }
            
            .grid-margin.stretch-card {
                margin-bottom: 15px !important;
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
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">{{$total_users}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <a href="{{url('/customers')}}">
                                                <span class="mdi mdi-account-star text-warning icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Total Customers</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">{{$total_products}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <a href="{{route('admin.show_product')}}">
                                                <span class="mdi mdi-basket text-info icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Total Products</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">{{$total_orders}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <a href="{{route('admin.user_orders')}}">
                                                <span class="mdi mdi-basket-fill text-success icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Total Active Orders</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">{{$delivered_orders}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <a href="{{route('admin.user_orders')}}">
                                                <span class="mdi mdi-truck-delivery text-danger icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Orders Delivered</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card chart-container">
                            <div class="card-body">
                                <h4 class="card-title">Products Distribution</h4>
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card chart-container">
                            <div class="card-body">
                                <h4 class="card-title">Sales Overview</h4>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>

    <script>
        $(function() {
            var barChartData = {
                labels: ['Utens', 'Products', 'Orders'],
                datasets: [{
                    label: 'Metrics',
                    data: [{{ $total_users }}, {{ $total_products }}, {{ $total_orders }}],
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    borderColor: [
                        'rgba(78, 115, 223, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            var barCtx = document.getElementById('barChart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            }
                        }
                    }
                }
            });

            var doughnutChartData = {
                labels: ['Customers', 'Products', 'Orders'],
                datasets: [{
                    data: [{{ $total_users }}, {{ $total_products }}, {{ $total_orders }}],
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    borderColor: [
                        'rgba(78, 115, 223, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            var doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
            new Chart(doughnutCtx, {
                type: 'doughnut',
                data: doughnutChartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>