<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentValue;
use App\Models\Criteria;
use App\Services\TopsisService;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('siswa.assessment', compact('criterias'));
    }

    public function store(Request $request)
    {
        $criterias = Criteria::all();

        $rules = [];
        foreach ($criterias as $criteria) {
            $rules['criteria_' . $criteria->id] = 'required|numeric|min:1|max:5';
        }
        $request->validate($rules);

        // Buat assessment baru
        $assessment = Assessment::create(['user_id' => auth()->id()]);

        // Simpan nilai tiap kriteria
        foreach ($criterias as $criteria) {
            AssessmentValue::create([
                'assessment_id' => $assessment->id,
                'criteria_id'   => $criteria->id,
                'value'         => $request->input('criteria_' . $criteria->id),
            ]);
        }

        // Jalankan TOPSIS
        $topsis = new TopsisService();
        $topsis->calculate($assessment);

        return redirect()->route('siswa.recommendation.show', $assessment->id)
            ->with('success', 'Rekomendasi berhasil dihitung!');
    }
}