@extends('layouts.admin')

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.criterias.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
    <h1 class="text-2xl font-bold text-gray-800">Tambah Kriteria</h1>
</div>

<form method="POST" action="{{ route('admin.criterias.store') }}"
      class="bg-white rounded-xl shadow-sm p-6 space-y-4 max-w-lg">
    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Bobot (%)</label>
        <input type="number" name="weight" value="{{ old('weight') }}" min="1" max="100"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
        @error('weight') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tipe</label>
        <select name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2">
            <option value="benefit">Benefit (makin besar makin baik)</option>
            <option value="cost">Cost (makin kecil makin baik)</option>
        </select>
    </div>

    <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        Simpan Kriteria
    </button>
</form>
@endsection