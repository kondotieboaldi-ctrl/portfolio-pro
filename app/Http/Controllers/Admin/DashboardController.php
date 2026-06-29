<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Contact;
use App\Models\Diploma;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
{
    return view('admin.dashboard', [

        'skillsCount' => Skill::count(),

        'projectsCount' => Project::count(),

        'certificationsCount' => Certification::count(),

        'diplomasCount' => Diploma::count(),

        'experiencesCount' => Experience::count(),

        'contactsCount' => Contact::count(),

        'latestProjects' => Project::latest()->take(5)->get(),

        'latestContacts' => Contact::latest()->take(5)->get(),

        'projectsByMonth' => [

            Project::whereMonth('created_at', 1)->count(),
            Project::whereMonth('created_at', 2)->count(),
            Project::whereMonth('created_at', 3)->count(),
            Project::whereMonth('created_at', 4)->count(),
            Project::whereMonth('created_at', 5)->count(),
            Project::whereMonth('created_at', 6)->count(),
            Project::whereMonth('created_at', 7)->count(),
            Project::whereMonth('created_at', 8)->count(),
            Project::whereMonth('created_at', 9)->count(),
            Project::whereMonth('created_at', 10)->count(),
            Project::whereMonth('created_at', 11)->count(),
            Project::whereMonth('created_at', 12)->count(),

        ],

    ]);
}

}