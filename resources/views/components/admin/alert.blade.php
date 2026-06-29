@if(session('success'))

<div
    x-data="{ show:true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-10"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-10"
    x-init="setTimeout(() => show = false, 4000)"
    class="fixed top-6 right-6 z-50 w-96">

    <div class="bg-green-600 text-white rounded-xl shadow-2xl p-5 flex items-center justify-between">

        <div class="flex items-center gap-3">

            <i class="fas fa-circle-check text-2xl"></i>

            <div>

                <p class="font-bold">

                    Succès

                </p>

                <p class="text-sm">

                    {{ session('success') }}

                </p>

            </div>

        </div>

        <button
            @click="show=false"
            class="text-white hover:text-gray-200">

            <i class="fas fa-times"></i>

        </button>

    </div>

</div>

@endif