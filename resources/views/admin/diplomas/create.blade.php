@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Nouveau Diplôme

</x-slot:title>

<x-slot:subtitle>

    Ajoutez un nouveau diplôme.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('diplomas.store') }}"
    method="POST"
    enctype="multipart/form-data">

    <x-admin.form-group>

        <x-admin.label for="title">

            Titre du diplôme

        </x-admin.label>

        <x-admin.input
            id="title"
            name="title"
            value="{{ old('title') }}"
            placeholder="Ex : Licence en Génie Logiciel"/>

        <x-admin.error name="title"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="school">

            Établissement

        </x-admin.label>

        <x-admin.input
            id="school"
            name="school"
            value="{{ old('school') }}"
            placeholder="Ex : Université Marien Ngouabi"/>

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
            value="{{ old('obtained_at') }}"/>

        <x-admin.error name="obtained_at"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="diploma_file">

            Diplôme (PDF)

        </x-admin.label>

        <x-admin.input
            id="diploma_file"
            type="file"
            name="diploma_file"
            accept=".pdf"/>

        <p class="text-sm text-slate-400 mt-2">

            Format accepté : PDF.

        </p>

        <x-admin.error name="diploma_file"/>

    </x-admin.form-group>

    <div class="flex gap-3">

        <x-admin.button>

            <i class="fas fa-save"></i>

            Enregistrer

        </x-admin.button>

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
