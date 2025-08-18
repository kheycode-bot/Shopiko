<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleProductExceptions
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response->status() === 404 && $request->route()->named('product.details')) {
            return redirect()->route('user.shop')->with('error', 'The requested product was not found.');
        }

        return $response;
    }
}