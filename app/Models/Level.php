<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name',
    ];

    public function scouts()
    {
        return $this->hasMany(Scout::class);
    }

    public function badges()
    {
        return $this->hasMany(Badge::class);
    }
}
