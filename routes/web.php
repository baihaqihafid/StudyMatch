<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Siswa;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes (dari Breeze)
require __DIR__.'/auth.php';

// Redirect setelah login berdasarkan role
Route::middleware('auth')->get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('siswa.dashboard');
})->name('dashboard');

// ===========================
// ADMIN ROUTES
// ===========================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        // Majors (Jurusan)
        Route::resource('majors', Admin\MajorController::class);

        // Criterias (Kriteria)
        Route::resource('criterias', Admin\CriteriaController::class);

        // Users
        Route::get('/users', [Admin\UserController::class, 'index'])
            ->name('users.index');
        Route::delete('/users/{user}', [Admin\UserController::class, 'destroy'])
            ->name('users.destroy');
    });

// ===========================
// SISWA ROUTES
// ===========================
Route::middleware(['auth', 'siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [Siswa\DashboardController::class, 'index'])
            ->name('dashboard');

        // Assessment (isi form penilaian)
        Route::get('/assessment', [Siswa\AssessmentController::class, 'index'])
            ->name('assessment.index');
        Route::post('/assessment', [Siswa\AssessmentController::class, 'store'])
            ->name('assessment.store');

        // Recommendation (hasil rekomendasi)
        Route::get('/recommendation/{assessment}', [Siswa\RecommendationController::class, 'show'])
            ->name('recommendation.show');
        Route::get('/history', [Siswa\RecommendationController::class, 'history'])
            ->name('recommendation.history');
    });