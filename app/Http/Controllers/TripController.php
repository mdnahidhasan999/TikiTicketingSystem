<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('trips.index', compact('locations'));
    }

    // Store a new trip
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'date' => 'required|date',
        ]);

        Trip::create([
            'location_id' => $request->input('location_id'),
            'date' => $request->input('date'),
        ]);

        return redirect('/trips')->with('success', 'Trip created successfully.');
    }
}
