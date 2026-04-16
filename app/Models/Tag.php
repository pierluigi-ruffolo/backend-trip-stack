<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }
}
