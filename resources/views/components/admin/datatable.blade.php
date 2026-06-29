<div>

    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 mb-6">

        <div>

            {{ $header ?? '' }}

        </div>

        <div class="w-full lg:w-96">

            <x-admin.input
                id="searchInput"
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="🔍 Rechercher..." />

        </div>

    </div>

    <div
        id="table-container"
        class="overflow-x-auto rounded-xl border border-slate-800">

        {{ $slot }}

    </div>

    @isset($pagination)

        <div
            id="pagination-container"
            class="mt-6">

            {{ $pagination }}

        </div>

    @endisset

</div>