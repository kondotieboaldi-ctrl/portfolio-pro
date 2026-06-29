<div class="space-y-8">

    <x-admin.alert />

    <x-admin.page-header>

        <x-slot:title>

            {{ $title }}

        </x-slot:title>

        @isset($subtitle)

        <x-slot:subtitle>

            {{ $subtitle }}

        </x-slot:subtitle>

        @endisset

        @isset($actions)

        <x-slot:actions>

            {{ $actions }}

        </x-slot:actions>

        @endisset

    </x-admin.page-header>

    <x-admin.card>

        {{ $slot }}

    </x-admin.card>

</div>