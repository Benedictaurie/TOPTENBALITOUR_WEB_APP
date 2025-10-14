<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::with('booking')->get());
    }

    public function show($id)
    {
        return response()->json(Payment::with('booking')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric',
            'method' => 'required|string|max:30',
            'status' => 'string|max:30',
        ]);
        $payment = Payment::create($data);
        return response()->json($payment, 201);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $data = $request->validate([
            'booking_id' => 'exists:bookings,id',
            'amount' => 'numeric',
            'method' => 'string|max:30',
            'status' => 'string|max:30',
        ]);
        $payment->update($data);
        return response()->json($payment);
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
