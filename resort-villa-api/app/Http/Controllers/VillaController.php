<?php

namespace App\Http\Controllers;

use App\Models\Villa;

class VillaController extends Controller
{
    public function getByResort($resort_id)
    {
        return Villa::where('resort_id', $resort_id)->with('rooms')->get();
    }
}
