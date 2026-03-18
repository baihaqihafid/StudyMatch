@extends('layouts.admin')

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.criterias.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
    <h1 class="text-2xl font-bold text-gray-800">Edit Kriteria</h1>
</div>

<form method="POST" action="{{ route('admin.criterias.update', $criteria) }}"
      class="bg-white rounded-xl shadow-sm p-6 space-y-4 max-w-lg">
    @csrf @method('PUT')

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria</label>
        <input type="text" name="name" value="{{ old('name', $criteria->name) }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Bobot (%)</label>
        <input type="number" name="weight" value="{{ old('weight', $criteria->weight) }}"
               min="1" max="100"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tipe</label>
        <select name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2">
            <option value="benefit" {{ $criteria->type === 'benefit' ? 'selected' : '' }}>
                Benefit (makin besar makin baik)
            </option>
            <option value="cost" {{ $criteria->type === 'cost' ? 'selected' : '' }}>
                Cost (makin kecil makin baik)
            </option>
        </select>
    </div>

    <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        Update Kriteria
    </button>
</form>
@endsection