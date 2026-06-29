<section
    id="formations"
    class="relative py-32 overflow-hidden">

    {{-- ==========================
        BACKGROUND
    =========================== --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-900"></div>

        <div
            class="absolute top-0 left-0 w-[550px] h-[550px] rounded-full bg-blue-600/10 blur-[170px]">
        </div>

        <div
            class="absolute bottom-0 right-0 w-[500px] h-[500px] rounded-full bg-violet-600/10 blur-[170px]">
        </div>

    </div>

    <div class="container mx-auto px-6">

        {{-- TITRE --}}

        <div
            class="max-w-3xl mx-auto text-center mb-20"
            data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-violet-500/10 border border-violet-500/30 text-violet-300 font-semibold mb-6">

                <i class="fas fa-user-graduate"></i>

                Parcours Académique

            </span>

            <h2
                class="text-4xl md:text-6xl font-black mb-8">

                Formations & Certifications

            </h2>

            <p
                class="text-lg leading-8 text-slate-400">

                Mon parcours de formation reflète mon engagement dans
                l'apprentissage continu afin de développer des compétences
                solides en développement logiciel, Business Intelligence
                et analyse de données.

            </p>

        </div>

        <div
            class="grid xl:grid-cols-2 gap-10">

            {{-- ==========================
                CERTIFICATIONS
            =========================== --}}

            <div>

                <div
                    class="flex items-center gap-4 mb-10">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-blue-600 to-violet-600 flex items-center justify-center">

                        <i class="fas fa-award text-2xl text-white"></i>

                    </div>

                    <div>

                        <h3
                            class="text-3xl font-bold">

                            Certifications

                        </h3>

                        <p
                            class="text-slate-400">

                            Formations professionnelles validées

                        </p>

                    </div>

                </div>

                @forelse($certifications as $certification)

                    <div
                        data-aos="fade-right"
                        class="group bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 mb-8 hover:border-violet-500 hover:-translate-y-2 transition-all duration-500">

                        <div
                            class="flex justify-between items-start gap-5">

                            <div>

                                <h4
                                    class="text-2xl font-bold mb-3">

                                    {{ $certification->title }}

                                </h4>

                                <p
                                    class="text-violet-400 font-semibold">

                                    {{ $certification->organization }}

                                </p>

                            </div>

                            <div
                                class="w-14 h-14 rounded-2xl bg-blue-600/20 flex items-center justify-center">

                                <i class="fas fa-certificate text-blue-400 text-xl"></i>

                            </div>

                        </div>

                        <div
                            class="flex items-center gap-3 text-slate-400 mt-6 mb-6">

                            <i class="fas fa-calendar-alt"></i>

                            {{ \Carbon\Carbon::parse($certification->obtained_at)->format('d F Y') }}

                        </div>

                                                @if($certification->certificate_file)

                            <a
                                href="{{ asset('storage/'.$certification->certificate_file) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-5 py-3 rounded-2xl bg-gradient-to-r from-blue-600 to-violet-600 hover:scale-105 transition duration-300">

                                <i class="fas fa-file-pdf"></i>

                                Voir le certificat

                            </a>

                        @endif

                    </div>

                @empty

                    <div
                        class="bg-slate-900 rounded-3xl p-8 border border-slate-800 text-center text-slate-400">

                        <i class="fas fa-award text-5xl mb-5 text-slate-600"></i>

                        <p>

                            Aucune certification disponible.

                        </p>

                    </div>

                @endforelse

            </div>

            {{-- ==========================
                DIPLOMES
            =========================== --}}

            <div>

                <div
                    class="flex items-center gap-4 mb-10">

                    <div
                        class="w-16 h-16 rounded-2xl bg-gradient-to-r from-violet-600 to-blue-600 flex items-center justify-center">

                        <i class="fas fa-user-graduate text-2xl text-white"></i>

                    </div>

                    <div>

                        <h3
                            class="text-3xl font-bold">

                            Diplômes

                        </h3>

                        <p
                            class="text-slate-400">

                            Parcours académique

                        </p>

                    </div>

                </div>

                @forelse($diplomas as $diploma)

                    <div
                        data-aos="fade-left"
                        class="group bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 mb-8 hover:border-blue-500 hover:-translate-y-2 transition-all duration-500">

                        <div
                            class="flex justify-between items-start gap-5">

                            <div>

                                <h4
                                    class="text-2xl font-bold mb-3">

                                    {{ $diploma->title }}

                                </h4>

                                <p
                                    class="text-blue-400 font-semibold">

                                    {{ $diploma->school }}

                                </p>

                            </div>

                            <div
                                class="w-14 h-14 rounded-2xl bg-violet-600/20 flex items-center justify-center">

                                <i class="fas fa-graduation-cap text-violet-400 text-xl"></i>

                            </div>

                        </div>

                        <div
                            class="flex items-center gap-3 text-slate-400 mt-6 mb-6">

                            <i class="fas fa-calendar-alt"></i>

                            {{ \Carbon\Carbon::parse($diploma->obtained_at)->format('d F Y') }}

                        </div>

                        @if($diploma->diploma_file)

                            <a
                                href="{{ asset('storage/'.$diploma->diploma_file) }}"
                                target="_blank"
                                class="inline-flex items-center gap-3 px-5 py-3 rounded-2xl bg-gradient-to-r from-violet-600 to-blue-600 hover:scale-105 transition duration-300">

                                <i class="fas fa-file-pdf"></i>

                                Voir le diplôme

                            </a>

                        @endif

                    </div>

                @empty

                    <div
                        class="bg-slate-900 rounded-3xl p-8 border border-slate-800 text-center text-slate-400">

                        <i class="fas fa-user-graduate text-5xl mb-5 text-slate-600"></i>

                        <p>

                            Aucun diplôme enregistré.

                        </p>

                    </div>

                @endforelse

            </div>

        </div>

        {{-- ==========================
            CITATION
        =========================== --}}

        <div
            class="mt-24"
            data-aos="fade-up">

            <div
                class="max-w-5xl mx-auto rounded-[35px] border border-slate-800 bg-gradient-to-r from-blue-600/10 via-violet-600/10 to-cyan-500/10 backdrop-blur-xl p-12 text-center">

                <i
                    class="fas fa-book-open text-5xl text-violet-400 mb-6">
                </i>

                <h3
                    class="text-3xl font-black mb-6">

                    Apprendre, évoluer, innover

                </h3>

                <p
                    class="text-lg leading-9 text-slate-300 max-w-3xl mx-auto">

                    Je considère la formation comme un investissement permanent.
                    Chaque certification et chaque diplôme renforcent ma capacité
                    à concevoir des solutions performantes, modernes et adaptées
                    aux besoins des entreprises.

                </p>

            </div>

        </div>

    </div>

</section>