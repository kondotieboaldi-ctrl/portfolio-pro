@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Expériences

</x-slot:title>

<x-slot:subtitle>

    Gérez vos expériences professionnelles.

</x-slot:subtitle>

<x-slot:actions>

    <a href="{{ route('experiences.create') }}">

        <x-admin.button>

            <i class="fas fa-plus"></i>

            Nouvelle expérience

        </x-admin.button>

    </a>

</x-slot:actions>

<x-admin.datatable>

    <x-slot:header>

        <div>

            <h2 class="text-xl font-semibold">

                Liste des expériences

            </h2>

            <p class="text-sm text-slate-400">

                {{ $experiences->total() }} expérience(s) enregistrée(s)

            </p>

        </div>

    </x-slot:header>

    <x-admin.table>

        <x-admin.table-head>

            <x-admin.table-th>

                Image

            </x-admin.table-th>

            <x-admin.table-th>

                Poste

            </x-admin.table-th>

            <x-admin.table-th>

                Entreprise

            </x-admin.table-th>

            <x-admin.table-th>

                Début

            </x-admin.table-th>

            <x-admin.table-th>

                Fin

            </x-admin.table-th>

            <x-admin.table-th>

                Statut

            </x-admin.table-th>

            <x-admin.table-th class="text-center">

                Actions

            </x-admin.table-th>

        </x-admin.table-head>

        <x-admin.table-body>

            @forelse($experiences as $experience)

                <x-admin.table-row>

                    <x-admin.table-td>

                        @if($experience->image)

                            <img
                                src="{{ asset('storage/'.$experience->image) }}"
                                class="w-20 h-20 rounded-xl object-cover border border-slate-700">

                        @else

                            <div class="w-20 h-20 rounded-xl bg-slate-800 flex items-center justify-center">

                                <i class="fas fa-briefcase text-slate-500 text-2xl"></i>

                            </div>

                        @endif

                    </x-admin.table-td>

                    <x-admin.table-td class="font-semibold">

                        {{ $experience->job_title }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        {{ $experience->company }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        {{ \Carbon\Carbon::parse($experience->start_date)->format('d-m-Y') }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('d-m-Y') : '-' }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        @if($experience->current_job)

                            <x-admin.badge>

                                En poste

                            </x-admin.badge>

                        @else

                            <span class="text-slate-500">

                                Terminé

                            </span>

                        @endif

                    </x-admin.table-td>

                    <x-admin.table-td>

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('experiences.edit',$experience) }}">

                                <x-admin.success-button>

                                    <i class="fas fa-pen"></i>

                                    Modifier

                                </x-admin.success-button>

                            </a>

                            <x-admin.modal
                                id="deleteExperience{{ $experience->id }}"
                                title="Confirmation de suppression">

                                <x-slot:trigger>

                                    <x-admin.danger-button
                                        type="button"
                                        @click="$dispatch('open-modal','deleteExperience{{ $experience->id }}')">

                                        <i class="fas fa-trash"></i>

                                        Supprimer

                                    </x-admin.danger-button>

                                </x-slot:trigger>

                                <div class="space-y-4">

                                    <p>

                                        Voulez-vous vraiment supprimer cette expérience ?

                                    </p>

                                    <div class="bg-slate-800 rounded-xl p-4">

                                        <strong>

                                            {{ $experience->job_title }}

                                        </strong>

                                        <br>

                                        <span class="text-slate-400">

                                            {{ $experience->company }}

                                        </span>

                                    </div>

                                    <p class="text-sm text-red-400">

                                        Cette action est irréversible.

                                    </p>

                                </div>

                                <x-slot:footer>

                                    <form
                                        action="{{ route('experiences.destroy',$experience) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <x-admin.danger-button>

                                            <i class="fas fa-trash"></i>

                                            Oui, supprimer

                                        </x-admin.danger-button>

                                    </form>

                                </x-slot:footer>

                            </x-admin.modal>

                        </div>

                    </x-admin.table-td>

                </x-admin.table-row>

            @empty

                <x-admin.table-row>

                    <x-admin.table-td
                        colspan="7"
                        class="text-center py-16">

                        <i class="fas fa-briefcase text-5xl text-slate-600 mb-5"></i>

                        <p class="text-lg text-slate-400">

                            Aucune expérience enregistrée.

                        </p>

                    </x-admin.table-td>

                </x-admin.table-row>

            @endforelse

        </x-admin.table-body>

    </x-admin.table>

    <x-slot:pagination>

        {{ $experiences->links() }}

    </x-slot:pagination>

</x-admin.datatable>
```

</x-admin.crud-page>

@endsection
