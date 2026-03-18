<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = ['name', 'category', 'description', 'career_prospects'];

    public function criteriaValues()
    {
        return $this->hasMany(MajorCriteriaValue::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}