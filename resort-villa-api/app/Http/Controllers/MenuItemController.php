<?php
namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        return MenuItem::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|in:food,beverage',
            'image_url' => 'nullable|url',
        ]);

        $menuItem = MenuItem::create($validated);
        return response()->json($menuItem, 201);
    }

    public function show(MenuItem $menuItem)
    {
        return $menuItem;
    }
}