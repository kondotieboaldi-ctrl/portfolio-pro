@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Certifications

</x-slot:title>

<x-slot:subtitle>

    Gérez vos certifications professionnelles.

</x-slot:subtitle>

<x-slot:actions>

    <a href="{{ route('certifications.create') }}">

        <x-admin.button>

            <i class="fas fa-plus"></i>

            Nouvelle certification

        </x-admin.button>

    </a>

</x-slot:actions>

<x-admin.datatable>

    <x-slot:header>

        <div>

            <h2 class="text-xl font-semibold">

                Liste des certifications

            </h2>

            <p class="text-sm text-slate-400">

                {{ $certifications->total() }} certification(s) enregistrée(s)

            </p>

        </div>

    </x-slot:header>

    <x-admin.table>

        <x-admin.table-head>

            <x-admin.table-th>

                Titre

            </x-admin.table-th>

            <x-admin.table-th>

                Organisation

            </x-admin.table-th>

            <x-admin.table-th>

                Date

            </x-admin.table-th>

            <x-admin.table-th>

                Certificat

            </x-admin.table-th>

            <x-admin.table-th class="text-center">

                Actions

            </x-admin.table-th>

        </x-admin.table-head>

        <x-admin.table-body>

            @forelse($certifications as $certification)

                <x-admin.table-row>

                    <x-admin.table-td class="font-semibold">

                        {{ $certification->title }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        {{ $certification->organization }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        {{ \Carbon\Carbon::parse($certification->obtained_at)->format('d-m-Y') }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        @if($certification->certificate_file)

                            <a
                                href="{{ asset('storage/'.$certification->certificate_file) }}"
                                target="_blank">

                                <x-admin.button>

                                    <i class="fas fa-file-pdf"></i>

                                    Voir PDF

                                </x-admin.button>

                            </a>

                        @else

                            <span class="text-slate-500">

                                Aucun PDF

                            </span>

                        @endif

                    </x-admin.table-td>

                    <x-admin.table-td>

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('certifications.edit',$certification) }}">

                                <x-admin.success-button>

                                    <i class="fas fa-pen"></i>

                                    Modifier

                                </x-admin.success-button>

                            </a>

                            <x-admin.modal
                                id="deleteCertification{{ $certification->id }}"
                                title="Confirmation de suppression">

                                <x-slot:trigger>

                                    <x-admin.danger-button
                                        type="button"
                                        @click="$dispatch('open-modal','deleteCertification{{ $certification->id }}')">

                                        <i class="fas fa-trash"></i>

                                        Supprimer

                                    </x-admin.danger-button>

                                </x-slot:trigger>

                                <div class="space-y-4">

                                    <p>

                                        Voulez-vous vraiment supprimer cette certification ?

                                    </p>

                                    <div class="bg-slate-800 rounded-xl p-4">

                                        <strong>

                                            {{ $certification->title }}

                                        </strong>

                                        <br>

                                        <span class="text-slate-400">

                                            {{ $certification->organization }}

                                        </span>

                                    </div>

                                    <p class="text-red-400 text-sm">

                                        Cette action est irréversible.

                                    </p>

                                </div>

                                <x-slot:footer>

                                    <form
                                        action="{{ route('certifications.destroy',$certification) }}"
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
                        colspan="5"
                        class="text-center py-16">

                        <i class="fas fa-award text-5xl text-slate-600 mb-5"></i>

                        <p class="text-lg text-slate-400">

                            Aucune certification enregistrée.

                        </p>

                    </x-admin.table-td>

                </x-admin.table-row>

            @endforelse

        </x-admin.table-body>

    </x-admin.table>

    <x-slot:pagination>

        {{ $certifications->links() }}

    </x-slot:pagination>

</x-admin.datatable>
```

</x-admin.crud-page>

@endsection
