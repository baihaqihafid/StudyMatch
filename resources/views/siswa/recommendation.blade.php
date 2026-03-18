@extends('layouts.siswa')

@section('content')
<div class="flex items-center gap-4 mb-2">
    <a href="{{ route('siswa.dashboard') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
    <h1 class="text-2xl font-bold text-gray-800">Hasil Rekomendasi</h1>
</div>
<p class="text-gray-500 mb-8 ml-16">Berdasarkan jawabanmu, ini jurusan yang paling cocok untukmu!</p>

{{-- TOP 3 --}}
<div class="space-y-4 mb-8">
    @foreach($recommendations->take(5) as $rec)
    <div class="bg-white rounded-xl shadow-sm p-6 flex items-center gap-6
        {{ $rec->rank === 1 ? 'border-2 border-indigo-500 ring-2 ring-indigo-100' : '' }}">

        {{-- Rank badge --}}
        <div class="w-14 h-14 rounded-full flex items-center justify-center font-bold text-xl flex-shrink-0
            {{ $rec->rank === 1 ? 'bg-indigo-600 text-white' :
               ($rec->rank === 2 ? 'bg-gray-800 text-white' : 'bg-amber-500 text-white') }}">
            #{{ $rec->rank }}
        </div>

        {{-- Info --}}
        <div class="flex-1">
            <div class="flex items-center gap-2 flex-wrap mb-1">
                <h3 class="font-bold text-gray-800 text-lg">{{ $rec->major->name }}</h3>
                @if($rec->rank === 1)
                    <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full font-medium">
                        Paling Cocok!
                    </span>
                @endif
                <span class="text-xs px-2 py-0.5 rounded-full
                    {{ $rec->major->category === 'Saintek' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700' }}">
                    {{ $rec->major->category }}
                </span>
            </div>
            <p class="text-gray-500 text-sm mb-2">{{ $rec->major->description }}</p>
            <div class="flex items-center gap-1 flex-wrap">
                <span class="text-xs text-gray-400">Prospek:</span>
                @foreach(explode(',', $rec->major->career_prospects) as $career)
                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">
                        {{ trim($career) }}
                    </span>
                @endforeach
            </div>
        </div>

        {{-- Skor --}}
        <div class="text-right flex-shrink-0">
            <p class="text-3xl font-bold {{ $rec->rank === 1 ? 'text-indigo-600' : 'text-gray-700' }}">
                {{ number_format($rec->topsis_score * 100, 1) }}%
            </p>
            <p class="text-xs text-gray-400">Tingkat Kecocokan</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Sisa jurusan lainnya (dilipat) --}}
@if($recommendations->count() > 5)
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <button onclick="document.getElementById('other-majors').classList.toggle('hidden')"
            class="w-full px-6 py-4 text-left text-sm font-medium text-gray-600 hover:bg-gray-50 flex justify-between items-center">
        <span>Lihat {{ $recommendations->count() - 5 }} jurusan lainnya</span>
        <span class="text-gray-400">▼</span>
    </button>
    <div id="other-majors" class="hidden divide-y divide-gray-100">
        @foreach($recommendations->skip(5) as $rec)
        <div class="px-6 py-4 flex items-center gap-4">
            <span class="w-8 h-8 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center text-sm font-bold flex-shrink-0">
                {{ $rec->rank }}
            </span>
            <div class="flex-1">
                <p class="font-medium text-gray-700">{{ $rec->major->name }}</p>
                <p class="text-xs text-gray-400">{{ $rec->major->category }}</p>
            </div>
            <span class="text-sm font-medium text-gray-500">
                {{ number_format($rec->topsis_score * 100, 1) }}%
            </span>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- Action buttons --}}
<div class="mt-8 flex gap-4">
    <a href="{{ route('siswa.assessment.index') }}"
       class="bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 font-medium">
        Coba Lagi
    </a>
    <a href="{{ route('siswa.recommendation.history') }}"
       class="bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-50 font-medium">
        Lihat Riwayat
    </a>
</div>
@endsection