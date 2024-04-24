<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request) {
        try {
            
        } catch(Exception $ex) {
            return response() -> json([['response' => 'Error']], 500);
        }
    }
}
