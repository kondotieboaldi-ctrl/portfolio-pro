<section id="about" class="relative py-32 overflow-hidden">

    {{-- ==========================
    BACKGROUND
    =========================== --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-900"></div>

        <div class="absolute -left-40 top-20 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[160px]">
        </div>

        <div class="absolute -right-32 bottom-0 w-[450px] h-[450px] bg-cyan-500/10 rounded-full blur-[160px]">
        </div>

    </div>

    <div class="container mx-auto px-6">

        {{-- TITRE --}}

        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">

            <span
                class="inline-block px-5 py-2 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 font-semibold tracking-wider uppercase mb-6">

                Qui suis-je ?

            </span>

            <h2 class="text-4xl md:text-6xl font-black mb-8">

                À propos de moi

            </h2>

            <p class="text-slate-400 text-lg leading-8">

                Passionné par la Business Intelligence, l'analyse des données
                et le développement web, je conçois des solutions qui
                transforment les données en outils d'aide à la décision.

            </p>

        </div>

        {{-- ==========================
        CONTENU
        =========================== --}}

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            {{-- PHOTO --}}

            <div class="relative flex justify-center" data-aos="fade-right">

                <div class="absolute w-[320px] h-[320px] rounded-full bg-blue-500/20 blur-[110px]">
                </div>

                @if($profile && $profile->photo)

                    <img src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->fullname }}" class="relative z-10
                            w-80
                            h-80
                            rounded-3xl
                            object-cover
                            border-4
                            border-slate-800
                            shadow-[0_0_60px_rgba(59,130,246,.25)]
                            hover:scale-105
                            transition
                            duration-700">

                @endif

            </div>

            {{-- TEXTE --}}

            <div data-aos="fade-left">

                <div class="bg-slate-900/70 backdrop-blur-xl rounded-3xl border border-slate-800 p-10">

                    <span class="inline-flex items-center gap-2 text-blue-400 font-semibold mb-6">

                        <i class="fas fa-user-circle"></i>

                        Présentation

                    </span>

                    <h3 class="text-3xl font-bold mb-8">

                        {{ $profile->fullname }}

                    </h3>

                    <p class="text-slate-300 leading-9 mb-6">

                        Je suis spécialisé dans la conception de tableaux de bord,
                        l'analyse des données, la Business Intelligence et
                        le développement d'applications web modernes.

                    </p>

                    <p class="text-slate-300 leading-9 mb-6">

                        Mon parcours en Génie Logiciel m'a permis de développer
                        des compétences solides en Power BI, SQL, PHP,
                        Laravel et MySQL afin de concevoir des solutions
                        performantes et adaptées aux besoins des entreprises.

                    </p>

                    <p class="text-slate-300 leading-9">

                        Aujourd'hui, j'occupe le poste de
                        <strong class="text-blue-400">

                            Magasinier Principal HTC

                        </strong>

                        où je participe à la gestion des stocks,
                        à la logistique nationale et à
                        l'amélioration du suivi des équipements.

                    </p>

                </div>

            </div>

        </div>

        {{-- ==========================
        INFORMATIONS
        =========================== --}}

        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mt-20">

            {{-- Email --}}
            <div data-aos="zoom-in" data-aos-delay="100"
                class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-7 hover:border-blue-500 hover:-translate-y-2 transition duration-500">

                <div class="w-14 h-14 rounded-2xl bg-blue-600/20 flex items-center justify-center mb-5">

                    <i class="fas fa-envelope text-blue-400 text-2xl"></i>

                </div>

                <p class="text-slate-400 text-sm uppercase tracking-wider">

                    Email

                </p>

                <h3 class="mt-2 font-semibold break-all">

                    {{ $profile->email }}

                </h3>

            </div>

            {{-- Téléphone --}}
            <div data-aos="zoom-in" data-aos-delay="200"
                class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-7 hover:border-blue-500 hover:-translate-y-2 transition duration-500">

                <div class="w-14 h-14 rounded-2xl bg-green-600/20 flex items-center justify-center mb-5">

                    <i class="fas fa-phone text-green-400 text-2xl"></i>

                </div>

                <p class="text-slate-400 text-sm uppercase tracking-wider">

                    Téléphone

                </p>

                <h3 class="mt-2 font-semibold">

                    {{ $profile->phone }}

                </h3>

            </div>

            {{-- Fonction --}}
            <div data-aos="zoom-in" data-aos-delay="300"
                class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-7 hover:border-blue-500 hover:-translate-y-2 transition duration-500">

                <div class="w-14 h-14 rounded-2xl bg-cyan-600/20 flex items-center justify-center mb-5">

                    <i class="fas fa-briefcase text-cyan-400 text-2xl"></i>

                </div>

                <p class="text-slate-400 text-sm uppercase tracking-wider">

                    Fonction

                </p>

                <h3 class="mt-2 font-semibold">

                    {{ $profile->professional_title }}

                </h3>

            </div>

            {{-- Objectif --}}
            <div data-aos="zoom-in" data-aos-delay="400"
                class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-7 hover:border-blue-500 hover:-translate-y-2 transition duration-500">

                <div class="w-14 h-14 rounded-2xl bg-amber-600/20 flex items-center justify-center mb-5">

                    <i class="fas fa-bullseye text-amber-400 text-2xl"></i>

                </div>

                <p class="text-slate-400 text-sm uppercase tracking-wider">

                    Objectif

                </p>

                <h3 class="mt-2 font-semibold">

                    Business Intelligence & Data Analytics

                </h3>

            </div>

        </div>

        {{-- ==========================
        MES EXPERTISES
        =========================== --}}

        <div class="mt-24" data-aos="fade-up">

            <div class="text-center mb-12">

                <h3 class="text-3xl font-bold">

                    Mes domaines d'expertise

                </h3>

                <p class="text-slate-400 mt-4">

                    Des compétences techniques au service de la performance des entreprises.

                </p>

            </div>

            <div class="flex flex-wrap justify-center gap-5">

                @php

                    $expertises = [

                        ['📊', 'Power BI'],

                        ['📈', 'Business Intelligence'],

                        ['🗄️', 'SQL & MySQL'],

                        ['⚙️', 'Laravel'],

                        ['💻', 'PHP'],

                        ['🌐', 'Développement Web'],

                        ['📋', 'Gestion de Stock'],

                        ['📦', 'Logistique'],

                        ['📉', 'Data Analysis'],

                        ['📑', 'Reporting']

                    ];

                @endphp

                @foreach($expertises as $expertise)

                    <div
                        class="px-6 py-4 rounded-2xl bg-slate-900 border border-slate-800 hover:border-blue-500 hover:bg-blue-500/10 transition duration-300">

                        <span class="text-xl">

                            {{ $expertise[0] }}

                        </span>

                        <span class="ml-2 font-medium">

                            {{ $expertise[1] }}

                        </span>

                    </div>

                @endforeach

            </div>

        </div>

        {{-- Citation --}}

        <div class="mt-24" data-aos="fade-up">

            <div
                class="max-w-4xl mx-auto rounded-3xl border border-slate-800 bg-gradient-to-r from-blue-600/10 to-cyan-500/10 backdrop-blur-xl p-10 text-center">

                <i class="fas fa-quote-left text-4xl text-blue-400 mb-6"></i>

                <p class="text-xl md:text-2xl leading-10 text-slate-200 italic">

                    "Transformer les données en décisions stratégiques et développer des solutions numériques
                    performantes est au cœur de mon engagement professionnel."

                </p>

                <div class="mt-8">

                    <h4 class="font-bold text-lg">

                        {{ $profile->fullname }}

                    </h4>

                    <p class="text-blue-400">

                        {{ $profile->professional_title }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>