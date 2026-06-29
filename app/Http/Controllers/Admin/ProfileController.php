<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required|max:255',
            'professional_title' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|max:50',
            'linkedin' => 'nullable',
            'github' => 'nullable',
            'facebook' => 'nullable',
            'about_me' => 'nullable',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'cv' => 'nullable|mimes:pdf|max:5000',
        ]);

        $profile = Profile::first();

        if (!$profile) {
            $profile = new Profile();
        }

        $profile->fullname = $request->fullname;
        $profile->professional_title = $request->professional_title;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->linkedin = $request->linkedin;
        $profile->github = $request->github;
        $profile->facebook = $request->facebook;
        $profile->about_me = $request->about_me;

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo')
                ->store('profiles', 'public');

            $profile->photo = $photo;
        }

        if ($request->hasFile('cv')) {

            $cv = $request->file('cv')
                ->store('cv', 'public');

            $profile->cv = $cv;
        }

        $profile->save();

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Profil mis à jour avec succès.');
    }
}