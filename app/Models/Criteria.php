<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $fillable = ['name', 'weight', 'type'];

    public function majorValues()
    {
        return $this->hasMany(MajorCriteriaValue::class);
    }

    public function assessmentValues()
    {
        return $this->hasMany(AssessmentValue::class);
    }
}