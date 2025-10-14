<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
     public function index()
    {
        return response()->json(Itinerary::with(['tourPackage', 'destination'])->get());
    }

    public function show($id)
    {
        return response()->json(Itinerary::with(['tourPackage', 'destination'])->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tour_packages_id' => 'required|exists:tour_packages,id',
            'day_number' => 'required|integer',
            'time' => 'nullable|string|max:20',
            'daily_activity' => 'nullable|string|max:255',
            'destination_id' => 'nullable|exists:destinations,id',
            'description' => 'nullable|string',
        ]);
        $itinerary = Itinerary::create($data);
        return response()->json($itinerary, 201);
    }

    public function update(Request $request, $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $data = $request->validate([
            'tour_packages_id' => 'exists:tour_packages,id',
            'day_number' => 'integer',
            'time' => 'nullable|string|max:20',
            'daily_activity' => 'nullable|string|max:255',
            'destination_id' => 'nullable|exists:destinations,id',
            'description' => 'nullable|string',
        ]);
        $itinerary->update($data);
        return response()->json($itinerary);
    }

    public function destroy($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
