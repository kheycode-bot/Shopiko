<div class="mobile-header">
    <div class="container">
        <div class="mobile-header-inner">
            <div class="mobile-logo">
                <a href="/">
                    <span>SHOP</span><span>IKO</span>
                </a>
            </div>
            <div class="mobile-actions">
                <a href="#" class="mobile-search-btn"><i class="fas fa-search"></i></a>
                <a href="/cart" class="mobile-cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">{{ Auth::check() ? $cartItemCount : 0 }}</span>
                </a>
                <a href="#" class="mobile-menu-btn"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </div>
</div>

<style>
    .mobile-header {
        display: none;
        padding: 15px 0;
        background: white;
        box-shadow: 0 2px 10px rgba(58, 70, 96, 0.1);
    }
    
    .mobile-header-inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .mobile-logo {
        font-size: 24px;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
    }
    
    .mobile-logo span:first-child {
        color: var(--primary);
    }
    
    .mobile-logo span:last-child {
        color: var(--secondary);
    }
    
    .mobile-actions {
        display: flex;
        gap: 20px;
    }
    
    .mobile-actions a {
        font-size: 18px;
        color: var(--dark-text);
    }
    
    .mobile-actions a:hover {
        color: var(--accent);
    }
    
    .mobile-menu-btn {
        display: none;
    }
    
    @media (max-width: 992px) {
        .mobile-header {
            display: block;
        }
        
        .mobile-menu-btn {
            display: block;
        }
    }
</style>