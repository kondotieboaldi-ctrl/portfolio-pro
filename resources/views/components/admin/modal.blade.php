@props([
    'id',
    'title' => 'Confirmation'
])

<div
    x-data="{ open:false }"
    x-on:open-modal.window="if($event.detail=='{{ $id }}') open=true"
    x-on:keydown.escape.window="open=false">

    {{ $trigger }}

    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70"
        style="display:none;">

        <div
            @click.away="open=false"
            class="bg-slate-900 rounded-2xl shadow-2xl w-full max-w-lg border border-slate-700">

            <div class="border-b border-slate-800 px-6 py-4">

                <h2 class="text-xl font-bold">

                    {{ $title }}

                </h2>

            </div>

            <div class="p-6">

                {{ $slot }}

            </div>

            <div class="border-t border-slate-800 px-6 py-4 flex justify-end gap-3">

                <button
                    @click="open=false"
                    class="bg-slate-700 hover:bg-slate-600 px-5 py-2 rounded-lg">

                    Annuler

                </button>

                {{ $footer }}

            </div>

        </div>

    </div>

</div>