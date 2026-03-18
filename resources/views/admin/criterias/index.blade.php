@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kriteria TOPSIS</h1>
    <a href="{{ route('admin.criterias.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Tambah Kriteria
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="px-6 py-3 text-left">No</th>
                <th class="px-6 py-3 text-left">Nama Kriteria</th>
                <th class="px-6 py-3 text-left">Bobot (%)</th>
                <th class="px-6 py-3 text-left">Tipe</th>
                <th class="px-6 py-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($criterias as $i => $criteria)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $i + 1 }}</td>
                <td class="px-6 py-4 font-medium">{{ $criteria->name }}</td>
                <td class="px-6 py-4">{{ $criteria->weight }}%</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs
                        {{ $criteria->type === 'benefit' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $criteria->type }}
                    </span>
                </td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.criterias.edit', $criteria) }}"
                       class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.criterias.destroy', $criteria) }}"
                          onsubmit="return confirm('Hapus kriteria ini?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection