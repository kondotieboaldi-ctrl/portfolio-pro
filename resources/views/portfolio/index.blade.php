@extends('portfolio.layout')

@section('content')

@include('portfolio.partials.navbar')

@include('portfolio.partials.hero')

@include('portfolio.partials.about')

@include('portfolio.partials.skills')

@include('portfolio.partials.experiences')

@include('portfolio.partials.projects')
@include('portfolio.partials.certifications')
{{-- @include('portfolio.partials.diplomas') --}}
@include('portfolio.partials.contact')
@include('portfolio.partials.footer')

@endsection


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>

        {{ $profile->fullname ?? 'Portfolio' }}

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-slate-950 text-white">

<header class="border-b border-slate-800">

    <div class="container mx-auto px-6 py-4">

        <h1 class="text-2xl font-bold">

            {{ $profile->fullname ?? 'Portfolio' }}

        </h1>

    </div>

</header>

<section class="container mx-auto px-6 py-20">

    <div class="grid md:grid-cols-2 gap-10 items-center">

        <div>

            <h2 class="text-5xl font-bold mb-4">

                {{ $profile->professional_title ?? '' }}

            </h2>

            <p class="text-slate-400">

                {{ $profile->about_me ?? '' }}

            </p>

        </div>

        <div>

            @if($profile && $profile->photo)

                <img
                    src="{{ asset('storage/'.$profile->photo) }}"
                    class="rounded-3xl">

            @endif

        </div>

    </div>

</section>

</body>
</html>