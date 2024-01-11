<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flights;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Flights::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'airline' => 'required',
            'price' => 'required',
            'noOfSeats' => 'required'
        ]);

        return Flights::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Flights::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $flight = Flights::find($id);
        $flight->update($request->all());
        return $flight;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Flights::destroy($id);
    }

    //search possible flights from origin
    public function search(string $origin)
    {
        return Flights::where([
            ['origin', $origin],
            ])->get();
    }

    //possible flights from origin
    public function searchFromOrigin(Request $request)
    {
        $query = $request->input('query');

        // Implement your search logic here
        return Flights::where('origin', 'LIKE', $query)->get();
    }

    //search flights by route
    public function searchRoute(string $origin, string $destination)
    {
        return Flights::where([
            ['origin', $origin],
            ['destination', $destination],
            ])->get();
    }

    // public function addFlightToCart($id) {
    //     $flight = Flights::findOrFail($id);
    //     $cart = session()->get('cart', []);

    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             'origin' => $flight->origin,
    //             'destination' => $flight->destination,
    //             'price' => $flight->price
    //         ];
    //     }

    //     session()->put('cart', $cart);
    //     //$this->info('this works');
    //     return redirect()->back()->with('succes', 'flight added to cart');
    // }
}
