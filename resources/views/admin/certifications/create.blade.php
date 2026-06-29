@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Nouvelle Certification

</x-slot:title>

<x-slot:subtitle>

    Ajoutez une nouvelle certification professionnelle.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('certifications.store') }}"
    method="POST"
    enctype="multipart/form-data">

    <x-admin.form-group>

        <x-admin.label for="title">

            Titre de la certification

        </x-admin.label>

        <x-admin.input
            id="title"
            name="title"
            value="{{ old('title') }}"
            placeholder="Ex : Microsoft Certified Power BI Data Analyst (PL-300)" />

        <x-admin.error name="title"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="organization">

            Organisation

        </x-admin.label>

        <x-admin.input
            id="organization"
            name="organization"
            value="{{ old('organization') }}"
            placeholder="Ex : Microsoft, Coursera, Google..." />

        <x-admin.error name="organization"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="obtained_at">

            Date d'obtention

        </x-admin.label>

        <x-admin.input
            id="obtained_at"
            type="date"
            name="obtained_at"
            value="{{ old('obtained_at') }}" />

        <x-admin.error name="obtained_at"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="certificate_file">

            Certificat (PDF)

        </x-admin.label>

        <x-admin.input
            id="certificate_file"
            type="file"
            name="certificate_file"
            accept=".pdf" />

        <p class="text-sm text-slate-400 mt-2">

            Formats acceptés : PDF.

        </p>

        <x-admin.error name="certificate_file"/>

    </x-admin.form-group>

    <div class="flex flex-wrap gap-3">

        <x-admin.button>

            <i class="fas fa-save"></i>

            Enregistrer

        </x-admin.button>

        <a href="{{ route('certifications.index') }}">

            <x-admin.danger-button
                type="button">

                <i class="fas fa-arrow-left"></i>

                Retour

            </x-admin.danger-button>

        </a>

    </div>

</x-admin.form>
```

</x-admin.crud-page>

@endsection
