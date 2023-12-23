<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class TicketController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('tickets.index', compact('trips'));
    }

    // Store a new ticket
    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|integer|min:1|max:36',
            'user_name' => 'required|string',
        ]);

        $trip = Trip::findOrFail($request->input('trip_id'));
        $seatNumber = $request->input('seat_number');

        // Check if the seat is available
        if ($trip->isSeatAvailable($seatNumber)) {
            // Reserve the seat
            $user = User::firstOrCreate(['name' => $request->input('user_name')]);

            SeatAllocation::create([
                'trip_id' => $trip->id,
                'user_id' => $user->id,
                'seat_number' => $seatNumber,
            ]);

            return redirect('/tickets')->with('success', 'Ticket purchased successfully.');
        } else {
            return redirect('/tickets')->with('error', 'Seat not available.');
        }
    }
}
