<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Troop extends Model
{
    protected $fillable = [
        'troop_number', 'email', 'enabled'
    ];
}

