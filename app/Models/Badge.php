<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level_id',
        'step1',
        'step2',
        'step3',
        'step4',
        'step5',
    ];

    // Assuming you have a relationship defined for levels
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function badge()
    {
        return $this->belongsTo(Level::class);
    }

}
