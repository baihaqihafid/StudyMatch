<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Criteria;
use App\Models\User;
use App\Models\Assessment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMajors    = Major::count();
        $totalCriterias = Criteria::count();
        $totalSiswa     = User::role('siswa')->count();
        $totalAssessments = Assessment::count();

        return view('admin.dashboard', compact(
            'totalMajors',
            'totalCriterias',
            'totalSiswa',
            'totalAssessments'
        ));
    }
}