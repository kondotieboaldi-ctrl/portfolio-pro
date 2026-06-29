@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Mon Profil

</x-slot:title>

<x-slot:subtitle>

    Configurez toutes les informations affichées sur votre portfolio.

</x-slot:subtitle>

<x-admin.form
    action="{{ route('admin.profile.update') }}"
    method="POST"
    enctype="multipart/form-data">

    @method('PUT')

    {{-- =======================
         INFORMATIONS PERSONNELLES
    ======================== --}}

    <x-admin.card>

        <h2 class="text-xl font-bold mb-6 flex items-center gap-3">

            <i class="fas fa-user-circle text-blue-500"></i>

            Informations personnelles

        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <x-admin.form-group>

                <x-admin.label for="fullname">

                    Nom complet

                </x-admin.label>

                <x-admin.input
                    id="fullname"
                    name="fullname"
                    :value="old('fullname',$profile->fullname ?? '')"/>

                <x-admin.error name="fullname"/>

            </x-admin.form-group>

            <x-admin.form-group>

                <x-admin.label for="professional_title">

                    Titre professionnel

                </x-admin.label>

                <x-admin.input
                    id="professional_title"
                    name="professional_title"
                    :value="old('professional_title',$profile->professional_title ?? '')"/>

                <x-admin.error name="professional_title"/>

            </x-admin.form-group>

        </div>

    </x-admin.card>

    {{-- =======================
         COORDONNÉES
    ======================== --}}

    <x-admin.card class="mt-8">

        <h2 class="text-xl font-bold mb-6 flex items-center gap-3">

            <i class="fas fa-address-card text-blue-500"></i>

            Coordonnées

        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <x-admin.form-group>

                <x-admin.label for="email">

                    Adresse e-mail

                </x-admin.label>

                <x-admin.input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email',$profile->email ?? '')"/>

                <x-admin.error name="email"/>

            </x-admin.form-group>

            <x-admin.form-group>

                <x-admin.label for="phone">

                    Téléphone

                </x-admin.label>

                <x-admin.input
                    id="phone"
                    name="phone"
                    :value="old('phone',$profile->phone ?? '')"/>

                <x-admin.error name="phone"/>

            </x-admin.form-group>

        </div>

    </x-admin.card>
```
```
    {{-- =======================
         RÉSEAUX SOCIAUX
    ======================== --}}

    <x-admin.card class="mt-8">

        <h2 class="text-xl font-bold mb-6 flex items-center gap-3">

            <i class="fas fa-share-alt text-blue-500"></i>

            Réseaux sociaux

        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <x-admin.form-group>

                <x-admin.label for="linkedin">

                    LinkedIn

                </x-admin.label>

                <x-admin.input
                    id="linkedin"
                    name="linkedin"
                    :value="old('linkedin',$profile->linkedin ?? '')"
                    placeholder="https://linkedin.com/in/..." />

            </x-admin.form-group>

            <x-admin.form-group>

                <x-admin.label for="github">

                    GitHub

                </x-admin.label>

                <x-admin.input
                    id="github"
                    name="github"
                    :value="old('github',$profile->github ?? '')"
                    placeholder="https://github.com/..." />

            </x-admin.form-group>

            <x-admin.form-group>

                <x-admin.label for="facebook">

                    Facebook

                </x-admin.label>

                <x-admin.input
                    id="facebook"
                    name="facebook"
                    :value="old('facebook',$profile->facebook ?? '')"
                    placeholder="https://facebook.com/..." />

            </x-admin.form-group>

        </div>

    </x-admin.card>

    {{-- =======================
         PRÉSENTATION
    ======================== --}}

    <x-admin.card class="mt-8">

        <h2 class="text-xl font-bold mb-6 flex items-center gap-3">

            <i class="fas fa-user-edit text-blue-500"></i>

            Présentation

        </h2>

        <x-admin.form-group>

            <x-admin.label for="about_me">

                À propos de moi

            </x-admin.label>

            <x-admin.textarea
                id="about_me"
                name="about_me"
                rows="8">{{ old('about_me',$profile->about_me ?? '') }}</x-admin.textarea>

            <x-admin.error name="about_me"/>

        </x-admin.form-group>

    </x-admin.card>

    {{-- =======================
         PHOTO & CV
    ======================== --}}

    <div class="grid lg:grid-cols-2 gap-8 mt-8">

        <x-admin.card>

            <h2 class="text-xl font-bold mb-6 flex items-center gap-3">

                <i class="fas fa-camera text-blue-500"></i>

                Photo de profil

            </h2>

            @if(!empty($profile?->photo))

                <div class="flex justify-center mb-6">

                    <img
                        src="{{ asset('storage/'.$profile->photo) }}"
                        class="w-44 h-44 rounded-full object-cover border-4 border-blue-600 shadow-xl">

                </div>

            @endif

            <x-admin.form-group>

                <x-admin.label for="photo">

                    Nouvelle photo

                </x-admin.label>

                <x-admin.input
                    id="photo"
                    type="file"
                    name="photo"/>

                <x-admin.error name="photo"/>

            </x-admin.form-group>

        </x-admin.card>

        <x-admin.card>

            <h2 class="text-xl font-bold mb-6 flex items-center gap-3">

                <i class="fas fa-file-pdf text-red-500"></i>

                Curriculum Vitae

            </h2>

            @if(!empty($profile?->cv))

                <div class="mb-6">

                    <a
                        href="{{ asset('storage/'.$profile->cv) }}"
                        target="_blank">

                        <x-admin.button>

                            <i class="fas fa-eye"></i>

                            Ouvrir le CV actuel

                        </x-admin.button>

                    </a>

                </div>

            @endif

            <x-admin.form-group>

                <x-admin.label for="cv">

                    Remplacer le CV (PDF)

                </x-admin.label>

                <x-admin.input
                    id="cv"
                    type="file"
                    name="cv"
                    accept=".pdf"/>

                <x-admin.error name="cv"/>

            </x-admin.form-group>

        </x-admin.card>

    </div>

    {{-- =======================
         ACTIONS
    ======================== --}}

    <div class="flex flex-wrap gap-3 mt-10">

        <x-admin.success-button>

            <i class="fas fa-save"></i>

            Enregistrer les modifications

        </x-admin.success-button>

    </div>

</x-admin.form>
```

</x-admin.crud-page>

@endsection
