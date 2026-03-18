@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Admin</h1>

<div class="grid grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Jurusan</p>
        <p class="text-3xl font-bold text-blue-600 mt-1">{{ $totalMajors }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Kriteria</p>
        <p class="text-3xl font-bold text-green-600 mt-1">{{ $totalCriterias }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Siswa</p>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalSiswa }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Penilaian</p>
        <p class="text-3xl font-bold text-orange-600 mt-1">{{ $totalAssessments }}</p>
    </div>
</div>

<div class="bg-white rounded-xl p-6 shadow-sm">
    <h2 class="text-lg font-semibold text-gray-700 mb-2">Selamat datang, {{ auth()->user()->name }}!</h2>
    <p class="text-gray-500">Kelola data jurusan, kriteria TOPSIS, dan pantau aktivitas siswa dari panel ini.</p>
</div>
@endsection