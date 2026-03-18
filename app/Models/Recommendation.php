<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = ['assessment_id', 'major_id', 'topsis_score', 'rank'];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}