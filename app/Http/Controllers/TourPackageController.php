<?php

namespace App\Http\Controllers;

use App\Models\TourPackage;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    public function index()
    {
        return response()->json(TourPackage::with('destination')->where('is_available', true)->get());
    }

    public function show($id)
    {
        return response()->json(TourPackage::with('destination')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration_days' => 'nullable|integer',
            'image_url' => 'nullable|string|max:255',
            'is_available' => 'boolean',
        ]);
        $tour = TourPackage::create($data);
        return response()->json($tour, 201);
    }

    public function update(Request $request, $id)
    {
        $tour = TourPackage::findOrFail($id);
        $data = $request->validate([
            'destination_id' => 'exists:destinations,id',
            'name' => 'string|max:100',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'duration_days' => 'nullable|integer',
            'image_url' => 'nullable|string|max:255',
            'is_available' => 'boolean',
        ]);
        $tour->update($data);
        return response()->json($tour);
    }

    public function destroy($id)
    {
        $tour = TourPackage::findOrFail($id);
        $tour->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
