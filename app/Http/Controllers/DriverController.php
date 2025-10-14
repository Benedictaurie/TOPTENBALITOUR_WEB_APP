<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        return response()->json(Driver::with('user')->get());
    }

    public function show($id)
    {
        return response()->json(Driver::with('user')->findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'vehicle_type' => 'nullable|string|max:50',
            'license_plate' => 'nullable|string|max:50',
            'status' => 'string|max:20',
            'last_active' => 'nullable|date',
        ]);
        $driver = Driver::create($data);
        return response()->json($driver, 201);
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'exists:users,id',
            'name' => 'string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'vehicle_type' => 'nullable|string|max:50',
            'license_plate' => 'nullable|string|max:50',
            'status' => 'string|max:20',
            'last_active' => 'nullable|date',
        ]);
        $driver->update($data);
        return response()->json($driver);
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
