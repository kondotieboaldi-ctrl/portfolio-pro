<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()
            ->paginate(10);

        return view(
            'admin.experiences.index',
            compact('experiences')
        );
    }

    public function create()
    {
        return view(
            'admin.experiences.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'job_title' => 'required',

            'company' => 'required',

            'start_date' => 'required|date',

            'description' => 'required',

            'image' => 'nullable|image|max:2048'

        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('experiences', 'public');
        }

        Experience::create([

            'job_title' => $request->job_title,

            'company' => $request->company,

            'location' => $request->location,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'current_job' => $request->has('current_job'),

            'description' => $request->description,

            'image' => $image

        ]);

        return redirect()
            ->route('experiences.index')
            ->with(
                'success',
                'Expérience ajoutée avec succès.'
            );
    }

    public function edit(Experience $experience)
    {
        return view(
            'admin.experiences.edit',
            compact('experience')
        );
    }

    public function update(
        Request $request,
        Experience $experience
    )
    {
        $request->validate([

            'job_title' => 'required',

            'company' => 'required',

            'start_date' => 'required|date',

            'description' => 'required'

        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('experiences', 'public');

            $experience->image = $image;
        }

        $experience->job_title = $request->job_title;

        $experience->company = $request->company;

        $experience->location = $request->location;

        $experience->start_date = $request->start_date;

        $experience->end_date = $request->end_date;

        $experience->current_job = $request->has('current_job');

        $experience->description = $request->description;

        $experience->save();

        return redirect()
            ->route('experiences.index')
            ->with(
                'success',
                'Expérience modifiée avec succès.'
            );
    }

    public function destroy(
        Experience $experience
    )
    {
        $experience->delete();

        return redirect()
            ->route('experiences.index')
            ->with(
                'success',
                'Expérience supprimée avec succès.'
            );
    }
}