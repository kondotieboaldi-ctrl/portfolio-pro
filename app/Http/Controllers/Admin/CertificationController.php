<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::latest()
            ->paginate(10);

        return view(
            'admin.certifications.index',
            compact('certifications')
        );
    }

    public function create()
    {
        return view(
            'admin.certifications.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',

            'organization' => 'required',

            'obtained_at' => 'required|date',

            'certificate_file' => 'nullable|mimes:pdf|max:5000'

        ]);

        $file = null;

        if ($request->hasFile('certificate_file')) {

            $file = $request->file('certificate_file')
                ->store('certifications', 'public');
        }

        Certification::create([

            'title' => $request->title,

            'organization' => $request->organization,

            'obtained_at' => $request->obtained_at,

            'certificate_file' => $file

        ]);

        return redirect()
            ->route('certifications.index')
            ->with(
                'success',
                'Certification ajoutée.'
            );
    }

    public function edit(Certification $certification)
    {
        return view(
            'admin.certifications.edit',
            compact('certification')
        );
    }

    public function update(
        Request $request,
        Certification $certification
    )
    {
        $request->validate([

            'title' => 'required',

            'organization' => 'required',

            'obtained_at' => 'required|date'

        ]);

        if ($request->hasFile('certificate_file')) {

            $file = $request->file('certificate_file')
                ->store('certifications', 'public');

            $certification->certificate_file = $file;
        }

        $certification->title = $request->title;

        $certification->organization = $request->organization;

        $certification->obtained_at = $request->obtained_at;

        $certification->save();

        return redirect()
            ->route('certifications.index')
            ->with(
                'success',
                'Certification modifiée.'
            );
    }

    public function destroy(
        Certification $certification
    )
    {
        $certification->delete();

        return redirect()
            ->route('certifications.index')
            ->with(
                'success',
                'Certification supprimée.'
            );
    }
}