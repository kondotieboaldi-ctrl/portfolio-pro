<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = \App\Models\Project::latest()
            ->paginate(10);

        return view(
            'admin.projects.index',
            compact('projects')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',

            'project_type' => 'nullable|max:255',

            'project_date' => 'nullable|date',

            'technologies' => 'nullable',

            'short_description' => 'required',

            'full_description' => 'required',

            'thumbnail' => 'nullable|image|max:2048',

            'github_link' => 'nullable',

            'demo_link' => 'nullable',

        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail')
                ->store('projects', 'public');
        }

        Project::create([

            'title' => $request->title,

            'slug' => Str::slug($request->title) . '-' . time(),

            'project_type' => $request->project_type,

            'project_date' => $request->project_date,

            'technologies' => $request->technologies,

            'short_description' => $request->short_description,

            'full_description' => $request->full_description,

            'thumbnail' => $thumbnail,

            'github_link' => $request->github_link,

            'demo_link' => $request->demo_link,

            'featured' => $request->has('featured')

        ]);

        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Projet ajouté avec succès.'
            );
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
    public function edit(Project $project)
    {
        return view(
            'admin.projects.edit',
            compact('project')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([

            'title' => 'required|max:255',

            'project_type' => 'nullable|max:255',

            'project_date' => 'nullable|date',

            'technologies' => 'nullable',

            'short_description' => 'required',

            'full_description' => 'required',

            'thumbnail' => 'nullable|image|max:2048',

        ]);

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request->file('thumbnail')
                ->store('projects', 'public');

            $project->thumbnail = $thumbnail;
        }

        $project->title = $request->title;

        $project->project_type = $request->project_type;

        $project->project_date = $request->project_date;

        $project->technologies = $request->technologies;

        $project->short_description = $request->short_description;

        $project->full_description = $request->full_description;

        $project->github_link = $request->github_link;

        $project->demo_link = $request->demo_link;

        $project->featured = $request->has('featured');

        $project->save();

        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Projet modifié avec succès.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with(
                'success',
                'Projet supprimé avec succès.'
            );
    }
}
