<header
    x-data="{

        profile:false,

        time:'',

        date:'',

        updateClock(){

            const now=new Date();

            this.time=now.toLocaleTimeString('fr-FR');

            this.date=now.toLocaleDateString(
                'fr-FR',
                {
                    weekday:'long',
                    day:'numeric',
                    month:'long',
                    year:'numeric'
                }
            );

        }

    }"

    x-init="

        updateClock();

        setInterval(()=>updateClock(),1000);

    "

    class="sticky top-0 z-40 bg-slate-900/95 backdrop-blur-xl border-b border-slate-800">

    <div
        class="px-8 h-20 flex items-center justify-between">

        {{-- =====================
            GAUCHE
        ====================== --}}

        <div
            class="flex items-center gap-8">

            <div>

                <h1
                    class="text-2xl font-bold">

                    Administration

                </h1>

                <p
                    class="text-sm text-slate-400 capitalize"
                    x-text="date">

                </p>

            </div>

            {{-- HORLOGE --}}

            <div
                class="hidden xl:flex items-center gap-3 bg-slate-800 rounded-xl px-5 py-3">

                <i
                    class="fas fa-clock text-blue-500">

                </i>

                <span
                    class="font-semibold tracking-widest"
                    x-text="time">

                </span>

            </div>

        </div>

        {{-- =====================
            CENTRE
        ====================== --}}

        <div
            class="hidden lg:block flex-1 max-w-xl mx-10">

            <div
                class="relative">

                <input

                    type="text"

                    placeholder="Rechercher dans l'administration..."

                    class="w-full bg-slate-800 border border-slate-700 rounded-2xl py-3 pl-12 pr-5 focus:outline-none focus:border-blue-500 transition">

                <i

                    class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-slate-500">

                </i>

            </div>

        </div>

        {{-- =====================
            DROITE
        ====================== --}}

        <div
            class="flex items-center gap-4">

            {{-- PORTFOLIO --}}

            <a

                href="/"

                target="_blank"

                class="hidden md:flex w-12 h-12 rounded-xl bg-slate-800 hover:bg-blue-600 transition items-center justify-center">

                <i class="fas fa-globe"></i>

            </a>

            {{-- NOTIFICATIONS --}}

            <button

                class="relative w-12 h-12 rounded-xl bg-slate-800 hover:bg-slate-700 transition">

                <i
                    class="fas fa-bell">

                </i>

                <span

                    class="absolute top-3 right-3 w-2.5 h-2.5 rounded-full bg-red-500">

                </span>

            </button>

            {{-- PROFIL --}}

            <div
                class="relative">

                <button

                    @click="profile=!profile"

                    class="flex items-center gap-3 bg-slate-800 hover:bg-slate-700 rounded-2xl pl-3 pr-4 py-2 transition">
                    
                    
                    <div
                        class="w-11 h-11 rounded-full bg-blue-600 flex items-center justify-center font-bold text-lg">

                        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                    </div>

                    <div
                        class="hidden lg:block text-left">

                        <p
                            class="font-semibold leading-none">

                            {{ auth()->user()->name }}

                        </p>

                        <small
                            class="text-slate-400">

                            Administrateur

                        </small>

                    </div>

                    <i
                        class="fas fa-chevron-down text-xs text-slate-400">

                    </i>

                </button>

                {{-- MENU UTILISATEUR --}}

                <div

                    x-show="profile"

                    @click.outside="profile=false"

                    x-transition

                    class="absolute right-0 mt-3 w-72 bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl overflow-hidden">

                    {{-- HEADER --}}

                    <div
                        class="p-5 border-b border-slate-800">

                        <div
                            class="flex items-center gap-4">

                            <div
                                class="w-14 h-14 rounded-full bg-blue-600 flex items-center justify-center text-xl font-bold">

                                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                            </div>

                            <div>

                                <h3
                                    class="font-bold">

                                    {{ auth()->user()->name }}

                                </h3>

                                <p
                                    class="text-sm text-slate-400">

                                    {{ auth()->user()->email }}

                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- MENU --}}

                    <div
                        class="p-2">

                        <a

                            href="{{ route('admin.profile.edit') }}"

                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

                            <i
                                class="fas fa-user w-5 text-center text-blue-400">

                            </i>

                            Mon profil

                        </a>

                        <a

                            href="/"

                            target="_blank"

                            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

                            <i
                                class="fas fa-globe w-5 text-center text-green-400">

                            </i>

                            Voir le Portfolio

                        </a>

                    </div>

                    {{-- FOOTER --}}

                    <div
                        class="border-t border-slate-800 p-2">

                        <form
                            method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <button

                                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-600 transition">

                                <i
                                    class="fas fa-right-from-bracket w-5 text-center">

                                </i>

                                Déconnexion

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>