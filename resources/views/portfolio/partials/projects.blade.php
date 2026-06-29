<section id="projects" class="relative py-32 overflow-hidden">

    {{-- ==========================
    BACKGROUND
    =========================== --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-950"></div>

        <div class="absolute top-0 left-0 w-[600px] h-[600px] rounded-full bg-violet-600/10 blur-[180px]">
        </div>

        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] rounded-full bg-blue-600/10 blur-[180px]">
        </div>

    </div>

    @php

        /*
        |--------------------------------------------------------------------------
        | Génération automatique des technologies
        |--------------------------------------------------------------------------
        */

        $technologies = collect();

        foreach ($projects as $project) {

            if ($project->technologies) {

                foreach (explode(',', $project->technologies) as $tech) {

                    $technologies->push(trim($tech));

                }

            }

        }

        $technologies = $technologies
            ->unique()
            ->sort()
            ->values();

        $featured = $projects
            ->where('featured', true)
            ->first();

    @endphp

    <div class="container mx-auto px-6" x-data="{

            filter:'Tous'

        }">

        {{-- ==========================
        TITRE
        =========================== --}}

        <div class="max-w-4xl mx-auto text-center mb-20" data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-violet-500/10 border border-violet-500/30 text-violet-300 font-semibold mb-6">

                <i class="fas fa-laptop-code"></i>

                Portfolio

            </span>

            <h2 class="text-4xl md:text-6xl font-black mb-8">

                Réalisations & Projets

            </h2>

            <p class="text-lg leading-8 text-slate-400">

                Découvrez quelques projets réalisés en
                Business Intelligence,
                Data Analytics,
                Développement Web,
                Automatisation
                et Solutions Numériques.

            </p>

        </div>

        {{-- ==========================
        FILTRES
        =========================== --}}

        <div class="flex flex-wrap justify-center gap-4 mb-20">

            <button @click="filter='Tous'" :class="
                    filter=='Tous'
                    ?
                    'bg-gradient-to-r from-blue-600 to-violet-600'
                    :
                    'bg-slate-800 hover:bg-slate-700'
                " class="px-6 py-3 rounded-full transition">

                Tous

            </button>

            @foreach($technologies as $technology)

                <button @click="filter='{{ $technology }}'" :class="
                            filter=='{{ $technology }}'
                            ?
                            'bg-gradient-to-r from-blue-600 to-violet-600'
                            :
                            'bg-slate-800 hover:bg-slate-700'
                        " class="px-6 py-3 rounded-full transition">

                    {{ $technology }}

                </button>

            @endforeach

        </div>

        {{-- ==========================
        PROJET VEDETTE
        =========================== --}}

        @if($featured)

            <div class="mb-24" data-aos="zoom-in">

                <div class="grid lg:grid-cols-2 rounded-[35px]
                        overflow-hidden
                        bg-slate-900/70
                        backdrop-blur-xl
                        border
                        border-slate-800">

                    {{-- IMAGE --}}

                    <div class="overflow-hidden">

                        @if($featured->thumbnail)

                            <img src="{{ asset('storage/' . $featured->thumbnail) }}"
                                class="w-full h-full object-cover hover:scale-110 transition duration-700">

                        @endif

                    </div>

                    {{-- CONTENU --}}

                    <div class="p-10 flex flex-col justify-center">

                        <span
                            class="inline-flex w-fit items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-blue-600 to-violet-600 mb-6">

                            ⭐ Projet Vedette

                        </span>

                        <h3 class="text-4xl font-black mb-4">

                            {{ $featured->title }}

                        </h3>

                        <p class="text-violet-400 font-semibold mb-4">

                            {{ $featured->project_type }}

                        </p>

                        <p class="text-slate-300 leading-8 mb-8">

                            {{ $featured->short_description }}

                        </p>

                        @if($featured->technologies)

                            <div class="flex flex-wrap gap-3 mb-8">

                                @foreach(explode(',', $featured->technologies) as $tech)

                                    <span class="px-4 py-2 rounded-full bg-slate-800 border border-slate-700">

                                        {{ trim($tech) }}

                                    </span>

                                @endforeach

                            </div>

                        @endif

                        <div class="flex flex-wrap gap-4">

                            @if($featured->github_link)

                                <a href="{{ $featured->github_link }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-slate-800 hover:bg-slate-700 transition">

                                    <i class="fab fa-github"></i>

                                    GitHub

                                </a>

                            @endif

                            @if($featured->demo_link)

                                <a href="{{ $featured->demo_link }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-violet-600 hover:scale-105 transition">

                                    <i class="fas fa-play-circle"></i>

                                    Démo

                                </a>

                            @endif

                            <a href="{{ route('project.show', $featured) }}"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl border border-violet-500 hover:bg-violet-500/10 transition">

                                <i class="fas fa-arrow-right"></i>

                                Voir le projet

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @endif

        {{-- ==========================
        AUTRES PROJETS
        =========================== --}}

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @foreach($projects as $project)

                @continue($featured && $featured->id == $project->id)

                <article x-show="
                            filter === 'Tous' ||
                            '{{ strtolower($project->technologies ?? '') }}'
                                .includes(filter.toLowerCase())
                        " x-transition.opacity.duration.500ms data-aos="fade-up" class="group rounded-3xl overflow-hidden
                        bg-slate-900/70
                        backdrop-blur-xl
                        border border-slate-800
                        hover:border-violet-500
                        hover:-translate-y-3
                        transition-all
                        duration-500">

                    {{-- IMAGE --}}

                    <div class="relative overflow-hidden">

                        @if($project->thumbnail)

                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">

                        @else

                            <div
                                class="w-full h-64 bg-gradient-to-br from-blue-600/20 to-violet-600/20 flex items-center justify-center">

                                <i class="fas fa-image text-6xl text-slate-600"></i>

                            </div>

                        @endif

                        <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-slate-950/80 backdrop-blur text-sm">

                            {{ $project->project_type }}

                        </div>

                    </div>

                    {{-- CONTENU --}}

                    <div class="p-6">

                        <h3 class="text-2xl font-bold mb-3 group-hover:text-violet-400 transition">

                            {{ $project->title }}

                        </h3>

                        @if($project->project_date)

                            <p class="text-sm text-slate-500 mb-4">

                                <i class="fas fa-calendar-alt mr-2"></i>

                                {{ \Carbon\Carbon::parse($project->project_date)->format('d M Y') }}

                            </p>

                        @endif

                        <p class="text-slate-400 leading-7 mb-6">

                            {{ \Illuminate\Support\Str::limit($project->short_description, 120) }}

                        </p>

                        @if($project->technologies)

                            <div class="flex flex-wrap gap-2 mb-6">

                                @foreach(explode(',', $project->technologies) as $tech)

                                    <span class="px-3 py-1 rounded-full bg-slate-800 border border-slate-700 text-sm">

                                        {{ trim($tech) }}

                                    </span>

                                @endforeach

                            </div>

                        @endif

                        <div class="flex flex-wrap gap-3">

                            @if($project->github_link)

                                <a href="{{ $project->github_link }}" target="_blank"
                                    class="flex-1 inline-flex justify-center items-center gap-2 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 transition">

                                    <i class="fab fa-github"></i>

                                    GitHub

                                </a>

                            @endif

                            @if($project->demo_link)

                                <a href="{{ $project->demo_link }}" target="_blank"
                                    class="flex-1 inline-flex justify-center items-center gap-2 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-violet-600 hover:opacity-90 transition">

                                    <i class="fas fa-play"></i>

                                    Démo

                                </a>

                            @endif

                        </div>

                        <a href="{{ route('project.show', $project) }}"
                            class="mt-4 w-full inline-flex justify-center items-center gap-2 py-3 rounded-xl border border-violet-500 hover:bg-violet-500/10 transition">

                            <i class="fas fa-eye"></i>

                            Découvrir ce projet

                        </a>

                    </div>

                </article>

            @endforeach

        </div>

        {{-- ==========================
        SECTION DE CONCLUSION
        =========================== --}}

        <div class="mt-24" data-aos="fade-up">

            <div class="max-w-5xl mx-auto rounded-[35px]
                border border-slate-800
                bg-gradient-to-r
                from-blue-600/10
                via-violet-600/10
                to-cyan-500/10
                backdrop-blur-xl
                p-12
                text-center">

                <div
                    class="w-24 h-24 mx-auto mb-8 rounded-full bg-gradient-to-r from-blue-600 to-violet-600 flex items-center justify-center">

                    <i class="fas fa-code text-4xl text-white"></i>

                </div>

                <h3 class="text-4xl font-black mb-6">

                    Chaque projet est une nouvelle aventure

                </h3>

                <p class="text-lg leading-9 text-slate-300 max-w-3xl mx-auto mb-10">

                    Derrière chacune de ces réalisations se cachent
                    des heures de réflexion, de conception,
                    d'analyse et de développement.
                    Mon objectif est toujours le même :
                    concevoir des solutions fiables,
                    modernes et réellement utiles aux utilisateurs.

                </p>

                <a href="#contact"
                    class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 via-cyan-500 to-violet-600 hover:scale-105 transition-all duration-300">

                    <i class="fas fa-paper-plane"></i>

                    Discutons de votre projet

                </a>

            </div>

        </div>

    </div>

</section>