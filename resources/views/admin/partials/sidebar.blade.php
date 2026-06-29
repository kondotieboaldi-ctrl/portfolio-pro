<aside
    x-data="{ open:true }"
    :class="open ? 'w-72' : 'w-24'"
    class="h-screen bg-slate-900 border-r border-slate-800 transition-all duration-300 flex flex-col shrink-0">

    {{-- =========================
         HEADER
    ========================== --}}

    <div class="p-6 border-b border-slate-800">

        <div class="flex items-center justify-between">

            <div
                x-show="open"
                x-transition>

                <h2 class="text-2xl font-bold text-blue-500">

                    Portfolio

                </h2>

                <p class="text-sm text-slate-400">

                    Administration

                </p>

            </div>

            <button
                @click="open=!open"
                class="w-10 h-10 rounded-lg hover:bg-slate-800 transition">

                <i
                    class="fas"
                    :class="open ? 'fa-angle-left' : 'fa-angle-right'"></i>

            </button>

        </div>

        {{-- PROFIL --}}

        <div
            class="mt-8 flex items-center gap-4"
            x-show="open"
            x-transition>

            <div>

                @php

                    $profile=\App\Models\Profile::first();

                @endphp

                @if($profile && $profile->photo)

                    <img
                        src="{{ asset('storage/'.$profile->photo) }}"
                        class="w-16 h-16 rounded-full object-cover border-2 border-blue-500">

                @else

                    <div
                        class="w-16 h-16 rounded-full bg-blue-600 flex items-center justify-center text-2xl">

                        <i class="fas fa-user"></i>

                    </div>

                @endif

            </div>

            <div>

                <h3 class="font-bold">

                    {{ auth()->user()->name }}

                </h3>

                <p class="text-xs text-slate-400">

                    Administrateur

                </p>

            </div>

        </div>

    </div>

    {{-- =========================
          MENU
    ========================== --}}

    <nav
        class="flex-1 overflow-y-auto px-4 py-6 space-y-2">

        @php

            $menus=[

                [
                    'route'=>'admin.dashboard',
                    'icon'=>'fa-chart-line',
                    'title'=>'Dashboard'
                ],

                [
                    'route'=>'admin.profile.edit',
                    'icon'=>'fa-user',
                    'title'=>'Profil'
                ],

                [
                    'route'=>'skills.index',
                    'icon'=>'fa-brain',
                    'title'=>'Compétences'
                ],

                [
                    'route'=>'experiences.index',
                    'icon'=>'fa-briefcase',
                    'title'=>'Expériences'
                ],

                [
                    'route'=>'projects.index',
                    'icon'=>'fa-code',
                    'title'=>'Projets'
                ],

                [
                    'route'=>'certifications.index',
                    'icon'=>'fa-award',
                    'title'=>'Certifications'
                ],

                [
                    'route'=>'diplomas.index',
                    'icon'=>'fa-graduation-cap',
                    'title'=>'Diplômes'
                ],

                [
                    'route'=>'contacts.index',
                    'icon'=>'fa-envelope',
                    'title'=>'Messages'
                ]

            ];

        @endphp

        @foreach($menus as $menu)

            <a
                href="{{ route($menu['route']) }}"

                class="flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300

                {{ request()->routeIs(str_replace('.index','.*',$menu['route'])) || request()->routeIs($menu['route']) ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'hover:bg-slate-800 text-slate-300' }}">

                <i
                    class="fas {{ $menu['icon'] }} w-6 text-center text-lg"></i>

                <span
                    x-show="open"
                    x-transition>

                    {{ $menu['title'] }}

                </span>

            </a>

        @endforeach

    </nav>

    {{-- =========================
          FOOTER
    ========================== --}}

    <div
        class="border-t border-slate-800 p-5">

        <div
            x-show="open"
            x-transition>

            <p
                class="text-xs text-center text-slate-500">

                Portfolio Admin

            </p>

            <p
                class="text-xs text-center text-slate-600 mt-1">

                Version 2.0

            </p>

        </div>

    </div>

</aside>