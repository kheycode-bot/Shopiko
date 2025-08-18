<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request, $amount)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        
        try {
            $charge = Charge::create([
                "amount" => $amount * 100,
                "currency" => "pkr",
                "source" => $request->stripeToken,
                "description" => "Payment from Shopiko" 
            ]);
            
            Cart::clear();
            
            return back()->with('success', 'Payment successful!');
            
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}