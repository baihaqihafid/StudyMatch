<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function values()
    {
        return $this->hasMany(AssessmentValue::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}