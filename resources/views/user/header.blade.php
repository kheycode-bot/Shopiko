<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopiko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3a4660;
            --secondary: #c9af98;
            --accent: #845007;
            --light-bg: #f8f5f2;
            --dark-text: #2a3447;
            --light-text: #f5f5f5;
            --gray-text: #666;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(58, 70, 96, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--dark-text);
            background-color: #fff;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .shopiko-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 15px 0;
        }
        
        .header-container {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            justify-self: start;
        }

        .logo a {
            text-decoration: none;
        }

        .logo span:first-child {
            color: var(--primary);
        }

        .logo span:last-child {
            color: var(--secondary);
        }

        .nav-links {
            display: flex;
            gap: 25px;
            justify-self: center;
        }

        .nav-links a {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark-text);
            position: relative;
            text-decoration: none;
            transition: var(--transition);
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--accent);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--accent);
            left: 0;
            bottom: -5px;
            transition: var(--transition);
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 20px;
            justify-self: end;
        }

        .search {
            position: relative;
        }

        .search-icon, .cart-icon {
            font-size: 16px;
            color: var(--dark-text);
            cursor: pointer;
            transition: var(--transition);
        }

        .search-icon:hover, .cart-icon:hover {
            color: var(--accent);
        }

        .search-bar {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            padding: 10px 20px;
            box-shadow: var(--box-shadow);
            width: 300px;
            z-index: 100;
        }

        .search-bar input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .orders {
    position: relative;
    margin-right: -5px;
}

.orders a {
    color: var(--dark-text);
    text-decoration: none;
    transition: var(--transition);
}

.orders a:hover {
    color: var(--accent);
}

.orders i {
    font-size: 16px;
}
        .cart {
            position: relative;
            margin-right:5px;
        }

        .cart a {
            color: var(--dark-text);
            text-decoration: none;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--accent);
            color: white;
            font-size: 10px;
            font-weight: bold;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .auth-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .auth-links a {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark-text);
            text-decoration: none;
            transition: var(--transition);
        }

        .auth-links a:hover {
            color: var(--accent);
        }

        .auth-links span {
            color: #ddd;
        }

        .mobile-menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--dark-text);
        }

        .mobile-nav {
            display: none;
            background: white;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .mobile-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mobile-nav li {
            margin-bottom: 15px;
        }

        .mobile-nav a {
            color: var(--dark-text);
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 992px) {
            .header-container {
                grid-template-columns: auto 1fr auto;
                padding: 15px 20px;
            }
            
            .nav-links {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .search-bar {
                right: 0;
                width: 280px;
            }
        }
    </style>
</head>
<body>
    <header class="shopiko-header">
        <div class="header-container">
            <div class="logo">
                <a href="/">
                    <span>SHOP</span><span>IKO</span>
                </a>
            </div>
            
            <nav class="nav-links">
                <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="/shop" class="{{ request()->is('shop*') ? 'active' : '' }}">Shop</a>
                <a href="/gifts" class="{{ request()->is('gifts*') ? 'active' : '' }}">Gifts</a>
                <a href="/inspirations" class="{{ request()->is('inspirations*') ? 'active' : '' }}">Inspirations</a>
                <a href="/feedback" class="{{ request()->is('feedback*') ? 'active' : '' }}">Feedback</a>
            </nav>
            
            <div class="user-actions">
                <div class="search">
                    <i class="fas fa-search search-icon" onclick="toggleSearch()"></i>
                    <div class="search-bar" id="searchBar">
                        <form action="/shop" method="GET">
                            <input type="text" name="search" placeholder="Search products...">
                        </form>
                    </div>
                </div>
                
                <div class="orders">
                <a href="{{ route('user.orders') }}" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                </a>
            </div>

                <div class="cart">
                    <a href="{{ route('user.cart') }}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">{{ Auth::check() ? Auth::user()->cartItems()->count() : 0 }}</span>
                    </a>
                </div>
                
                <div class="auth-links">
                    @if(Auth::check())
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    @else
                    <a href="/login">Login</a>
                    <span>/</span>
                    <a href="/register">Sign Up</a>
                    @endif
                </div>
                
                <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
        
        <div class="mobile-nav" id="mobileNav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/gifts">Gifts</a></li>
                <li><a href="/inspirations">Inspirations</a></li>
                <li><a href="/deals">Deals</a></li>
                @if(Auth::check())
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Sign Up</a></li>
                @endif
            </ul>
        </div>
    </header>

    <script>
        function toggleSearch() {
            const searchBar = document.getElementById('searchBar');
            searchBar.style.display = searchBar.style.display === 'block' ? 'none' : 'block';
        }
        
        function toggleMobileMenu() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.style.display = mobileNav.style.display === 'block' ? 'none' : 'block';
        }
        
        document.addEventListener('click', function(event) {
            const mobileNav = document.getElementById('mobileNav');
            const mobileToggle = document.querySelector('.mobile-menu-toggle');
            
            if (!mobileNav.contains(event.target)) {
                if (event.target !== mobileToggle && !mobileToggle.contains(event.target)) {
                    mobileNav.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>