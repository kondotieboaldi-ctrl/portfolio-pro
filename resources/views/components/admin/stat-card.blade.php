@props([
    'title',
    'value',
    'icon',
    'color' => 'blue'
])

@php

$colors = [

    'blue' => 'text-blue-500 bg-blue-500/10',

    'green' => 'text-green-500 bg-green-500/10',

    'red' => 'text-red-500 bg-red-500/10',

    'yellow' => 'text-yellow-500 bg-yellow-500/10',

    'purple' => 'text-purple-500 bg-purple-500/10',

    'orange' => 'text-orange-500 bg-orange-500/10',

];

@endphp

<div
    class="bg-slate-900 rounded-2xl border border-slate-800 p-6 hover:border-blue-500 hover:-translate-y-1 transition duration-300">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-slate-400 text-sm">

                {{ $title }}

            </p>

            <h2 class="text-4xl font-bold mt-2">

                {{ $value }}

            </h2>

        </div>

        <div
            class="w-14 h-14 rounded-xl flex items-center justify-center {{ $colors[$color] }}">

            <i class="fas {{ $icon }} text-2xl"></i>

        </div>

    </div>

</div>