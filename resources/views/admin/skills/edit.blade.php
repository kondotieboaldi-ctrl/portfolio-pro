@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

    <x-slot:title>

        Modifier la compétence

    </x-slot:title>

    <x-slot:subtitle>

        Modifiez les informations de cette compétence.

    </x-slot:subtitle>

    <x-admin.form
        action="{{ route('skills.update', $skill) }}"
        method="POST">

        @method('PUT')

        <x-admin.form-group>

            <x-admin.label for="name">

                Nom

            </x-admin.label>

            <x-admin.input
                id="name"
                name="name"
                value="{{ old('name', $skill->name) }}"
                placeholder="Ex : Laravel" />

            <x-admin.error
                name="name" />

        </x-admin.form-group>

        <x-admin.form-group>

            <x-admin.label for="level">

                Niveau (%)

            </x-admin.label>

            <x-admin.input
                id="level"
                type="number"
                name="level"
                min="0"
                max="100"
                value="{{ old('level', $skill->level) }}"
                placeholder="Ex : 90" />

            <x-admin.error
                name="level" />

        </x-admin.form-group>

        <x-admin.form-group>

            <x-admin.label for="description">

                Description

            </x-admin.label>

            <x-admin.textarea
                id="description"
                name="description"
                rows="5"
                placeholder="Décrivez cette compétence...">{{ old('description', $skill->description) }}</x-admin.textarea>

            <x-admin.error
                name="description" />

        </x-admin.form-group>

        <div class="flex gap-3">

            <x-admin.success-button>

                <i class="fas fa-save"></i>

                Mettre à jour

            </x-admin.success-button>

            <a href="{{ route('skills.index') }}">

                <x-admin.danger-button type="button">

                    <i class="fas fa-arrow-left"></i>

                    Retour

                </x-admin.danger-button>

            </a>

        </div>

    </x-admin.form>

</x-admin.crud-page>

@endsection