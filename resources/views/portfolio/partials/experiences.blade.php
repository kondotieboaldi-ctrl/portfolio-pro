<section
    id="experiences"
    class="relative py-32 overflow-hidden">

    {{-- ==========================
        BACKGROUND
    =========================== --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-900"></div>

        <div
            class="absolute left-0 top-0 w-[500px] h-[500px] rounded-full bg-blue-600/10 blur-[170px]">
        </div>

        <div
            class="absolute right-0 bottom-0 w-[450px] h-[450px] rounded-full bg-violet-600/10 blur-[170px]">
        </div>

    </div>

    <div class="container mx-auto px-6">

        {{-- TITRE --}}

        <div
            class="max-w-3xl mx-auto text-center mb-24"
            data-aos="fade-up">

            <span
                class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-violet-500/10 border border-violet-500/30 text-violet-300 font-semibold mb-6">

                <i class="fas fa-briefcase"></i>

                Mon parcours

            </span>

            <h2
                class="text-4xl md:text-6xl font-black mb-8">

                Expériences Professionnelles

            </h2>

            <p
                class="text-lg leading-8 text-slate-400">

                Chaque expérience a renforcé mes compétences techniques,
                mon sens de l'organisation et ma capacité à concevoir
                des solutions adaptées aux besoins des entreprises.

            </p>

        </div>

        {{-- TIMELINE --}}

        <div class="relative max-w-6xl mx-auto">

            {{-- Ligne centrale --}}

            <div
                class="hidden lg:block absolute left-1/2 top-0 bottom-0 w-1
                -translate-x-1/2
                rounded-full
                bg-gradient-to-b
                from-blue-500
                via-cyan-400
                to-violet-500">
            </div>

            @foreach($experiences as $index => $experience)

                <div
                    class="relative mb-20">

                    {{-- Point central --}}

                    <div
                        class="hidden lg:flex absolute left-1/2 top-12
                        -translate-x-1/2
                        w-7 h-7
                        rounded-full
                        bg-gradient-to-r
                        from-blue-500
                        to-violet-500
                        border-4
                        border-slate-900
                        shadow-lg shadow-blue-500/40">
                    </div>

                    <div
                        class="grid lg:grid-cols-2 gap-12 items-center">

                        {{-- Alternance gauche / droite --}}

                        <div
                            class="{{ $index % 2 == 0 ? 'lg:order-1' : 'lg:order-2' }}"
                            data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">

                            <div
                                class="group bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 hover:border-violet-500 hover:-translate-y-2 transition-all duration-500">

                                                            <div class="flex items-start gap-6">

                                    @if($experience->image)

                                        <img
                                            src="{{ asset('storage/'.$experience->image) }}"
                                            alt="{{ $experience->company }}"
                                            class="w-24 h-24 rounded-2xl object-cover border border-slate-700 shadow-lg">

                                    @else

                                        <div
                                            class="w-24 h-24 rounded-2xl bg-gradient-to-r from-blue-600 to-violet-600 flex items-center justify-center text-4xl">

                                            <i class="fas fa-building"></i>

                                        </div>

                                    @endif

                                    <div class="flex-1">

                                        <div class="flex flex-wrap items-center gap-3">

                                            <h3
                                                class="text-2xl font-bold">

                                                {{ $experience->job_title }}

                                            </h3>

                                            @if($experience->current_job)

                                                <span
                                                    class="px-3 py-1 rounded-full bg-green-500/20 border border-green-500 text-green-400 text-xs font-semibold">

                                                    Poste actuel

                                                </span>

                                            @endif

                                        </div>

                                        <p
                                            class="text-lg text-violet-400 font-semibold mt-2">

                                            {{ $experience->company }}

                                        </p>

                                        <div
                                            class="flex flex-wrap gap-6 mt-3 text-slate-400">

                                            <span>

                                                <i class="fas fa-location-dot mr-2 text-blue-400"></i>

                                                {{ $experience->location }}

                                            </span>

                                            <span>

                                                <i class="fas fa-calendar mr-2 text-violet-400"></i>

                                                {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}

                                                -

                                                @if($experience->current_job)

                                                    Aujourd'hui

                                                @elseif($experience->end_date)

                                                    {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}

                                                @else

                                                    -

                                                @endif

                                            </span>

                                        </div>

                                    </div>

                                </div>

                                {{-- Description --}}

                                <div class="mt-8">

                                    <p
                                        class="leading-8 text-slate-300">

                                        {{ $experience->description }}

                                    </p>

                                </div>

                                {{-- Compétences utilisées --}}

                                <div class="mt-8">

                                    <h4
                                        class="font-semibold mb-4 text-blue-400">

                                        Technologies & Compétences

                                    </h4>

                                    <div
                                        class="flex flex-wrap gap-3">

                                        <span class="px-4 py-2 rounded-full bg-slate-800 border border-slate-700">

                                            Gestion de Stock

                                        </span>

                                        <span class="px-4 py-2 rounded-full bg-slate-800 border border-slate-700">

                                            Logistique

                                        </span>

                                        <span class="px-4 py-2 rounded-full bg-slate-800 border border-slate-700">

                                            Reporting

                                        </span>

                                        <span class="px-4 py-2 rounded-full bg-slate-800 border border-slate-700">

                                            Analyse

                                        </span>

                                        <span class="px-4 py-2 rounded-full bg-slate-800 border border-slate-700">

                                            Organisation

                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- Colonne vide pour l'alternance --}}

                        <div
                            class="{{ $index % 2 == 0 ? 'lg:order-2' : 'lg:order-1' }} hidden lg:block">

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Citation de fin --}}

        <div
            class="max-w-5xl mx-auto mt-24"
            data-aos="fade-up">

            <div
                class="rounded-3xl p-10 text-center border border-slate-800 bg-gradient-to-r from-blue-600/10 via-violet-600/10 to-cyan-500/10 backdrop-blur-xl">

                <i
                    class="fas fa-rocket text-5xl text-violet-400 mb-6">

                </i>

                <h3
                    class="text-3xl font-bold mb-6">

                    Une expérience tournée vers les résultats

                </h3>

                <p
                    class="text-lg leading-9 text-slate-300">

                    Au fil de mon parcours, j'ai développé une approche mêlant
                    analyse des données, organisation, logistique et développement
                    d'applications. Chaque mission a renforcé ma capacité à
                    optimiser les processus et à produire des solutions fiables
                    répondant aux besoins opérationnels.

                </p>

            </div>

        </div>

    </div>

</section>