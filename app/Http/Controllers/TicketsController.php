<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;

class TicketsController extends Controller
{
    public function store(Request $request) {
        $fields = $request->validate([
            'email' => 'required',
            'origin' => 'required',
            'destination' => 'required'
        ]);

        $data = Tickets::create([
            'email' => $fields['email'],
            'origin' => $fields['origin'],
            'destination' => $fields['destination']
        ]);

        $response = [
            'data' => $data
        ]; 

        return response($response, 201);
    }
}
