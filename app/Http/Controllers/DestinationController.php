<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return response()->json(Destination::all());
    }

    public function show($id)
    {
        return response()->json(Destination::findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
        ]);
        $destination = Destination::create($data);
        return response()->json($destination, 201);
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $data = $request->validate([
            'name' => 'string|max:100',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
        ]);
        $destination->update($data);
        return response()->json($destination);
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
