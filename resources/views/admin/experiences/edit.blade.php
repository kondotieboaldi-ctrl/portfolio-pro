@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Modifier l'expérience

</x-slot:title>

<x-slot:subtitle>

    Modifiez les informations de cette expérience.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('experiences.update',$experience) }}"
    method="POST"
    enctype="multipart/form-data">

    @method('PUT')

    <x-admin.form-group>

        <x-admin.label for="job_title">

            Poste

        </x-admin.label>

        <x-admin.input
            id="job_title"
            name="job_title"
            :value="old('job_title',$experience->job_title)"/>

        <x-admin.error name="job_title"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="company">

            Entreprise

        </x-admin.label>

        <x-admin.input
            id="company"
            name="company"
            :value="old('company',$experience->company)"/>

        <x-admin.error name="company"/>

    </x-admin.form-group>

    <x-admin.form-group>

        <x-admin.label for="location">

            Lieu

        </x-admin.label>

        <x-admin.input
            id="location"
            name="location"
            :value="old('location',$experience->location)"/>

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
                :value="old('start_date',$experience->start_date)"/>

        </x-admin.form-group>

        <x-admin.form-group>

            <x-admin.label for="end_date">

                Date fin

            </x-admin.label>

            <x-admin.input
                id="end_date"
                type="date"
                name="end_date"
                :value="old('end_date',$experience->end_date)"/>

        </x-admin.form-group>

    </div>

    <x-admin.form-group>

        <label class="inline-flex items-center gap-3">

            <input
                type="checkbox"
                name="current_job"
                value="1"
                {{ old('current_job',$experience->current_job) ? 'checked' : '' }}
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
            rows="7">{{ old('description',$experience->description) }}</x-admin.textarea>

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

        @if($experience->image)

            <img
                src="{{ asset('storage/'.$experience->image) }}"
                class="w-52 mt-4 rounded-xl border border-slate-700">

        @endif

    </x-admin.form-group>

    <div class="flex gap-3">

        <x-admin.success-button>

            <i class="fas fa-save"></i>

            Mettre à jour

        </x-admin.success-button>

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
