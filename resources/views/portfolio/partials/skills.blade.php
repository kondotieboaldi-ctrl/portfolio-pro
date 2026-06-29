<section
    id="skills"
    class="relative py-32 overflow-hidden">

    {{-- ==========================
        BACKGROUND
    =========================== --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-950"></div>

        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] rounded-full bg-violet-600/10 blur-[170px]">
        </div>

        <div
            class="absolute bottom-0 left-0 w-[450px] h-[450px] rounded-full bg-blue-600/10 blur-[170px]">
        </div>

    </div>

    <div class="container mx-auto px-6">

        {{-- TITRE --}}

        <div
            class="max-w-3xl mx-auto text-center mb-20"
            data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 px-5 py-2 rounded-full border border-violet-500/30 bg-violet-500/10 text-violet-300 font-semibold mb-6">

                <i class="fas fa-laptop-code"></i>

                Mes compétences

            </span>

            <h2
                class="text-4xl md:text-6xl font-black mb-8">

                Technologies & Expertises

            </h2>

            <p
                class="text-lg text-slate-400 leading-8">

                J'utilise des technologies modernes afin de développer des applications performantes,
                analyser les données et produire des tableaux de bord interactifs destinés à faciliter
                la prise de décision.

            </p>

        </div>

        {{-- ==========================
            CARTES
        =========================== --}}

        <div
            class="grid lg:grid-cols-2 gap-8">

                    @foreach($skills as $skill)

                @php

                    $icon = match(strtolower($skill->name)) {

                        'power bi' => 'fa-chart-column',

                        'sql','mysql' => 'fa-database',

                        'laravel' => 'fa-laravel',

                        'php' => 'fa-php',

                        'javascript' => 'fa-js',

                        'html' => 'fa-html5',

                        'css' => 'fa-css3-alt',

                        'excel' => 'fa-file-excel',

                        'python' => 'fa-python',

                        default => 'fa-code'

                    };

                    $level = match(true) {

                        $skill->level >= 90 => 'Expert',

                        $skill->level >= 75 => 'Avancé',

                        $skill->level >= 60 => 'Intermédiaire',

                        default => 'Débutant'

                    };

                @endphp

                <div
                    data-aos="zoom-in"
                    class="group bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 hover:border-violet-500 hover:-translate-y-2 transition-all duration-500">

                    {{-- Icône + Titre --}}

                    <div class="flex items-center justify-between mb-8">

                        <div class="flex items-center gap-5">

                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-r from-blue-600 to-violet-600 flex items-center justify-center shadow-lg shadow-blue-600/20 group-hover:scale-110 transition">

                                <i class="fab {{ $icon }} text-2xl text-white"></i>

                            </div>

                            <div>

                                <h3 class="text-2xl font-bold">

                                    {{ $skill->name }}

                                </h3>

                                <p class="text-slate-400">

                                    {{ $level }}

                                </p>

                            </div>

                        </div>

                        <div
                            class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-violet-400">

                            {{ $skill->level }}%

                        </div>

                    </div>

                    {{-- Barre de progression --}}

                    <div class="mb-6">

                        <div
                            class="w-full h-4 rounded-full bg-slate-800 overflow-hidden">

                            <div
                                data-aos="fade-right"
                                class="h-full rounded-full bg-gradient-to-r from-blue-500 via-cyan-400 to-violet-500 transition-all duration-1000"
                                style="width: {{ $skill->level }}%;">

                            </div>

                        </div>

                    </div>

                    {{-- Description --}}

                    <p class="text-slate-400 leading-8">

                        {{ $skill->description }}

                    </p>

                    {{-- Niveau visuel --}}

                    <div class="mt-8 flex items-center justify-between">

                        <span class="text-slate-500">

                            Niveau de maîtrise

                        </span>

                        <div class="flex gap-1">

                            @for($i = 1; $i <= 5; $i++)

                                <i
                                    class="fas fa-star text-sm
                                    {{ $i <= ceil($skill->level / 20)
                                        ? 'text-yellow-400'
                                        : 'text-slate-700' }}">
                                </i>

                            @endfor

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Citation de fin --}}

        <div
            class="mt-24 max-w-5xl mx-auto"
            data-aos="fade-up">

            <div
                class="rounded-3xl bg-gradient-to-r from-blue-600/10 via-violet-600/10 to-cyan-500/10 border border-slate-800 backdrop-blur-xl p-10 text-center">

                <i class="fas fa-lightbulb text-5xl text-yellow-400 mb-6"></i>

                <h3
                    class="text-3xl font-bold mb-6">

                    Une amélioration continue

                </h3>

                <p
                    class="text-lg leading-9 text-slate-300">

                    Je considère la technologie comme un domaine en constante évolution.
                    J'investis régulièrement dans de nouvelles formations et certifications
                    afin de renforcer mes compétences en Business Intelligence,
                    Data Analytics, Développement Web et solutions numériques modernes.

                </p>

            </div>

        </div>

    </div>

</section>