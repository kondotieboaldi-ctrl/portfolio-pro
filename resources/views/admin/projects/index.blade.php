@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Projets

</x-slot:title>

<x-slot:subtitle>

    Gérez vos projets et réalisations.

</x-slot:subtitle>

<x-slot:actions>

    <a href="{{ route('projects.create') }}">

        <x-admin.button>

            <i class="fas fa-plus"></i>

            Nouveau projet

        </x-admin.button>

    </a>

</x-slot:actions>

<x-admin.datatable>

    <x-slot:header>

        <div>

            <h2 class="text-xl font-semibold">

                Liste des projets

            </h2>

            <p class="text-sm text-slate-400">

                {{ $projects->total() }} projet(s) enregistré(s)

            </p>

        </div>

    </x-slot:header>

    <x-admin.table>

        <x-admin.table-head>

            <x-admin.table-th>

                Image

            </x-admin.table-th>

            <x-admin.table-th>

                Titre

            </x-admin.table-th>

            <x-admin.table-th>

                Type

            </x-admin.table-th>

            <x-admin.table-th>

                Date

            </x-admin.table-th>

            <x-admin.table-th>

                Vedette

            </x-admin.table-th>

            <x-admin.table-th class="text-center">

                Actions

            </x-admin.table-th>

        </x-admin.table-head>

        <x-admin.table-body>

            @forelse($projects as $project)

                <x-admin.table-row>

                    <x-admin.table-td>

                        @if($project->thumbnail)

                            <img
                                src="{{ asset('storage/'.$project->thumbnail) }}"
                                class="w-20 h-20 rounded-xl object-cover border border-slate-700">

                        @else

                            <div class="w-20 h-20 rounded-xl bg-slate-800 flex items-center justify-center">

                                <i class="fas fa-image text-slate-500 text-2xl"></i>

                            </div>

                        @endif

                    </x-admin.table-td>

                    <x-admin.table-td class="font-semibold">

                        {{ $project->title }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        {{ $project->project_type ?: '-' }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        {{ $project->project_date ? \Carbon\Carbon::parse($project->project_date)->format('d-m-Y') : '-' }}

                    </x-admin.table-td>

                    <x-admin.table-td>

                        @if($project->featured)

                            <x-admin.badge>

                                ⭐ Vedette

                            </x-admin.badge>

                        @else

                            <span class="text-slate-500">

                                Non

                            </span>

                        @endif

                    </x-admin.table-td>

                    <x-admin.table-td>

                        <div class="flex flex-wrap justify-center gap-2">

                            <a href="{{ route('project.images.index',$project) }}">

                                <x-admin.button>

                                    <i class="fas fa-images"></i>

                                    Images

                                </x-admin.button>

                            </a>

                            <a href="{{ route('project.videos.index',$project) }}">

                                <x-admin.success-button>

                                    <i class="fas fa-video"></i>

                                    Vidéos

                                </x-admin.success-button>

                            </a>

                            <a href="{{ route('projects.edit',$project) }}">

                                <x-admin.success-button>

                                    <i class="fas fa-pen"></i>

                                    Modifier

                                </x-admin.success-button>

                            </a>

                            <x-admin.modal
                                id="deleteProject{{ $project->id }}"
                                title="Confirmation de suppression">

                                <x-slot:trigger>

                                    <x-admin.danger-button
                                        type="button"
                                        @click="$dispatch('open-modal','deleteProject{{ $project->id }}')">

                                        <i class="fas fa-trash"></i>

                                        Supprimer

                                    </x-admin.danger-button>

                                </x-slot:trigger>

                                <div class="space-y-4">

                                    <p>

                                        Voulez-vous vraiment supprimer ce projet ?

                                    </p>

                                    <div class="bg-slate-800 rounded-xl p-4">

                                        <strong>

                                            {{ $project->title }}

                                        </strong>

                                    </div>

                                    <p class="text-red-400 text-sm">

                                        Cette action est irréversible.

                                    </p>

                                </div>

                                <x-slot:footer>

                                    <form
                                        action="{{ route('projects.destroy',$project) }}"
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
                        colspan="6"
                        class="text-center py-16">

                        <i class="fas fa-code text-5xl text-slate-600 mb-5"></i>

                        <p class="text-lg text-slate-400">

                            Aucun projet enregistré.

                        </p>

                    </x-admin.table-td>

                </x-admin.table-row>

            @endforelse

        </x-admin.table-body>

    </x-admin.table>

    <x-slot:pagination>

        {{ $projects->links() }}

    </x-slot:pagination>

</x-admin.datatable>
```

</x-admin.crud-page>

@endsection
