@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Modifier le Diplôme

</x-slot:title>

<x-slot:subtitle>

    Modifiez les informations du diplôme.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('diplomas.update',$diploma) }}"
    method="POST"
    enctype="multipart/form-data">

    @method('PUT')

    <x-admin.form-group>

        <x-admin.label for="title">

            Titre du diplôme

        </x-admin.label>

        <x-admin.input
            id="title"
            name="title"
            :value="old('title',$diploma->title)"/>

        <x-admin.error name="title"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="school">

            Établissement

        </x-admin.label>

        <x-admin.input
            id="school"
            name="school"
            :value="old('school',$diploma->school)"/>

        <x-admin.error name="school"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="obtained_at">

            Date d'obtention

        </x-admin.label>

        <x-admin.input
            id="obtained_at"
            type="date"
            name="obtained_at"
            :value="old('obtained_at',$diploma->obtained_at)"/>

        <x-admin.error name="obtained_at"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="diploma_file">

            Remplacer le diplôme (PDF)

        </x-admin.label>

        <x-admin.input
            id="diploma_file"
            type="file"
            name="diploma_file"
            accept=".pdf"/>

        <x-admin.error name="diploma_file"/>

        @if($diploma->diploma_file)

            <div class="mt-5 p-4 bg-slate-800 rounded-xl border border-slate-700">

                <p class="text-sm text-slate-400 mb-3">

                    Diplôme actuel

                </p>

                <a
                    href="{{ asset('storage/'.$diploma->diploma_file) }}"
                    target="_blank">

                    <x-admin.button>

                        <i class="fas fa-file-pdf"></i>

                        Ouvrir le PDF

                    </x-admin.button>

                </a>

            </div>

        @endif

    </x-admin.form-group>

    <div class="flex gap-3">

        <x-admin.success-button>

            <i class="fas fa-save"></i>

            Mettre à jour

        </x-admin.success-button>

        <a href="{{ route('diplomas.index') }}">

            <x-admin.danger-button type="button">

                <i class="fas fa-arrow-left"></i>

                Retour

            </x-admin.danger-button>

        </a>

    </div>

</x-admin.form>
```

</x-admin.crud-page>

@endsection
