@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-2">Halo, {{ auth()->user()->name }}! 👋</h1>
<p class="text-gray-500 mb-8">Temukan jurusan kuliah yang paling cocok untuk kamu.</p>

<div class="grid grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <p class="text-sm text-gray-500">Total Penilaian</p>
        <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $assessments->count() }}</p>
    </div>
    <div class="bg-white rounded-xl p-6 shadow-sm">
        <p class="text-sm text-gray-500">Rekomendasi Terakhir</p>
        <p class="text-xl font-bold text-gray-800 mt-1">
            @if($assessments->isNotEmpty() && $assessments->first()->recommendations->isNotEmpty())
                {{ $assessments->first()->recommendations->sortBy('rank')->first()->major->name }}
            @else
                Belum ada
            @endif
        </p>
    </div>
</div>

<div class="bg-indigo-600 rounded-xl p-6 text-white flex items-center justify-between">
    <div>
        <h2 class="text-lg font-semibold">Belum tahu mau kuliah jurusan apa?</h2>
        <p class="text-indigo-200 text-sm mt-1">Isi penilaian sekarang dan sistem akan merekomendasikan jurusan terbaik untukmu!</p>
    </div>
    <a href="{{ route('siswa.assessment.index') }}"
       class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-lg hover:bg-indigo-50 whitespace-nowrap ml-4">
        Mulai Sekarang
    </a>
</div>
@endsection