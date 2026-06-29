@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

<x-slot:title>

Nouvelle compétence

</x-slot:title>

<x-slot:subtitle>

Ajoutez une nouvelle compétence à votre portfolio.

</x-slot:subtitle>

<x-admin.form
action="{{ route('skills.store') }}"
method="POST">

<x-admin.form-group>

<x-admin.label>

Nom

</x-admin.label>

<x-admin.input
name="name"
value="{{ old('name') }}" />

<x-admin.error
name="name"/>

</x-admin.form-group>

<x-admin.form-group>

<x-admin.label>

Niveau

</x-admin.label>

<x-admin.input
type="number"
name="level"
value="{{ old('level') }}" />

<x-admin.error
name="level"/>

</x-admin.form-group>

<x-admin.form-group>

<x-admin.label>

Description

</x-admin.label>

<x-admin.textarea
name="description"
rows="5">{{ old('description') }}</x-admin.textarea>

<x-admin.error
name="description"/>

</x-admin.form-group>

<div class="flex gap-3">

<x-admin.button>

<i class="fas fa-save"></i>

Enregistrer

</x-admin.button>

<a
href="{{ route('skills.index') }}">

<x-admin.danger-button
type="button">

Retour

</x-admin.danger-button>

</a>

</div>

</x-admin.form>

</x-admin.crud-page>

@endsection