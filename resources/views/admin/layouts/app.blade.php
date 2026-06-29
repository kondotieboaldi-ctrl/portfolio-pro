<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        Portfolio Admin

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body
    class="bg-slate-950 text-slate-200 overflow-hidden">

    <div
        class="h-screen flex">

        {{-- SIDEBAR --}}

        @include('admin.partials.sidebar')

        {{-- CONTENU --}}

        <div
            class="flex-1 flex flex-col overflow-hidden">

            {{-- NAVBAR --}}

            @include('admin.partials.navbar')

            {{-- CONTENU PRINCIPAL --}}

            <main
                class="flex-1 overflow-y-auto">

                <div
                    class="p-8">

                    @yield('content')

                </div>

            </main>

            {{-- FOOTER --}}

            @include('admin.partials.footer')

        </div>

    </div>

    @stack('scripts')

</body>

</html>