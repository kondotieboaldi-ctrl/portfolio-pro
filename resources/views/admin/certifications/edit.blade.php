@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Modifier la Certification

</x-slot:title>

<x-slot:subtitle>

    Modifiez les informations de cette certification.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('certifications.update', $certification) }}"
    method="POST"
    enctype="multipart/form-data">

    @method('PUT')

    <x-admin.form-group>

        <x-admin.label for="title">

            Titre de la certification

        </x-admin.label>

        <x-admin.input
            id="title"
            name="title"
            :value="old('title', $certification->title)"
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
            :value="old('organization', $certification->organization)"
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
            :value="old('obtained_at', $certification->obtained_at)" />

        <x-admin.error name="obtained_at"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="certificate_file">

            Remplacer le certificat (PDF)

        </x-admin.label>

        <x-admin.input
            id="certificate_file"
            type="file"
            name="certificate_file"
            accept=".pdf" />

        <x-admin.error name="certificate_file"/>

        @if($certification->certificate_file)

            <div class="mt-5 p-4 bg-slate-800 rounded-xl border border-slate-700">

                <p class="text-sm text-slate-400 mb-3">

                    Certificat actuel

                </p>

                <a
                    href="{{ asset('storage/'.$certification->certificate_file) }}"
                    target="_blank">

                    <x-admin.button>

                        <i class="fas fa-file-pdf"></i>

                        Ouvrir le PDF

                    </x-admin.button>

                </a>

            </div>

        @endif

    </x-admin.form-group>

    <div class="flex flex-wrap gap-3">

        <x-admin.success-button>

            <i class="fas fa-save"></i>

            Mettre à jour

        </x-admin.success-button>

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
