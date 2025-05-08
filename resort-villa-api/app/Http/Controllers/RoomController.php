<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function getByVilla($villa_id)
    {
        return Room::where('villa_id', $villa_id)->get();
    }
}
