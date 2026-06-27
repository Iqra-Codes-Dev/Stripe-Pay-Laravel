<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class paymentController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

   
    public function createSession(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        $amountInCents = $request->amount * 100;

        $session = Session::create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'customer_email' => null, // no Link
            'billing_address_collection' => 'auto',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Custom Payment',
                    ],
                    'unit_amount' => $amountInCents,
                ],
                'quantity' => 1,
            ]],
            'success_url' => url('/success'),
            'cancel_url' => url('/cancel'),
        ]);

        return redirect()->away($session->url);
    }
}
