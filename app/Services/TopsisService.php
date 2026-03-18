<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Criteria;
use App\Models\Major;
use App\Models\Recommendation;

class TopsisService
{
    public function calculate(Assessment $assessment): void
    {
        $criterias = Criteria::all();
        $majors    = Major::with('criteriaValues')->get();

        // Ambil nilai input siswa
        $siswaValues = [];
        foreach ($assessment->values as $val) {
            $siswaValues[$val->criteria_id] = $val->value;
        }

        // Hitung skor kecocokan tiap jurusan dengan profil siswa
        $scores = [];
        foreach ($majors as $major) {
            $totalScore  = 0;
            $totalWeight = 0;

            foreach ($criterias as $criteria) {
                $weight   = $criteria->weight / 100;
                $userVal  = $siswaValues[$criteria->id] ?? 3;

                $majorCriteriaVal = $major->criteriaValues
                    ->where('criteria_id', $criteria->id)
                    ->first();
                $majorVal = $majorCriteriaVal ? $majorCriteriaVal->value : 3;

                if ($criteria->type === 'benefit') {
                    // Benefit: user suka teknologi tinggi (5) → cocok sama jurusan teknologi tinggi (5)
                    // Semakin dekat nilai user dan jurusan → semakin cocok
                    $match = 1 - (abs($userVal - $majorVal) / 4);
                } else {
                    // Cost (Budget): user val 1 = kaya (bisa afford mahal)
                    // Major val 1 = jurusan mahal (Kedokteran)
                    // Cocok kalau keduanya sama (kaya → jurusan mahal OK, miskin → jurusan murah)
                    $match = 1 - (abs($userVal - $majorVal) / 4);
                }

                $totalScore  += $weight * $match;
                $totalWeight += $weight;
            }

            $scores[$major->id] = $totalWeight > 0
                ? $totalScore / $totalWeight
                : 0;
        }

        // Urutkan dari skor tertinggi
        arsort($scores);

        // Simpan ke database
        Recommendation::where('assessment_id', $assessment->id)->delete();

        $rank = 1;
        foreach ($scores as $majorId => $score) {
            Recommendation::create([
                'assessment_id' => $assessment->id,
                'major_id'      => $majorId,
                'topsis_score'  => $score,
                'rank'          => $rank,
            ]);
            $rank++;
        }
    }
}