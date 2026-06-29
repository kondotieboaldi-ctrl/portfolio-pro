<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>

        {{ $profile->fullname ?? 'Portfolio' }}

    </title>

    <meta name="description" content="{{ $profile->professional_title ?? '' }}">

    <meta name="author" content="{{ $profile->fullname ?? '' }}">

    <meta name="keywords" content="Power BI, Laravel, PHP, SQL, Data Analyst, Business Intelligence, Web Developer">

    <meta name="robots" content="index,follow">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }
    </style>

</head>

<body class="bg-slate-950 text-white">

    {{-- PRELOADER --}}

    <div x-data="{ loading:true }" x-init="
        window.addEventListener('load', () => {
            setTimeout(() => loading=false,700);
        });
    " x-show="loading" x-transition:leave="transition ease-in-out duration-700" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-[99999]
           bg-slate-950
           flex
           flex-col
           items-center
           justify-center">

        <div class="w-24
               h-24
               rounded-full
               border-4
               border-blue-500
               border-t-transparent
               animate-spin">

        </div>

        <h1 class="mt-10
               text-4xl
               font-black">

            {{ $profile->fullname ?? 'Portfolio' }}

        </h1>

        <p class="mt-3
               text-blue-400">

            {{ $profile->professional_title ?? '' }}

        </p>

        <div class="mt-10
               flex
               items-center
               gap-2">

            <span class="w-2 h-2 rounded-full bg-blue-500 animate-bounce"></span>

            <span class="w-2 h-2 rounded-full bg-violet-500 animate-bounce [animation-delay:0.2s]"></span>

            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-bounce [animation-delay:0.4s]"></span>

        </div>

    </div>

    {{-- Barre de progression --}}

    <div x-data="{ width: 0 }" x-init="
        window.addEventListener('scroll', () => {

            const height =
                document.documentElement.scrollHeight -
                document.documentElement.clientHeight;

            width = (window.scrollY / height) * 100;

        });
    " class="fixed top-0 left-0 w-full h-1 z-[9999]">

        <div class="h-full bg-gradient-to-r from-blue-500 via-cyan-400 to-violet-500 transition-all duration-75"
            :style="'width:'+width+'%'">

        </div>

    </div>

    @yield('content')

    {{-- Bouton Retour en haut --}}

    <div x-data="{ show:false }" x-init="
        window.addEventListener('scroll', () => {
            show = window.scrollY > 300;
        });
    " x-show="show" x-transition.opacity class="fixed bottom-8 right-8 z-50" style="display:none;">

        <button @click="window.scrollTo({ top: 0, behavior: 'smooth' })" class="
            w-14
            h-14
            rounded-full
            bg-gradient-to-r
            from-blue-600
            to-violet-600
            shadow-xl
            hover:scale-110
            hover:shadow-2xl
            transition-all
            duration-300
            flex
            items-center
            animate-pulse
            hover:animate-none
            justify-center">

            <i class="fas fa-arrow-up text-white text-lg"></i>

        </button>

    </div>

</body>

</html>