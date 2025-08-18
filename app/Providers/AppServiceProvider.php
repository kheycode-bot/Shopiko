<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot()
    {
        // Share cartItemCount globally across all views
        View::composer('*', function ($view) {
            $cartItemCount = 0;

            if (Auth::check()) {
                $cartItemCount = Cart::where('user_id', Auth::id())->count();
            }

            // Share cartItemCount with all views
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}
