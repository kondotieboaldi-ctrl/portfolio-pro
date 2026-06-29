<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    public function index(Project $project)
    {
        return view(
            'admin.project-images.index',
            compact('project')
        );
    }

    public function store(
        Request $request,
        Project $project
    )
    {
        $request->validate([

            'image' => 'required|image|max:4096'

        ]);

        $path = $request->file('image')
            ->store(
                'project-images',
                'public'
            );

        ProjectImage::create([

            'project_id' => $project->id,

            'image' => $path

        ]);

        return back()
            ->with(
                'success',
                'Image ajoutée.'
            );
    }

    public function destroy(
        ProjectImage $image
    )
    {
        $image->delete();

        return back()
            ->with(
                'success',
                'Image supprimée.'
            );
    }
}
