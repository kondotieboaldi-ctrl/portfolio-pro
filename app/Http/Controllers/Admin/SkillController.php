<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $skills = Skill::query()

            ->when($search, function ($query) use ($search) {

                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");

            })

            ->orderBy('name')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.skills.index',
            compact(
                'skills',
                'search'
            )
        );
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'level' => 'required|integer|min:0|max:100',
            'description' => 'nullable'
        ]);

        Skill::create([
            'name' => $request->name,
            'level' => $request->level,
            'description' => $request->description
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Compétence ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|integer|min:0|max:100',
        ]);

        $skill->update([
            'name' => $request->name,
            'level' => $request->level,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Compétence modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('skills.index')
            ->with('success', 'Compétence supprimée avec succès.');
    }
}
