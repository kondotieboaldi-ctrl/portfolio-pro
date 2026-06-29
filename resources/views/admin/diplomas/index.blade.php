@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

    <x-slot:title>

        Diplômes

    </x-slot:title>

    <x-slot:subtitle>

        Gérez vos diplômes.

    </x-slot:subtitle>

    <x-slot:actions>

        <a href="{{ route('diplomas.create') }}">

            <x-admin.button>

                <i class="fas fa-plus"></i>

                Nouveau diplôme

            </x-admin.button>

        </a>

    </x-slot:actions>

    <x-admin.datatable>

        <x-slot:header>

            <div>

                <h2 class="text-xl font-semibold">

                    Liste des diplômes

                </h2>

                <p class="text-sm text-slate-400">

                    {{ $diplomas->total() }} diplôme(s)

                </p>

            </div>

        </x-slot:header>

        <x-admin.table>

            <x-admin.table-head>

                <x-admin.table-th>Titre</x-admin.table-th>

                <x-admin.table-th>Etablissement</x-admin.table-th>

                <x-admin.table-th>Date</x-admin.table-th>

                <x-admin.table-th>Document</x-admin.table-th>

                <x-admin.table-th class="text-center">

                    Actions

                </x-admin.table-th>

            </x-admin.table-head>

            <x-admin.table-body>

                @forelse($diplomas as $diploma)

                    <x-admin.table-row>

                        <x-admin.table-td class="font-semibold">

                            {{ $diploma->title }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            {{ $diploma->school }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            {{ \Carbon\Carbon::parse($diploma->obtained_at)->format('d-m-Y') }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            @if($diploma->diploma_file)

                                <a
                                    href="{{ asset('storage/'.$diploma->diploma_file) }}"
                                    target="_blank">

                                    <x-admin.button>

                                        <i class="fas fa-file-pdf"></i>

                                        PDF

                                    </x-admin.button>

                                </a>

                            @else

                                <span class="text-slate-500">

                                    Aucun

                                </span>

                            @endif

                        </x-admin.table-td>

                        <x-admin.table-td>

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('diplomas.edit',$diploma) }}">

                                    <x-admin.success-button>

                                        <i class="fas fa-pen"></i>

                                        Modifier

                                    </x-admin.success-button>

                                </a>

                                <x-admin.modal
                                    id="deleteDiploma{{ $diploma->id }}"
                                    title="Suppression">

                                    <x-slot:trigger>

                                        <x-admin.danger-button
                                            type="button"
                                            @click="$dispatch('open-modal','deleteDiploma{{ $diploma->id }}')">

                                            <i class="fas fa-trash"></i>

                                            Supprimer

                                        </x-admin.danger-button>

                                    </x-slot:trigger>

                                    Voulez-vous supprimer

                                    <strong>

                                        {{ $diploma->title }}

                                    </strong>

                                    ?

                                    <x-slot:footer>

                                        <form
                                            action="{{ route('diplomas.destroy',$diploma) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <x-admin.danger-button>

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

                            <i class="fas fa-graduation-cap text-5xl text-slate-600 mb-4"></i>

                            Aucun diplôme enregistré.

                        </x-admin.table-td>

                    </x-admin.table-row>

                @endforelse

            </x-admin.table-body>

        </x-admin.table>

        <x-slot:pagination>

            {{ $diplomas->links() }}

        </x-slot:pagination>

    </x-admin.datatable>

</x-admin.crud-page>

@endsection