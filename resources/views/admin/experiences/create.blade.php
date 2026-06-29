@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Nouvelle Expérience

</x-slot:title>

<x-slot:subtitle>

    Ajoutez une nouvelle expérience professionnelle.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('experiences.store') }}"
    method="POST"
    enctype="multipart/form-data">

    <x-admin.form-group>

        <x-admin.label for="job_title">

            Poste

        </x-admin.label>

        <x-admin.input
            id="job_title"
            name="job_title"
            value="{{ old('job_title') }}"
            placeholder="Ex : Business Intelligence Analyst" />

        <x-admin.error name="job_title"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="company">

            Entreprise

        </x-admin.label>

        <x-admin.input
            id="company"
            name="company"
            value="{{ old('company') }}"
            placeholder="Nom de l'entreprise"/>

        <x-admin.error name="company"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="location">

            Lieu

        </x-admin.label>

        <x-admin.input
            id="location"
            name="location"
            value="{{ old('location') }}"
            placeholder="Ville, Pays"/>

    </x-admin.form-group>

    <div class="grid md:grid-cols-2 gap-6">

        <x-admin.form-group>

            <x-admin.label for="start_date">

                Date début

            </x-admin.label>

            <x-admin.input
                id="start_date"
                type="date"
                name="start_date"
                value="{{ old('start_date') }}"/>

            <x-admin.error name="start_date"/>

        </x-admin.form-group>

        <x-admin.form-group>

            <x-admin.label for="end_date">

                Date fin

            </x-admin.label>

            <x-admin.input
                id="end_date"
                type="date"
                name="end_date"
                value="{{ old('end_date') }}"/>

        </x-admin.form-group>

    </div>

    <x-admin.form-group>

        <label class="inline-flex items-center gap-3">

            <input
                type="checkbox"
                name="current_job"
                value="1"
                class="rounded border-slate-600">

            <span>

                Poste actuel

            </span>

        </label>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="description">

            Description

        </x-admin.label>

        <x-admin.textarea
            id="description"
            name="description"
            rows="7">{{ old('description') }}</x-admin.textarea>

        <x-admin.error name="description"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="image">

            Logo / Image

        </x-admin.label>

        <x-admin.input
            id="image"
            type="file"
            name="image"/>

        <x-admin.error name="image"/>

    </x-admin.form-group>

    <div class="flex gap-3">

        <x-admin.button>

            <i class="fas fa-save"></i>

            Enregistrer

        </x-admin.button>

        <a href="{{ route('experiences.index') }}">

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
