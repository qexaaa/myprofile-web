<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('level', 'desc')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required|integer|min:0|max:100'
        ]);

        Skill::create($data);

        return redirect()->route('admin.skills.index')
                         ->with('success', 'Skill berhasil ditambahkan');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required',
            'level' => 'required|integer|min:0|max:100'
        ]);

        $skill->update($data);

        return redirect()->route('admin.skills.index')
                         ->with('success', 'Skill berhasil diperbarui');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
                         ->with('success', 'Skill berhasil dihapus');
    }
}
