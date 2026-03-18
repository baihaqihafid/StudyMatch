<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Assessment;

class RecommendationController extends Controller
{
    public function show(Assessment $assessment)
    {
        // Pastikan hanya pemilik yang bisa lihat
        if ($assessment->user_id !== auth()->id()) {
            abort(403);
        }

        $recommendations = $assessment->recommendations()
            ->with('major')
            ->orderBy('rank')
            ->get();

        return view('siswa.recommendation', compact('assessment', 'recommendations'));
    }

    public function history()
    {
        $assessments = Assessment::where('user_id', auth()->id())
            ->with('recommendations.major')
            ->latest()
            ->get();

        return view('siswa.history', compact('assessments'));
    }
}