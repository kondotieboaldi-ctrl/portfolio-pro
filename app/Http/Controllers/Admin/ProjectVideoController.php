<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectVideo;
use Illuminate\Http\Request;

class ProjectVideoController extends Controller
{
    public function index(Project $project)
    {
        return view(
            'admin.project-videos.index',
            compact('project')
        );
    }

    public function store(
        Request $request,
        Project $project
    )
    {
        $request->validate([

            'video' => 'required|mimes:mp4,mov,avi|max:51200'

        ]);

        $path = $request->file('video')
            ->store(
                'project-videos',
                'public'
            );

        ProjectVideo::create([

            'project_id' => $project->id,

            'video' => $path

        ]);

        return back()
            ->with(
                'success',
                'Vidéo ajoutée.'
            );
    }

    public function destroy(
        ProjectVideo $video
    )
    {
        $video->delete();

        return back()
            ->with(
                'success',
                'Vidéo supprimée.'
            );
    }
}
