<section
    id="contact"
    class="relative py-32 overflow-hidden">

    {{-- ==========================
        BACKGROUND
    =========================== --}}

    <div class="absolute inset-0 -z-20">

        <div class="absolute inset-0 bg-slate-950"></div>

        <div
            class="absolute top-0 left-0 w-[500px] h-[500px] rounded-full bg-blue-600/10 blur-[170px]">
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

                <i class="fas fa-paper-plane"></i>

                Contact

            </span>

            <h2
                class="text-4xl md:text-6xl font-black mb-8">

                Discutons de votre projet

            </h2>

            <p
                class="text-lg leading-8 text-slate-400">

                Vous recherchez un Data Analyst, un développeur Laravel,
                un spécialiste Power BI ou souhaitez simplement échanger
                autour d'un projet ? Je serai ravi de vous répondre.

            </p>

        </div>

        @if(session('success'))

            <div
                class="max-w-5xl mx-auto mb-10 rounded-2xl bg-green-600/20 border border-green-500 text-green-300 p-5">

                {{ session('success') }}

            </div>

        @endif

        <div
            class="grid lg:grid-cols-5 gap-10">

            {{-- ==========================
                INFORMATIONS
            =========================== --}}

            <div
                class="lg:col-span-2"
                data-aos="fade-right">

                <div
                    class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-[35px] p-8">

                    <h3
                        class="text-3xl font-bold mb-8">

                        Restons en contact

                    </h3>

                    <p
                        class="text-slate-400 leading-8 mb-10">

                        Je réponds généralement dans les 24 heures.
                        N'hésitez pas à me contacter pour un recrutement,
                        une mission freelance ou une collaboration.

                    </p>

                    {{-- Cartes coordonnées --}}

                    <div class="space-y-5">

                        <div class="flex items-center gap-5">

                            <div class="w-14 h-14 rounded-2xl bg-blue-600/20 flex items-center justify-center">

                                <i class="fas fa-envelope text-blue-400"></i>

                            </div>

                            <div>

                                <p class="text-slate-500 text-sm">

                                    Email

                                </p>

                                <h4 class="font-semibold">

                                    {{ $profile->email }}

                                </h4>

                            </div>

                        </div>

                        <div class="flex items-center gap-5">

                            <div class="w-14 h-14 rounded-2xl bg-violet-600/20 flex items-center justify-center">

                                <i class="fas fa-phone text-violet-400"></i>

                            </div>

                            <div>

                                <p class="text-slate-500 text-sm">

                                    Téléphone

                                </p>

                                <h4 class="font-semibold">

                                    {{ $profile->phone }}

                                </h4>

                            </div>

                        </div>

                        <div class="flex items-center gap-5">

                            <div class="w-14 h-14 rounded-2xl bg-cyan-600/20 flex items-center justify-center">

                                <i class="fas fa-user-tie text-cyan-400"></i>

                            </div>

                            <div>

                                <p class="text-slate-500 text-sm">

                                    Profil

                                </p>

                                <h4 class="font-semibold">

                                    {{ $profile->professional_title }}

                                </h4>

                            </div>

                        </div>

                    </div>

                    {{-- Réseaux sociaux --}}

                    <div class="flex gap-4 mt-10">
                    
                                            @if($profile->linkedin)

                            <a
                                href="{{ $profile->linkedin }}"
                                target="_blank"
                                class="w-14 h-14 rounded-2xl bg-slate-800 hover:bg-blue-600 transition flex items-center justify-center">

                                <i class="fab fa-linkedin-in text-xl"></i>

                            </a>

                        @endif

                        @if($profile->github)

                            <a
                                href="{{ $profile->github }}"
                                target="_blank"
                                class="w-14 h-14 rounded-2xl bg-slate-800 hover:bg-gray-700 transition flex items-center justify-center">

                                <i class="fab fa-github text-xl"></i>

                            </a>

                        @endif

                        @if($profile->facebook)

                            <a
                                href="{{ $profile->facebook }}"
                                target="_blank"
                                class="w-14 h-14 rounded-2xl bg-slate-800 hover:bg-blue-500 transition flex items-center justify-center">

                                <i class="fab fa-facebook-f text-xl"></i>

                            </a>

                        @endif

                    </div>

                </div>

            </div>

            {{-- ==========================
                FORMULAIRE
            =========================== --}}

            <div
                class="lg:col-span-3"
                data-aos="fade-left">

                <div
                    class="bg-slate-900/70 backdrop-blur-xl border border-slate-800 rounded-[35px] p-8">

                    @if ($errors->any())

                        <div
                            class="mb-8 rounded-2xl bg-red-500/20 border border-red-500 text-red-300 p-5">

                            <ul class="space-y-2">

                                @foreach($errors->all() as $error)

                                    <li>• {{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form
                        action="{{ route('contact.send') }}"
                        method="POST"
                        class="space-y-6">

                        @csrf

                        <div class="grid md:grid-cols-2 gap-6">

                            <div>

                                <label class="block mb-2 text-slate-300">

                                    Nom complet

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Votre nom"
                                    class="w-full rounded-2xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none px-5 py-4 transition">

                            </div>

                            <div>

                                <label class="block mb-2 text-slate-300">

                                    Adresse email

                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Votre email"
                                    class="w-full rounded-2xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none px-5 py-4 transition">

                            </div>

                        </div>

                        <div>

                            <label class="block mb-2 text-slate-300">

                                Sujet

                            </label>

                            <input
                                type="text"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="Objet de votre message"
                                class="w-full rounded-2xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none px-5 py-4 transition">

                        </div>

                        <div>

                            <label class="block mb-2 text-slate-300">

                                Votre message

                            </label>

                            <textarea
                                name="message"
                                rows="7"
                                placeholder="Décrivez votre projet ou votre demande..."
                                class="w-full rounded-2xl bg-slate-800 border border-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none px-5 py-4 transition resize-none">{{ old('message') }}</textarea>

                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-6">

                            <p class="text-slate-400 text-sm">

                                <i class="fas fa-clock mr-2 text-blue-400"></i>

                                Réponse généralement sous 24 heures.

                            </p>

                            <button
                                type="submit"
                                class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-600 via-cyan-500 to-violet-600 hover:scale-105 transition-all duration-300 shadow-xl">

                                <i class="fas fa-paper-plane"></i>

                                Envoyer le message

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>