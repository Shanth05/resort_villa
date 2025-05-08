<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    protected $fillable = ['name', 'location', 'description'];

    public function villas()
    {
        return $this->hasMany(Villa::class);
    }
}
