<?php

namespace App\Http\Controllers;

use App\Models\ActivityPackage;
use Illuminate\Http\Request;

class ActivityPackageController extends Controller
{
    public function index()
    {
        return response()->json(ActivityPackage::with('destination')->where('is_available', true)->get());
    }

    public function show($id)
    {
        return response()->json(ActivityPackage::with('destination')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'destinations_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string|max:255',
            'is_available' => 'boolean',
        ]);
        $activity = ActivityPackage::create($data);
        return response()->json($activity, 201);
    }

    public function update(Request $request, $id)
    {
        $activity = ActivityPackage::findOrFail($id);
        $data = $request->validate([
            'destinations_id' => 'exists:destinations,id',
            'name' => 'string|max:100',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'image_url' => 'nullable|string|max:255',
            'is_available' => 'boolean',
        ]);
        $activity->update($data);
        return response()->json($activity);
    }

    public function destroy($id)
    {
        $activity = ActivityPackage::findOrFail($id);
        $activity->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
