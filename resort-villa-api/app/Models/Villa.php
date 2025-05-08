<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $fillable = ['resort_id', 'name', 'description'];

    public function resort()
    {
        return $this->belongsTo(Resort::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
