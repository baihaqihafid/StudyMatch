<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MajorCriteriaValue extends Model
{
    protected $fillable = ['major_id', 'criteria_id', 'value'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}