@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

    <x-slot:title>

        Compétences

    </x-slot:title>

    <x-slot:subtitle>

        Gérez vos compétences professionnelles.

    </x-slot:subtitle>

    <x-slot:actions>

        <a href="{{ route('skills.create') }}">

            <x-admin.button>

                <i class="fas fa-plus"></i>

                Nouvelle compétence

            </x-admin.button>

        </a>

    </x-slot:actions>

    <x-admin.datatable>

        <x-slot:header>

            <div>

                <h2 class="text-xl font-semibold">

                    Liste des compétences

                </h2>

                <p class="text-sm text-slate-400">

                    {{ $skills->count() }} compétence(s) enregistrée(s)

                </p>

            </div>

        </x-slot:header>

        <x-admin.table>

            <x-admin.table-head>

                <x-admin.table-th>

                    Nom

                </x-admin.table-th>

                <x-admin.table-th>

                    Niveau

                </x-admin.table-th>

                <x-admin.table-th>

                    Description

                </x-admin.table-th>

                <x-admin.table-th class="text-center">

                    Actions

                </x-admin.table-th>

            </x-admin.table-head>

            <x-admin.table-body>

                @forelse($skills as $skill)

                    <x-admin.table-row>

                        <x-admin.table-td class="font-semibold">

                            {{ $skill->name }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            <x-admin.badge>

                                {{ $skill->level }} %

                            </x-admin.badge>

                        </x-admin.table-td>

                        <x-admin.table-td>

                            {{ Str::limit($skill->description,70) }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('skills.edit',$skill) }}">

                                    <x-admin.success-button>

                                        <i class="fas fa-pen"></i>

                                        Modifier

                                    </x-admin.success-button>

                                </a>

                                <x-admin.modal
                                    id="deleteSkill{{ $skill->id }}"
                                    title="Confirmation de suppression">

                                    <x-slot:trigger>

                                        <x-admin.danger-button
                                            type="button"
                                            @click="$dispatch('open-modal','deleteSkill{{ $skill->id }}')">

                                            <i class="fas fa-trash"></i>

                                            Supprimer

                                        </x-admin.danger-button>

                                    </x-slot:trigger>

                                    <div class="space-y-4">

                                        <p>

                                            Voulez-vous vraiment supprimer cette compétence ?

                                        </p>

                                        <div class="bg-slate-800 rounded-xl p-4">

                                            <strong>

                                                {{ $skill->name }}

                                            </strong>

                                        </div>

                                        <p class="text-sm text-red-400">

                                            Cette action est irréversible.

                                        </p>

                                    </div>

                                    <x-slot:footer>

                                        <form
                                            action="{{ route('skills.destroy',$skill) }}"
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
                            colspan="4"
                            class="text-center py-16">

                            <i class="fas fa-folder-open text-5xl text-slate-600 mb-5"></i>

                            <p class="text-lg text-slate-400">

                                Aucune compétence enregistrée.

                            </p>

                        </x-admin.table-td>

                    </x-admin.table-row>

                @endforelse

            </x-admin.table-body>

        </x-admin.table>

        <x-slot:pagination>

            {{ $skills->links() }}

        </x-slot:pagination>

    </x-admin.datatable>

</x-admin.crud-page>

@endsection