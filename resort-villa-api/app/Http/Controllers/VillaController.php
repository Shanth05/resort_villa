<?php
namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    public function index()
    {
        return Villa::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:villas',
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image_url' => 'nullable|url',
        ]);

        $villa = Villa::create($validated);
        return response()->json($villa, 201);
    }

    public function show(Villa $villa)
    {
        return $villa;
    }

    public function update(Request $request, Villa $villa)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:villas,name,' . $villa->id,
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'image_url' => 'nullable|url',
        ]);

        $villa->update($validated);
        return $villa;
    }

    public function destroy(Villa $villa)
    {
        $villa->delete();
        return response()->json(null, 204);
    }
}