@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Galerie des Images

</x-slot:title>

<x-slot:subtitle>

    Projet : <strong>{{ $project->title }}</strong>

</x-slot:subtitle>

<x-admin.card>

    <form
        action="{{ route('project.images.store',$project) }}"
        method="POST"
        enctype="multipart/form-data"
        class="flex flex-col md:flex-row gap-4 items-end">

        @csrf

        <div class="flex-1">

            <x-admin.label for="image">

                Ajouter une nouvelle image

            </x-admin.label>

            <x-admin.input
                id="image"
                type="file"
                name="image" />

            <x-admin.error name="image"/>

        </div>

        <div>

            <x-admin.button>

                <i class="fas fa-upload"></i>

                Télécharger

            </x-admin.button>

        </div>

    </form>

</x-admin.card>

<div class="mt-8">

    <h2 class="text-xl font-bold mb-6">

        Images du projet

        <span class="text-slate-400 text-base">

            ({{ $project->images->count() }})

        </span>

    </h2>

    @if($project->images->count())

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            @foreach($project->images as $image)

                <x-admin.card>

                    <img
                        src="{{ asset('storage/'.$image->image) }}"
                        class="w-full h-52 object-cover rounded-xl">

                    <div class="flex gap-2 mt-5">

                        <a
                            href="{{ asset('storage/'.$image->image) }}"
                            target="_blank"
                            class="flex-1">

                            <x-admin.button>

                                <i class="fas fa-eye"></i>

                                Voir

                            </x-admin.button>

                        </a>

                        <x-admin.modal
                            id="deleteImage{{ $image->id }}"
                            title="Supprimer l'image">

                            <x-slot:trigger>

                                <x-admin.danger-button
                                    type="button"
                                    @click="$dispatch('open-modal','deleteImage{{ $image->id }}')">

                                    <i class="fas fa-trash"></i>

                                </x-admin.danger-button>

                            </x-slot:trigger>

                            <div class="space-y-4">

                                <p>

                                    Voulez-vous vraiment supprimer cette image ?

                                </p>

                                <img
                                    src="{{ asset('storage/'.$image->image) }}"
                                    class="rounded-xl">

                            </div>

                            <x-slot:footer>

                                <form
                                    action="{{ route('project.images.destroy',$image) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <x-admin.danger-button>

                                        <i class="fas fa-trash"></i>

                                        Supprimer

                                    </x-admin.danger-button>

                                </form>

                            </x-slot:footer>

                        </x-admin.modal>

                    </div>

                </x-admin.card>

            @endforeach

        </div>

    @else

        <x-admin.card>

            <div class="text-center py-16">

                <i class="fas fa-image text-6xl text-slate-600 mb-5"></i>

                <p class="text-slate-400">

                    Aucune image n'a encore été ajoutée.

                </p>

            </div>

        </x-admin.card>

    @endif

</div>

<div class="mt-10">

    <a href="{{ route('projects.index') }}">

        <x-admin.danger-button
            type="button">

            <i class="fas fa-arrow-left"></i>

            Retour aux projets

        </x-admin.danger-button>

    </a>

</div>
```

</x-admin.crud-page>

@endsection
