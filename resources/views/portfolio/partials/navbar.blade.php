<nav
    x-data="{ open:false }"
    class="fixed top-0 w-full z-50 bg-slate-950/95 backdrop-blur border-b border-slate-800">

    <div class="container mx-auto px-6">

        <div class="flex justify-between items-center py-5">

            {{-- LOGO --}}

            <div class="font-bold text-xl">

                {{ $profile->fullname ?? 'Portfolio' }}

            </div>

            {{-- MENU DESKTOP --}}

            <div class="hidden md:flex gap-8">

                <a
                    href="#about"
                    class="hover:text-blue-400 transition">

                    À propos

                </a>

                <a
                    href="#skills"
                    class="hover:text-blue-400 transition">

                    Compétences

                </a>

                <a
                    href="#experiences"
                    class="hover:text-blue-400 transition">

                    Expériences

                </a>

                <a
                    href="#projects"
                    class="hover:text-blue-400 transition">

                    Projets

                </a>

                <a
                    href="#formations"
                    class="hover:text-blue-400 transition">

                    Formations

                </a>

                <a
                    href="#contact"
                    class="hover:text-blue-400 transition">

                    Contact

                </a>

            </div>

            {{-- BOUTON MOBILE --}}

            <button
                @click="open=!open"
                class="md:hidden">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </button>

        </div>

        {{-- MENU MOBILE --}}

        <div
            x-show="open"
            x-transition
            class="md:hidden pb-6">

            <div class="flex flex-col gap-4">

                <a
                    href="#about"
                    @click="open=false"
                    class="hover:text-blue-400">

                    À propos

                </a>

                <a
                    href="#skills"
                    @click="open=false"
                    class="hover:text-blue-400">

                    Compétences

                </a>

                <a
                    href="#experiences"
                    @click="open=false"
                    class="hover:text-blue-400">

                    Expériences

                </a>

                <a
                    href="#projects"
                    @click="open=false"
                    class="hover:text-blue-400">

                    Projets

                </a>

                <a
                    href="#formations"
                    @click="open=false"
                    class="hover:text-blue-400">

                    Formations

                </a>

                <a
                    href="#contact"
                    @click="open=false"
                    class="hover:text-blue-400">

                    Contact

                </a>

            </div>

        </div>

    </div>

</nav>