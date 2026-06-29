<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            {{ $title }}

        </h1>

        @isset($subtitle)

        <p class="text-slate-400 mt-2">

            {{ $subtitle }}

        </p>

        @endisset

    </div>

    <div>

        {{ $actions ?? '' }}

    </div>

</div>