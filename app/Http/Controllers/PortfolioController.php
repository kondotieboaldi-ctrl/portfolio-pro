<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Certification;
use App\Models\Diploma;
use App\Models\Contact;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        $skills = Skill::orderBy('level', 'desc')->get();

        /*
        |--------------------------------------------------------------------------
        | Projets (chargement optimisé)
        |--------------------------------------------------------------------------
        */

        $projects = Project::latest()->get();

        /*
        |--------------------------------------------------------------------------
        | Liste dynamique des technologies
        |--------------------------------------------------------------------------
        */

        $technologies = $projects
            ->pluck('technologies')
            ->filter()
            ->flatMap(function ($techs) {

                return collect(explode(',', $techs))
                    ->map(fn($tech) => trim($tech))
                    ->filter();

            })
            ->unique(function ($item) {

                return strtolower($item);

            })
            ->sort()
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Expériences
        |--------------------------------------------------------------------------
        */

        $experiences = Experience::orderByDesc('start_date')->get();

        /*
        |--------------------------------------------------------------------------
        | Certifications
        |--------------------------------------------------------------------------
        */

        $certifications = Certification::latest()->get();

        /*
        |--------------------------------------------------------------------------
        | Diplômes
        |--------------------------------------------------------------------------
        */

        $diplomas = Diploma::latest()->get();

        /*
        |--------------------------------------------------------------------------
        | Statistiques
        |--------------------------------------------------------------------------
        */

        $projectsCount = Project::count();

        $skillsCount = Skill::count();

        $certificationsCount = Certification::count();

        return view(
            'portfolio.index',
            compact(
                'profile',
                'skills',
                'projects',
                'experiences',
                'certifications',
                'diplomas',
                'projectsCount',
                'skillsCount',
                'certificationsCount',
                'technologies'
            )
        );
    }

    public function sendMessage(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'email' => 'required|email',

            'subject' => 'required|max:255',

            'message' => 'required'

        ]);

        Contact::create([

            'name' => $request->name,

            'email' => $request->email,

            'subject' => $request->subject,

            'message' => $request->message

        ]);

        return redirect('/')
            ->with(
                'success',
                'Votre message a été envoyé avec succès.'
            );
    }

    public function project(Project $project)
    {
        $profile = Profile::first();

        $project->load([
            'images',
            'videos'
        ]);

        $nextProject = Project::where(
            'id',
            '>',
            $project->id
        )
            ->orderBy('id')
            ->first();

        return view(
            'portfolio.project',
            compact(
                'project',
                'profile',
                'nextProject'
            )
        );
    }
}