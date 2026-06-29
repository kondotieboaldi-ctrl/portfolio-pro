@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Nouveau Projet

</x-slot:title>

<x-slot:subtitle>

    Ajoutez un nouveau projet à votre portfolio.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('projects.store') }}"
    method="POST"
    enctype="multipart/form-data">

    <x-admin.form-group>

        <x-admin.label for="title">

            Titre

        </x-admin.label>

        <x-admin.input
            id="title"
            name="title"
            value="{{ old('title') }}"
            placeholder="Ex : Dashboard Commercial Power BI" />

        <x-admin.error name="title" />

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="project_type">

            Type de projet

        </x-admin.label>

        <x-admin.input
            id="project_type"
            name="project_type"
            value="{{ old('project_type') }}"
            placeholder="Ex : Business Intelligence" />

        <x-admin.error name="project_type" />

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="project_date">

            Date du projet

        </x-admin.label>

        <x-admin.input
            id="project_date"
            type="date"
            name="project_date"
            value="{{ old('project_date') }}" />

        <x-admin.error name="project_date" />

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="technologies">

            Technologies

        </x-admin.label>

        <x-admin.input
            id="technologies"
            name="technologies"
            value="{{ old('technologies') }}"
            placeholder="Power BI, SQL, Laravel, PHP..." />

        <x-admin.error name="technologies" />

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="short_description">

            Description courte

        </x-admin.label>

        <x-admin.textarea
            id="short_description"
            name="short_description"
            rows="3"
            placeholder="Résumé du projet...">{{ old('short_description') }}</x-admin.textarea>

        <x-admin.error name="short_description" />

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="full_description">

            Description complète

        </x-admin.label>

        <x-admin.textarea
            id="full_description"
            name="full_description"
            rows="8"
            placeholder="Décrivez le projet en détail...">{{ old('full_description') }}</x-admin.textarea>

        <x-admin.error name="full_description" />

    </x-admin.form-group>

    <div class="grid md:grid-cols-2 gap-6">

        <x-admin.form-group>

            <x-admin.label for="github_link">

                Lien GitHub

            </x-admin.label>

            <x-admin.input
                id="github_link"
                type="url"
                name="github_link"
                value="{{ old('github_link') }}"
                placeholder="https://github.com/..." />

            <x-admin.error name="github_link" />

        </x-admin.form-group>

        <x-admin.form-group>

            <x-admin.label for="demo_link">

                Lien Démo

            </x-admin.label>

            <x-admin.input
                id="demo_link"
                type="url"
                name="demo_link"
                value="{{ old('demo_link') }}"
                placeholder="https://..." />

            <x-admin.error name="demo_link" />

        </x-admin.form-group>

    </div>

    <x-admin.form-group>

        <x-admin.label for="thumbnail">

            Image principale

        </x-admin.label>

        <x-admin.input
            id="thumbnail"
            type="file"
            name="thumbnail" />

        <x-admin.error name="thumbnail" />

    </x-admin.form-group>

    <x-admin.form-group>

        <label class="inline-flex items-center gap-3">

            <input
                type="checkbox"
                name="featured"
                value="1"
                class="rounded border-slate-600 bg-slate-800 text-blue-600 focus:ring-blue-500">

            <span>

                Définir comme projet vedette

            </span>

        </label>

    </x-admin.form-group>

    <div class="flex flex-wrap gap-3">

        <x-admin.button>

            <i class="fas fa-save"></i>

            Enregistrer

        </x-admin.button>

        <a href="{{ route('projects.index') }}">

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
