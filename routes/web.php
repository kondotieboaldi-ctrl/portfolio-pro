<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\DiplomaController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ContactController;

use App\Http\Controllers\PortfolioController;

use App\Http\Controllers\Admin\ProjectImageController;
use App\Http\Controllers\Admin\ProjectVideoController;



Route::get(
    '/',
    [PortfolioController::class, 'index']
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post(
    '/contact',
    [PortfolioController::class, 'sendMessage']
)->name('contact.send');

Route::get(
    '/project/{project}',
    [PortfolioController::class, 'project']
)->name('project.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/skills', SkillController::class);

    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');


    Route::resource(
        'admin/projects',
        ProjectController::class
    );

    Route::resource(
        'admin/certifications',
        CertificationController::class
    );

    Route::resource(
        'admin/diplomas',
        DiplomaController::class
    );

    Route::resource(
        'admin/experiences',
        ExperienceController::class
    );

    Route::resource(
        'admin/contacts',
        ContactController::class
    )->only([
                'index',
                'show',
                'destroy'
            ]);



    Route::get(
        '/admin/projects/{project}/images',
        [ProjectImageController::class, 'index']
    )->name('project.images.index');

    Route::post(
        '/admin/projects/{project}/images',
        [ProjectImageController::class, 'store']
    )->name('project.images.store');

    Route::delete(
        '/admin/project-images/{image}',
        [ProjectImageController::class, 'destroy']
    )->name('project.images.destroy');


    Route::get(
        '/admin/projects/{project}/videos',
        [ProjectVideoController::class, 'index']
    )->name('project.videos.index');

    Route::post(
        '/admin/projects/{project}/videos',
        [ProjectVideoController::class, 'store']
    )->name('project.videos.store');

    Route::delete(
        '/admin/project-videos/{video}',
        [ProjectVideoController::class, 'destroy']
    )->name('project.videos.destroy');


});

require __DIR__ . '/auth.php';