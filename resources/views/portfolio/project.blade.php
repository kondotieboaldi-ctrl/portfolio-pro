@extends('portfolio.layout')

@section('content')

    <section class="relative overflow-hidden pt-32 pb-24">

        {{-- Background Premium --}}
        <div class="absolute inset-0 -z-20">

            <div class="absolute inset-0 bg-slate-950"></div>

            <div class="absolute top-0 left-0 w-[600px] h-[600px] rounded-full bg-blue-600/10 blur-[180px]"></div>

            <div class="absolute bottom-0 right-0 w-[500px] h-[500px] rounded-full bg-violet-600/10 blur-[180px]"></div>

        </div>

        <div class="container mx-auto px-6">

            {{-- Navigation --}}

            <a href="/#projects"
                class="inline-flex items-center gap-3 text-blue-400 hover:text-violet-400 transition mb-10">

                <i class="fas fa-arrow-left"></i>

                Retour aux projets

            </a>

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Informations --}}

                <div data-aos="fade-right">

                    @if($project->featured)

                        <span
                            class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-gradient-to-r from-blue-600 to-violet-600 mb-6">

                            ⭐ Projet Vedette

                        </span>

                    @endif

                    <h1 class="text-5xl lg:text-6xl font-black leading-tight mb-6">

                        {{ $project->title }}

                    </h1>

                    <p class="text-2xl text-violet-400 font-semibold mb-5">

                        {{ $project->project_type }}

                    </p>

                    @if($project->project_date)

                        <div class="flex items-center gap-3 text-slate-400 mb-8">

                            <i class="fas fa-calendar-alt text-blue-400"></i>

                            {{ \Carbon\Carbon::parse($project->project_date)->format('d F Y') }}

                        </div>

                    @endif

                    <p class="text-slate-300 leading-9 text-lg mb-8">

                        {{ $project->short_description }}

                    </p>

                    {{-- Technologies --}}

                    @if($project->technologies)

                        <div class="flex flex-wrap gap-3 mb-10">

                            @foreach(explode(',', $project->technologies) as $tech)

                                <span
                                    class="px-4 py-2 rounded-full bg-slate-900 border border-slate-700 hover:border-violet-500 transition">

                                    {{ trim($tech) }}

                                </span>

                            @endforeach

                        </div>

                    @endif

                    {{-- Boutons --}}

                    <div class="flex flex-wrap gap-4">
                        @if($project->github_link)

                            <a href="{{ $project->github_link }}" target="_blank"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-slate-800 hover:bg-slate-700 transition-all duration-300">

                                <i class="fab fa-github text-lg"></i>

                                Code source

                            </a>

                        @endif

                        @if($project->demo_link)

                            <a href="{{ $project->demo_link }}" target="_blank"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-gradient-to-r from-blue-600 via-cyan-500 to-violet-600 hover:scale-105 transition-all duration-300">

                                <i class="fas fa-play-circle"></i>

                                Voir la démonstration

                            </a>

                        @endif

                    </div>

                </div>

                {{-- IMAGE PRINCIPALE --}}

                <div data-aos="fade-left">

                    @if($project->thumbnail)

                        <div class="overflow-hidden rounded-[35px] border border-slate-800 shadow-2xl">

                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                class="w-full h-full object-cover hover:scale-105 transition duration-700">

                        </div>

                    @endif

                </div>

            </div>

            {{-- DESCRIPTION COMPLETE --}}

            <div class="mt-24" data-aos="fade-up">

                <div class="rounded-[35px] bg-slate-900/70 backdrop-blur-xl border border-slate-800 p-10">

                    <h2 class="text-3xl font-bold mb-8">

                        Présentation du projet

                    </h2>

                    <div class="leading-9 text-slate-300 text-lg">

                        {!! nl2br(e($project->full_description)) !!}

                    </div>

                </div>

            </div>

            {{-- GALERIE IMAGES --}}

            @if($project->images->count())

                <div class="mt-24" data-aos="fade-up">

                    <h2 class="text-3xl font-bold mb-10">

                        Galerie du projet

                    </h2>

                    <div
    x-data="{ filter:'Tous' }">

    <div
        class="flex flex-wrap justify-center gap-4 mb-14">

        @php

            $filters = [
                'Tous',
                'Power BI',
                'Laravel',
                'PHP',
                'SQL',
                'Python',
                'Excel'
            ];

        @endphp

        @foreach($filters as $item)

            <button

                @click="filter='{{ $item }}'"

                :class="filter=='{{ $item }}'
                    ? 'bg-gradient-to-r from-blue-600 to-violet-600 text-white'
                    : 'bg-slate-800 hover:bg-slate-700'"

                class="px-6 py-3 rounded-full transition">

                {{ $item }}

            </button>

        @endforeach

    </div>

                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                        @foreach($project->images as $image)

                            <a <a href="{{ asset('storage/' . $image->image) }}" class="glightbox" data-gallery="project-gallery">

                                <img src="{{ asset('storage/' . $image->image) }}"
                                    class="w-full h-72 object-cover group-hover:scale-110 transition duration-700">

                            </a>

                        @endforeach

                    </div>

                </div>

            @endif

            {{-- VIDEOS --}}

            @if($project->videos->count())

                <div class="mt-24" data-aos="fade-up">

                    <h2 class="text-3xl font-bold mb-10">

                        Démonstrations vidéo

                    </h2>

                    <div class="space-y-10">

                        @foreach($project->videos as $video)

                            <div class="rounded-3xl overflow-hidden border border-slate-800">

                                <video controls preload="metadata" class="w-full">

                                    <source src="{{ asset('storage/' . $video->video) }}">

                                </video>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

            {{-- NAVIGATION --}}

            <div class="mt-24 flex flex-wrap justify-between gap-6">

                <a href="/#projects"
                    class="inline-flex items-center gap-3 px-6 py-3 rounded-2xl border border-slate-700 hover:border-blue-500 transition">

                    <i class="fas fa-arrow-left"></i>

                    Retour au portfolio

                </a>

                @if($nextProject)

                    <a href="{{ route('project.show', $nextProject) }}"
                        class="inline-flex items-center gap-3 px-6 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-violet-600 hover:scale-105 transition">

                        Projet suivant

                        <i class="fas fa-arrow-right"></i>

                    </a>

                @endif

            </div>

            {{-- CALL TO ACTION --}}

            <div class="mt-28" data-aos="zoom-in">

                <div
                    class="max-w-5xl mx-auto rounded-[35px] border border-slate-800 bg-gradient-to-r from-blue-600/10 via-violet-600/10 to-cyan-500/10 backdrop-blur-xl p-12 text-center">

                    <i class="fas fa-lightbulb text-5xl text-yellow-400 mb-6"></i>

                    <h2 class="text-4xl font-black mb-6">

                        Ce projet vous intéresse ?

                    </h2>

                    <p class="text-lg text-slate-300 leading-9 max-w-3xl mx-auto mb-10">

                        Si vous souhaitez en savoir davantage sur cette réalisation,
                        discuter d'un projet similaire ou collaborer sur une mission,
                        je serai ravi d'échanger avec vous.

                    </p>

                    <a href="/#contact"
                        class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-violet-600 hover:scale-105 transition-all duration-300">

                        <i class="fas fa-paper-plane"></i>

                        Me contacter

                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection