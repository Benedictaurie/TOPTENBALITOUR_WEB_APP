<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return response()->json(Booking::with(['user', 'tourPackage', 'activityPackage', 'rentalPackage'])->get());
    }

    public function show($id)
    {
        return response()->json(Booking::with(['user', 'tourPackage', 'activityPackage', 'rentalPackage'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'booking_code' => 'required|string|max:20|unique:bookings,booking_code',
            'user_id' => 'required|exists:users,id',
            'booking_type' => 'required|string|max:20',
            'tour_packages_id' => 'nullable|exists:tour_packages,id',
            'activity_packages_id' => 'nullable|exists:activity_packages,id',
            'rental_packages_id' => 'nullable|exists:rental_packages,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'num_persons' => 'nullable|integer|min:1',
            'status' => 'string|max:30',
            'total_price' => 'required|numeric',
        ]);
        $booking = Booking::create($data);
        return response()->json($booking, 201);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $data = $request->validate([
            'booking_code' => 'string|max:20|unique:bookings,booking_code,' . $id,
            'user_id' => 'exists:users,id',
            'booking_type' => 'string|max:20',
            'tour_packages_id' => 'nullable|exists:tour_packages,id',
            'activity_packages_id' => 'nullable|exists:activity_packages,id',
            'rental_packages_id' => 'nullable|exists:rental_packages,id',
            'start_date' => 'date',
            'end_date' => 'date',
            'num_persons' => 'integer|min:1',
            'status' => 'string|max:30',
            'total_price' => 'numeric',
        ]);
        $booking->update($data);
        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
