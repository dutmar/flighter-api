<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flights;

class FlightsController extends Controller
{

    public function add(Request $request) {
        $fields = $request->validate([
            'origin' => 'required|string',
            'destination' => 'required|string',
            'airline' => 'required|string',
            'price' => 'required|string',
            'noOfSeats' => 'required|string',
        ]);

        $flight = Flights::create([
            'origin' => $fields['origin'],
            'destination' => $fields['destination'],
            'airline' => $fields['airline'],
            'price' => $fields['price'],
            'noOfSeats' => $fields['noOfSeats'],
        ]);

        $response = [
            'flight' => $flight
        ];

        return response($response, 201);
    }
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

    public function delete(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required'
        ]);

        $id = [
            'id' => $fields['id']
        ];

        return Flights::destroy($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Flights::destroy($id);
    }

    //possible flights from origin
    public function searchFromOrigin(Request $request)
    {
        $query = $request->input('query');

        // Implement your search logic here
        return Flights::where('origin', 'LIKE', "%$query%")->get();
    }

    public function search(Request $request) {
    $origin = $request->input('origin');
    $destination = $request->input('destination');

    return (Flights::when($origin, function ($query) use ($origin) {
            return $query->where('origin', 'like', "%$origin%");
        })
        ->when($destination, function ($query) use ($destination) {
            return $query->where('destination', 'like', "%$destination%");
        })
        ->get());
}

    //search flights by route
    public function searchRoute(string $origin, string $destination)
    {
        return Flights::where([
            ['origin', $origin],
            ['destination', $destination],
            ])->get();
    }
}
