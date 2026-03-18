@extends('layouts.admin')

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.majors.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
    <h1 class="text-2xl font-bold text-gray-800">Edit Jurusan</h1>
</div>

<form method="POST" action="{{ route('admin.majors.update', $major) }}"
      class="bg-white rounded-xl shadow-sm p-6 space-y-4">
    @csrf @method('PUT')

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Jurusan</label>
        <input type="text" name="name" value="{{ old('name', $major->name) }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
        <select name="category" class="w-full border border-gray-300 rounded-lg px-4 py-2">
            <option value="Saintek" {{ $major->category === 'Saintek' ? 'selected' : '' }}>Saintek</option>
            <option value="Soshum" {{ $major->category === 'Soshum' ? 'selected' : '' }}>Soshum</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
        <textarea name="description" rows="3"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ old('description', $major->description) }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Prospek Karir</label>
        <textarea name="career_prospects" rows="2"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ old('career_prospects', $major->career_prospects) }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-3">Nilai per Kriteria (1-5)</label>
        <div class="grid grid-cols-2 gap-4">
            @foreach($criterias as $criteria)
            <div>
                <label class="text-sm text-gray-600">{{ $criteria->name }}
                    <span class="text-xs text-gray-400">({{ $criteria->type }})</span>
                </label>
                <input type="number" name="values[{{ $criteria->id }}]"
                       min="1" max="5"
                       value="{{ old('values.'.$criteria->id, $majorValues[$criteria->id]->value ?? 3) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 mt-1">
            </div>
            @endforeach
        </div>
    </div>

    <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
        Update Jurusan
    </button>
</form>
@endsection