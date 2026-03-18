@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Data Jurusan</h1>
    <a href="{{ route('admin.majors.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Tambah Jurusan
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="px-6 py-3 text-left">No</th>
                <th class="px-6 py-3 text-left">Nama Jurusan</th>
                <th class="px-6 py-3 text-left">Kategori</th>
                <th class="px-6 py-3 text-left">Prospek Karir</th>
                <th class="px-6 py-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($majors as $i => $major)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">{{ $i + 1 }}</td>
                <td class="px-6 py-4 font-medium">{{ $major->name }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs
                        {{ $major->category === 'Saintek' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700' }}">
                        {{ $major->category }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-500">{{ Str::limit($major->career_prospects, 50) }}</td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.majors.edit', $major) }}"
                       class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.majors.destroy', $major) }}"
                          onsubmit="return confirm('Hapus jurusan ini?')">
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