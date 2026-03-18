@extends('layouts.siswa')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Penilaian</h1>

@forelse($assessments as $assessment)
<div class="bg-white rounded-xl shadow-sm p-6 mb-4">
    <div class="flex justify-between items-center mb-4">
        <p class="text-sm text-gray-500">{{ $assessment->created_at->format('d M Y, H:i') }}</p>
        <a href="{{ route('siswa.recommendation.show', $assessment) }}"
           class="text-indigo-600 text-sm hover:underline">Lihat Detail →</a>
    </div>
    <div class="flex gap-3 flex-wrap">
        @foreach($assessment->recommendations->sortBy('rank')->take(3) as $rec)
        <div class="flex items-center gap-2 bg-gray-50 rounded-lg px-4 py-2">
            <span class="text-xs font-bold text-gray-500">#{{ $rec->rank }}</span>
            <span class="text-sm font-medium text-gray-800">{{ $rec->major->name }}</span>
            <span class="text-xs text-indigo-600">{{ number_format($rec->topsis_score * 100, 1) }}%</span>
        </div>
        @endforeach
    </div>
</div>
@empty
<div class="bg-white rounded-xl shadow-sm p-12 text-center">
    <p class="text-gray-400 mb-4">Belum ada riwayat penilaian.</p>
    <a href="{{ route('siswa.assessment.index') }}"
       class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">
        Mulai Penilaian Pertama
    </a>
</div>
@endforelse
@endsection