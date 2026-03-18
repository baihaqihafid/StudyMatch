<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Assessment;

class DashboardController extends Controller
{
    public function index()
    {
        $assessments = Assessment::where('user_id', auth()->id())
            ->with('recommendations.major')
            ->latest()
            ->get();

        return view('siswa.dashboard', compact('assessments'));
    }
}