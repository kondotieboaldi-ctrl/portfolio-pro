<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diploma;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index()
    {
        $diplomas = Diploma::latest()
            ->paginate(10);

        return view(
            'admin.diplomas.index',
            compact('diplomas')
        );
    }

    public function create()
    {
        return view(
            'admin.diplomas.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',

            'school' => 'required',

            'obtained_at' => 'required|date',

            'diploma_file' => 'nullable|mimes:pdf|max:5000'

        ]);

        $file = null;

        if ($request->hasFile('diploma_file')) {

            $file = $request->file('diploma_file')
                ->store('diplomas', 'public');
        }

        Diploma::create([

            'title' => $request->title,

            'school' => $request->school,

            'obtained_at' => $request->obtained_at,

            'diploma_file' => $file

        ]);

        return redirect()
            ->route('diplomas.index')
            ->with(
                'success',
                'Diplôme ajouté avec succès.'
            );
    }

    public function edit(Diploma $diploma)
    {
        return view(
            'admin.diplomas.edit',
            compact('diploma')
        );
    }

    public function update(
        Request $request,
        Diploma $diploma
    )
    {
        $request->validate([

            'title' => 'required',

            'school' => 'required',

            'obtained_at' => 'required|date'

        ]);

        if ($request->hasFile('diploma_file')) {

            $file = $request->file('diploma_file')
                ->store('diplomas', 'public');

            $diploma->diploma_file = $file;
        }

        $diploma->title = $request->title;

        $diploma->school = $request->school;

        $diploma->obtained_at = $request->obtained_at;

        $diploma->save();

        return redirect()
            ->route('diplomas.index')
            ->with(
                'success',
                'Diplôme modifié avec succès.'
            );
    }

    public function destroy(
        Diploma $diploma
    )
    {
        $diploma->delete();

        return redirect()
            ->route('diplomas.index')
            ->with(
                'success',
                'Diplôme supprimé avec succès.'
            );
    }
}