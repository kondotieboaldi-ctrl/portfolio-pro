<section
    id="home"
    class="relative min-h-screen flex items-center overflow-hidden pt-24">

    {{-- ===========================
        BACKGROUND
    ============================ --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-950"></div>

        <div
            class="absolute top-0 left-0 w-[650px] h-[650px] bg-blue-600/15 blur-[170px] rounded-full">
        </div>

        <div
            class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-cyan-500/10 blur-[170px] rounded-full">
        </div>

        <div
            class="absolute inset-0
            bg-[linear-gradient(rgba(255,255,255,.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.03)_1px,transparent_1px)]
            bg-[size:55px_55px]">
        </div>

    </div>

    <div class="container mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            {{-- ==========================================
                COLONNE GAUCHE
            =========================================== --}}

            <div
                data-aos="fade-right"
                data-aos-duration="1000">

                <div
                    class="inline-flex items-center gap-3 px-5 py-3 rounded-full border border-blue-500/40 bg-blue-500/10 backdrop-blur-xl mb-8">

                    <span
                        class="w-3 h-3 rounded-full bg-green-400 animate-pulse">
                    </span>

                    <span
                        class="text-sm font-medium tracking-wide">

                        Disponible pour de nouveaux projets

                    </span>

                </div>

                <p
                    class="uppercase tracking-[0.35em] text-blue-400 font-semibold mb-5">

                    Bonjour, je suis

                </p>

                <h1
                    class="text-5xl md:text-7xl xl:text-8xl font-black leading-tight">

                    {{ $profile->fullname }}

                </h1>

                <div
                    class="mt-6 text-2xl md:text-3xl font-semibold">

                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">

                        {{ $profile->professional_title }}

                    </span>

                </div>

                <p
                    class="mt-8 max-w-2xl text-lg leading-9 text-slate-300">

                    {{ $profile->about_me }}

                </p>

                {{-- BADGES --}}

                <div
                    class="flex flex-wrap gap-4 mt-10">

                    <span class="px-5 py-2 rounded-full bg-slate-900 border border-slate-700 hover:border-blue-500 transition">

                        📊 Power BI

                    </span>

                    <span class="px-5 py-2 rounded-full bg-slate-900 border border-slate-700 hover:border-blue-500 transition">

                        🗄 SQL

                    </span>

                    <span class="px-5 py-2 rounded-full bg-slate-900 border border-slate-700 hover:border-blue-500 transition">

                        🚀 Laravel

                    </span>

                    <span class="px-5 py-2 rounded-full bg-slate-900 border border-slate-700 hover:border-blue-500 transition">

                        💻 PHP

                    </span>

                    <span class="px-5 py-2 rounded-full bg-slate-900 border border-slate-700 hover:border-blue-500 transition">

                        📈 Data Analytics

                    </span>

                </div>

                {{-- BOUTONS --}}

                <div
                    class="flex flex-wrap gap-5 mt-12">

                    @if($profile && $profile->cv)

                        <a
                            href="{{ asset('storage/'.$profile->cv) }}"
                            target="_blank"
                            class="group inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-500 px-8 py-4 rounded-2xl font-semibold shadow-xl shadow-blue-600/30 hover:scale-105 transition duration-300">

                            <i class="fas fa-download"></i>

                            Télécharger mon CV

                        </a>

                    @endif

                    <a
                        href="#projects"
                        class="inline-flex items-center gap-3 border border-slate-700 hover:border-blue-500 hover:bg-blue-500/10 px-8 py-4 rounded-2xl font-semibold transition duration-300">

                        <i class="fas fa-folder-open"></i>

                        Voir mes projets

                    </a>

                </div>

                {{-- RÉSEAUX SOCIAUX --}}

                <div
                    class="flex items-center gap-5 mt-12">

                    @if($profile->linkedin)

                        <a
                            href="{{ $profile->linkedin }}"
                            target="_blank"
                            class="w-14 h-14 rounded-2xl bg-slate-900 border border-slate-800 hover:border-blue-500 hover:bg-blue-500 transition flex items-center justify-center text-xl">

                            <i class="fab fa-linkedin-in"></i>

                        </a>

                    @endif

                    @if($profile->github)

                        <a
                            href="{{ $profile->github }}"
                            target="_blank"
                            class="w-14 h-14 rounded-2xl bg-slate-900 border border-slate-800 hover:border-blue-500 hover:bg-blue-500 transition flex items-center justify-center text-xl">

                            <i class="fab fa-github"></i>

                        </a>

                    @endif

                    @if($profile->facebook)

                        <a
                            href="{{ $profile->facebook }}"
                            target="_blank"
                            class="w-14 h-14 rounded-2xl bg-slate-900 border border-slate-800 hover:border-blue-500 hover:bg-blue-500 transition flex items-center justify-center text-xl">

                            <i class="fab fa-facebook-f"></i>

                        </a>

                    @endif

                </div>

            </div>

            {{-- ==========================================
                COLONNE DROITE
            =========================================== --}}
                        <div
                class="relative flex justify-center items-center"
                data-aos="fade-left"
                data-aos-duration="1200">

                {{-- Halo lumineux --}}

                <div
                    class="absolute w-[430px] h-[430px] rounded-full bg-blue-500/20 blur-[120px] animate-pulse">
                </div>

                {{-- Cercle décoratif --}}

                <div
                    class="absolute w-[520px] h-[520px] border border-blue-500/20 rounded-full animate-spin"
                    style="animation-duration:25s;">
                </div>

                {{-- Cercle décoratif --}}

                <div
                    class="absolute w-[600px] h-[600px] border border-cyan-400/10 rounded-full animate-spin"
                    style="animation-direction:reverse;animation-duration:35s;">
                </div>

                {{-- Photo principale --}}

                @if($profile && $profile->photo)

                    <div class="relative z-10">

                        <img

                            src="{{ asset('storage/'.$profile->photo) }}"

                            alt="{{ $profile->fullname }}"

                            class="w-80 h-80 md:w-[430px] md:h-[430px]
                            rounded-full
                            object-cover
                            border-[8px]
                            border-slate-900
                            shadow-[0_0_80px_rgba(59,130,246,.45)]
                            hover:scale-105
                            transition
                            duration-700">

                    </div>

                @endif

                {{-- Carte flottante 1 --}}

                <div

                    class="hidden xl:flex absolute top-10 -left-5 bg-slate-900/90 backdrop-blur-xl border border-slate-700 rounded-2xl px-5 py-4 shadow-xl animate-bounce"

                    style="animation-duration:4s;">

                    <div>

                        <p class="text-sm text-slate-400">

                            Expérience

                        </p>

                        <h3 class="text-2xl font-bold text-blue-400">

                            {{ $projectsCount }}+

                        </h3>

                        <small>

                            Projets réalisés

                        </small>

                    </div>

                </div>

                {{-- Carte flottante 2 --}}

                <div

                    class="hidden xl:flex absolute bottom-16 -right-6 bg-slate-900/90 backdrop-blur-xl border border-slate-700 rounded-2xl px-5 py-4 shadow-xl animate-bounce"

                    style="animation-duration:5s;">

                    <div>

                        <p class="text-sm text-slate-400">

                            Expertise

                        </p>

                        <h3 class="text-2xl font-bold text-cyan-400">

                            {{ $skillsCount }}+

                        </h3>

                        <small>

                            Compétences

                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- ==========================
            STATISTIQUES
        =========================== --}}

        <div

            x-data="{

                projects:0,

                skills:0,

                certifications:0

            }"

            x-init="

                let p={{ $projectsCount }};

                let s={{ $skillsCount }};

                let c={{ $certificationsCount }};

                let interval=setInterval(()=>{

                    if(projects<p)projects++;

                    if(skills<s)skills++;

                    if(certifications<c)certifications++;

                    if(projects>=p && skills>=s && certifications>=c){

                        clearInterval(interval);

                    }

                },60);

            "

            class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-24">

            <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-500">

                <h2 class="text-5xl font-black text-blue-500">

                    <span x-text="projects"></span>+

                </h2>

                <p class="mt-3 text-slate-400">

                    Projets réalisés

                </p>

            </div>

            <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-500">

                <h2 class="text-5xl font-black text-cyan-400">

                    <span x-text="skills"></span>+

                </h2>

                <p class="mt-3 text-slate-400">

                    Compétences

                </p>

            </div>

            <div class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 text-center hover:-translate-y-2 transition duration-500">

                <h2 class="text-5xl font-black text-emerald-400">

                    <span x-text="certifications"></span>+

                </h2>

                <p class="mt-3 text-slate-400">

                    Certifications

                </p>

            </div>

        </div>

    </div>

</section>