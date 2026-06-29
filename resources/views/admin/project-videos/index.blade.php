@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Galerie des Vidéos

</x-slot:title>

<x-slot:subtitle>

    Projet : <strong>{{ $project->title }}</strong>

</x-slot:subtitle>

<x-admin.card>

    <form
        action="{{ route('project.videos.store',$project) }}"
        method="POST"
        enctype="multipart/form-data"
        class="flex flex-col md:flex-row gap-4 items-end">

        @csrf

        <div class="flex-1">

            <x-admin.label for="video">

                Ajouter une vidéo

            </x-admin.label>

            <x-admin.input
                id="video"
                type="file"
                name="video"
                accept=".mp4,.mov,.avi"/>

            <x-admin.error name="video"/>

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

        Vidéos du projet

        <span class="text-slate-400 text-base">

            ({{ $project->videos->count() }})

        </span>

    </h2>

    @if($project->videos->count())

        <div class="grid lg:grid-cols-2 gap-8">

            @foreach($project->videos as $video)

                <x-admin.card>

                    <video
                        controls
                        class="w-full rounded-xl">

                        <source
                            src="{{ asset('storage/'.$video->video) }}">

                    </video>

                    <div class="flex justify-end mt-5">

                        <x-admin.modal
                            id="deleteVideo{{ $video->id }}"
                            title="Supprimer la vidéo">

                            <x-slot:trigger>

                                <x-admin.danger-button
                                    type="button"
                                    @click="$dispatch('open-modal','deleteVideo{{ $video->id }}')">

                                    <i class="fas fa-trash"></i>

                                    Supprimer

                                </x-admin.danger-button>

                            </x-slot:trigger>

                            <div class="space-y-4">

                                <p>

                                    Voulez-vous vraiment supprimer cette vidéo ?

                                </p>

                                <p class="text-sm text-red-400">

                                    Cette action est irréversible.

                                </p>

                            </div>

                            <x-slot:footer>

                                <form
                                    action="{{ route('project.videos.destroy',$video) }}"
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

                </x-admin.card>

            @endforeach

        </div>

    @else

        <x-admin.card>

            <div class="text-center py-16">

                <i class="fas fa-video text-6xl text-slate-600 mb-5"></i>

                <p class="text-slate-400">

                    Aucune vidéo n'a encore été ajoutée.

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
