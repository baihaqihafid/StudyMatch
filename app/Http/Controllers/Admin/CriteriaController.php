<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('admin.criterias.index', compact('criterias'));
    }

    public function create()
    {
        return view('admin.criterias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'weight' => 'required|numeric|min:1|max:100',
            'type'   => 'required|in:benefit,cost',
        ]);

        Criteria::create($request->only('name', 'weight', 'type'));

        return redirect()->route('admin.criterias.index')
            ->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit(Criteria $criteria)
    {
        return view('admin.criterias.edit', compact('criteria'));
    }

    public function update(Request $request, Criteria $criteria)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'weight' => 'required|numeric|min:1|max:100',
            'type'   => 'required|in:benefit,cost',
        ]);

        $criteria->update($request->only('name', 'weight', 'type'));

        return redirect()->route('admin.criterias.index')
            ->with('success', 'Kriteria berhasil diupdate.');
    }

    public function destroy(Criteria $criteria)
    {
        $criteria->delete();
        return redirect()->route('admin.criterias.index')
            ->with('success', 'Kriteria berhasil dihapus.');
    }

    public function show(Criteria $criteria)
    {
        return view('admin.criterias.show', compact('criteria'));
    }
}