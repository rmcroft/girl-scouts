<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BadgeProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'scout_id',
        'badge_id',
        'step1_complete',
        'step2_complete',
        'step3_complete',
        'step4_complete',
        'step5_complete',
    ];

    // Assuming you have a relationship defined for levels
    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }

    public function scout()
    {
        return $this->belongsTo(Scout::class);
    }

}