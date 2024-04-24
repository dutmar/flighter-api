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

            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->number,
                    'exp_month' =>  $request->exp_number,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);
        } catch(Exception $ex) {
            return response() -> json([['response' => 'Error']], 500);
        }
    }
}
