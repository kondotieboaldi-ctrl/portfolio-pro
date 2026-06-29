<footer
    class="relative overflow-hidden pt-28 pb-10 border-t border-slate-800">

    {{-- Background --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-950"></div>

        <div
            class="absolute left-0 top-0 w-[450px] h-[450px] rounded-full bg-blue-600/10 blur-[170px]">
        </div>

        <div
            class="absolute right-0 bottom-0 w-[450px] h-[450px] rounded-full bg-violet-600/10 blur-[170px]">
        </div>

    </div>

    <div class="container mx-auto px-6">

        {{-- ==========================
            CALL TO ACTION
        =========================== --}}

        <div
            class="max-w-6xl mx-auto mb-24"
            data-aos="zoom-in">

            <div
                class="rounded-[35px] bg-gradient-to-r from-blue-600/15 via-violet-600/15 to-cyan-500/15 border border-slate-800 backdrop-blur-xl p-12 text-center">

                <span
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-600/20 border border-blue-500/30 text-blue-300 mb-6">

                    <i class="fas fa-handshake"></i>

                    Collaboration

                </span>

                <h2
                    class="text-4xl md:text-5xl font-black mb-6">

                    Prêt à collaborer ?

                </h2>

                <p
                    class="text-lg text-slate-300 leading-9 max-w-3xl mx-auto mb-10">

                    Que vous soyez une entreprise, un recruteur ou un particulier,
                    je serai ravi d'échanger avec vous afin de transformer vos idées
                    en solutions concrètes.

                </p>

                <a
                    href="#contact"
                    class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 via-cyan-500 to-violet-600 hover:scale-105 transition duration-300 shadow-xl">

                    <i class="fas fa-paper-plane"></i>

                    Me contacter

                </a>

            </div>

        </div>

        {{-- ==========================
            FOOTER
        =========================== --}}

        <div
            class="grid lg:grid-cols-4 gap-12">

            {{-- Présentation --}}

            <div>

                <h3
                    class="text-3xl font-black mb-5">

                    {{ $profile->fullname }}

                </h3>

                <p
                    class="text-violet-400 font-semibold mb-5">

                    {{ $profile->professional_title }}

                </p>

                <p
                    class="text-slate-400 leading-8">

                    Passionné par l'analyse des données,
                    la Business Intelligence et le développement web,
                    je conçois des solutions performantes,
                    intuitives et orientées résultats.

                </p>

            </div>

            {{-- Navigation --}}

            <div>

                <h4
                    class="text-xl font-bold mb-6">

                    Navigation

                </h4>

                <ul class="space-y-4">

                    <li>

                        <a
                            href="#hero"
                            class="hover:text-blue-400 transition">

                            Accueil

                        </a>

                    </li>

                    <li>

                        <a
                            href="#about"
                            class="hover:text-blue-400 transition">

                            À propos

                        </a>

                    </li>

                    <li>

                        <a
                            href="#skills"
                            class="hover:text-blue-400 transition">

                            Compétences

                        </a>

                    </li>

                    <li>

                        <a
                            href="#projects"
                            class="hover:text-blue-400 transition">

                            Projets

                        </a>

                    </li>

                    <li>

                        <a
                            href="#contact"
                            class="hover:text-blue-400 transition">

                            Contact

                        </a>

                    </li>

                </ul>

            </div>

                        {{-- Contact --}}

            <div>

                <h4
                    class="text-xl font-bold mb-6">

                    Contact

                </h4>

                <div class="space-y-5">

                    @if($profile->email)

                        <div class="flex items-start gap-3">

                            <i class="fas fa-envelope text-blue-400 mt-1"></i>

                            <div>

                                <p class="text-slate-500 text-sm">

                                    Email

                                </p>

                                <a
                                    href="mailto:{{ $profile->email }}"
                                    class="hover:text-blue-400 transition break-all">

                                    {{ $profile->email }}

                                </a>

                            </div>

                        </div>

                    @endif

                    @if($profile->phone)

                        <div class="flex items-start gap-3">

                            <i class="fas fa-phone text-violet-400 mt-1"></i>

                            <div>

                                <p class="text-slate-500 text-sm">

                                    Téléphone

                                </p>

                                <a
                                    href="tel:{{ $profile->phone }}"
                                    class="hover:text-violet-400 transition">

                                    {{ $profile->phone }}

                                </a>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

            {{-- Réseaux sociaux --}}

            <div>

                <h4
                    class="text-xl font-bold mb-6">

                    Suivez-moi

                </h4>

                <div class="flex flex-wrap gap-4">

                    @if($profile->linkedin)

                        <a
                            href="{{ $profile->linkedin }}"
                            target="_blank"
                            class="w-14 h-14 rounded-2xl bg-slate-800 hover:bg-blue-600 transition-all duration-300 flex items-center justify-center">

                            <i class="fab fa-linkedin-in text-xl"></i>

                        </a>

                    @endif

                    @if($profile->github)

                        <a
                            href="{{ $profile->github }}"
                            target="_blank"
                            class="w-14 h-14 rounded-2xl bg-slate-800 hover:bg-gray-700 transition-all duration-300 flex items-center justify-center">

                            <i class="fab fa-github text-xl"></i>

                        </a>

                    @endif

                    @if($profile->facebook)

                        <a
                            href="{{ $profile->facebook }}"
                            target="_blank"
                            class="w-14 h-14 rounded-2xl bg-slate-800 hover:bg-blue-500 transition-all duration-300 flex items-center justify-center">

                            <i class="fab fa-facebook-f text-xl"></i>

                        </a>

                    @endif

                </div>

                <p
                    class="text-slate-400 leading-7 mt-8">

                    Restons connectés pour partager des idées,
                    découvrir de nouvelles opportunités et construire
                    ensemble des solutions innovantes.

                </p>

            </div>

        </div>

        {{-- Séparateur --}}

        <div
            class="border-t border-slate-800 mt-20 pt-8">

            <div
                class="flex flex-col lg:flex-row justify-between items-center gap-6">

                <div
                    class="text-slate-500 text-center lg:text-left">

                    © {{ date('Y') }}

                    <span class="font-semibold text-slate-300">

                        {{ $profile->fullname }}

                    </span>

                    • Tous droits réservés.

                </div>

                <div
                    class="flex flex-wrap justify-center gap-6 text-slate-500 text-sm">

                    <span>

                        <i class="fab fa-laravel text-red-500 mr-2"></i>

                        Laravel

                    </span>

                    <span>

                        <i class="fas fa-wind text-cyan-400 mr-2"></i>

                        Tailwind CSS

                    </span>

                    <span>

                        <i class="fas fa-chart-bar text-yellow-400 mr-2"></i>

                        Power BI

                    </span>

                    <span>

                        <i class="fas fa-database text-green-400 mr-2"></i>

                        SQL

                    </span>

                </div>

            </div>

        </div>

    </div>

</footer>