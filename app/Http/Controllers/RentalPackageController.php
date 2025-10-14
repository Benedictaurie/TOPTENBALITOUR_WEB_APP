<?php

namespace App\Http\Controllers;

use App\Models\RentalPackage;
use Illuminate\Http\Request;

class RentalPackageController extends Controller
{
    public function index()
    {
        return response()->json(RentalPackage::where('is_available', true)->get());
    }

    public function show($id)
    {
        return response()->json(RentalPackage::findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|max:50',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'plate_number' => 'required|string|max:50',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255',
            'price_per_day' => 'required|numeric',
            'is_available' => 'boolean',
        ]);
        $rental = RentalPackage::create($data);
        return response()->json($rental, 201);
    }

    public function update(Request $request, $id)
    {
        $rental = RentalPackage::findOrFail($id);
        $data = $request->validate([
            'type' => 'string|max:50',
            'brand' => 'string|max:50',
            'model' => 'string|max:50',
            'plate_number' => 'string|max:50',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string|max:255',
            'price_per_day' => 'numeric',
            'is_available' => 'boolean',
        ]);
        $rental->update($data);
        return response()->json($rental);
    }

    public function destroy($id)
    {
        $rental = RentalPackage::findOrFail($id);
        $rental->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
