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

    //search flight by route
    public function searchRoute(string $origin, string $destination)
    {
        return Flights::where([
            ['origin', $origin],
            ['destination', $destination],
            ])->get();
    }
}
