<?php

namespace App\Http\Controllers;

use App\Models\Resort;

class ResortController extends Controller
{
    public function index()
    {
        return Resort::all();
    }

    public function show($id)
    {
        return Resort::with('villas.rooms')->findOrFail($id);
    }
}
