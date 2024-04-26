<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request) {
        try {
            //$stripe = new \Stripe\StripeClient('sk_test_51P6x9BICSrlzlIyRF5PSlHZBHD3XQRmcTp8VqkqSoCFi9GkpC65xzmq2yoqPZ3TDhrCmnOPneGQg9JsxNeJJkoBO00wnDAlS2F');
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );

            $response = $stripe->paymentIntents->create([
                'amount' => $request->amount,
                'currency' => 'eur',
            ]);

            return response() -> json($response->client_secret, 201);
            //return response()->json(['client_secret' => $response->client_secret]);
        } catch(Exception $ex) {
            return response() -> json([['response' => 'Error']], 500);
        }
    }
}
