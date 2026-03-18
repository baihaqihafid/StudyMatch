<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Criteria;
use App\Models\MajorCriteriaValue;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        return view('admin.majors.index', compact('majors'));
    }

    public function create()
    {
        $criterias = Criteria::all();
        return view('admin.majors.create', compact('criterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'category'         => 'required|in:Saintek,Soshum',
            'description'      => 'required|string',
            'career_prospects' => 'required|string',
            'values'           => 'required|array',
        ]);

        $major = Major::create([
            'name'             => $request->name,
            'category'         => $request->category,
            'description'      => $request->description,
            'career_prospects' => $request->career_prospects,
        ]);

        foreach ($request->values as $criteriaId => $value) {
            MajorCriteriaValue::create([
                'major_id'    => $major->id,
                'criteria_id' => $criteriaId,
                'value'       => $value,
            ]);
        }

        return redirect()->route('admin.majors.index')
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Major $major)
    {
        $criterias    = Criteria::all();
        $majorValues  = $major->criteriaValues->keyBy('criteria_id');
        return view('admin.majors.edit', compact('major', 'criterias', 'majorValues'));
    }

    public function update(Request $request, Major $major)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'category'         => 'required|in:Saintek,Soshum',
            'description'      => 'required|string',
            'career_prospects' => 'required|string',
            'values'           => 'required|array',
        ]);

        $major->update([
            'name'             => $request->name,
            'category'         => $request->category,
            'description'      => $request->description,
            'career_prospects' => $request->career_prospects,
        ]);

        foreach ($request->values as $criteriaId => $value) {
            MajorCriteriaValue::updateOrCreate(
                ['major_id' => $major->id, 'criteria_id' => $criteriaId],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.majors.index')
            ->with('success', 'Jurusan berhasil diupdate.');
    }

    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->route('admin.majors.index')
            ->with('success', 'Jurusan berhasil dihapus.');
    }

    public function show(Major $major)
    {
        return view('admin.majors.show', compact('major'));
    }
}