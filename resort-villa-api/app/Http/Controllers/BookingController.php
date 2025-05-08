<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        return Booking::where('user_id', $request->user()->id)->with('room.villa.resort')->get();
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'room_id' => $fields['room_id'],
            'check_in' => $fields['check_in'],
            'check_out' => $fields['check_out'],
            'status' => 'pending',
        ]);

        return response()->json($booking, 201);
    }
}
