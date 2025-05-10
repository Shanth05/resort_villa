<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Villa;
use App\Notifications\BookingConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'villa_id' => 'required|exists:villas,id',
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $villa = Villa::find($validated['villa_id']);
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);
        $days = $checkIn->diffInDays($checkOut);
        $totalPrice = $villa->price_per_night * $days;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'villa_id' => $validated['villa_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'total_price' => $totalPrice,
            'status' => 'confirmed',
        ]);

        $booking->user->notify(new BookingConfirmation($booking));

        return response()->json($booking, 201);
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);
        return $booking;
    }
}