<nav class="navbar p-0 fixed-top d-flex flex-row" style="background-color: #121212; border-bottom: 1px solid #333;">
    <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center" style="width: 250px; background-color: #0a0a0a;">
        <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('admin/assets/images/logo/spk.png') }}" alt="logo" style="height: 80px; width: auto; margin-left: 50px;">
        </a>
    </div>
    
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <ul class="navbar-nav navbar-nav-right ml-auto">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                        <img class="img-xs rounded-circle" 
                             src="{{ asset('admin/assets/images/logo/person.jpg') }}" alt="img">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Profile</h6>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('admin.logout') }}" id="admin-logout-form">
                        @csrf
                        <button type="submit" class="dropdown-item preview-item" style="background: none; border: none; width: 100%; text-align: left;">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject mb-1">Log Out</p>
                            </div>
                        </button>
                    </form>
                </div>
            </li>
            @endauth
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>