
<link rel="stylesheet" href="admin/assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>


<nav class="sidebar sidebar-offcanvas" id="sidebar">
    
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="{{ asset('admin/assets/images/logo/person.jpg') }}" alt="img">
                        <span class="count bg-success"></span>
                    </div>
                    @php
                        $id = Auth::user()->id;
                        $adminData = App\Models\User::find($id);
                    @endphp
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <span>Admin</span>
                    </div>
                </div>
              
        
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.category') }}">
                <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Product Categories</span>
            </a>
        </li>
        <li class="nav-item menu-items" x-data="{ isOpen: false }">
    <a class="nav-link" @click="isOpen = !isOpen">
        <span class="menu-icon">
            <i class="mdi mdi-cart"></i>
        </span>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
    </a>
    <ul x-show="isOpen" x-transition class="nav flex-column sub-menu" style="display: none;">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.add_product') }}">Add Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.show_product') }}">Show Products</a>
        </li>
    </ul>
</li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.user_orders')}}">
                <span class="menu-icon">
                <i class="mdi mdi-basket"></i>
                </span>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.testimonials') }}">
        <span class="menu-icon">
            <i class="mdi mdi-star-circle"></i>
        </span>
        <span class="menu-title">Testimonials</span>
    </a>
</li>
 <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.inventory') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-archive"></i>
                </span>
                <span class="menu-title">Inventory Management</span>
            </a>
        </li>
    </ul>
</nav>
