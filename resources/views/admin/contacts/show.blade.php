@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

```
<x-slot:title>

    Détails du message

</x-slot:title>

<x-slot:subtitle>

    Consultez le contenu complet du message reçu.

</x-slot:subtitle>

<div class="grid lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2">

        <x-admin.card>

            <div class="space-y-6">

                <div>

                    <h3 class="text-sm uppercase tracking-wider text-slate-400">

                        Expéditeur

                    </h3>

                    <p class="text-xl font-semibold mt-2">

                        {{ $contact->name }}

                    </p>

                </div>

                <div>

                    <h3 class="text-sm uppercase tracking-wider text-slate-400">

                        Adresse e-mail

                    </h3>

                    <a
                        href="mailto:{{ $contact->email }}"
                        class="text-blue-400 hover:text-blue-300 transition">

                        {{ $contact->email }}

                    </a>

                </div>

                <div>

                    <h3 class="text-sm uppercase tracking-wider text-slate-400">

                        Sujet

                    </h3>

                    <p class="mt-2 text-lg font-medium">

                        {{ $contact->subject }}

                    </p>

                </div>

                <div>

                    <h3 class="text-sm uppercase tracking-wider text-slate-400">

                        Message

                    </h3>

                    <div class="mt-3 bg-slate-800 border border-slate-700 rounded-xl p-6 leading-8 whitespace-pre-line">

                        {{ $contact->message }}

                    </div>

                </div>

            </div>

        </x-admin.card>

    </div>

    <div>

        <x-admin.card>

            <h3 class="text-lg font-semibold mb-6">

                Informations

            </h3>

            <div class="space-y-5">

                <div>

                    <span class="text-slate-400 text-sm">

                        Reçu le

                    </span>

                    <p class="font-semibold mt-1">

                        {{ $contact->created_at->format('d-m-Y à H:i') }}

                    </p>

                </div>

                <div>

                    <span class="text-slate-400 text-sm">

                        Dernière mise à jour

                    </span>

                    <p class="font-semibold mt-1">

                        {{ $contact->updated_at->format('d-m-Y à H:i') }}

                    </p>

                </div>

            </div>

            <hr class="border-slate-700 my-8">

            <div class="space-y-3">

                <a href="{{ route('contacts.index') }}">

                    <x-admin.button>

                        <i class="fas fa-arrow-left"></i>

                        Retour à la liste

                    </x-admin.button>

                </a>

                <a
                    href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}">

                    <x-admin.success-button>

                        <i class="fas fa-reply"></i>

                        Répondre

                    </x-admin.success-button>

                </a>

                <x-admin.modal
                    id="deleteContact"
                    title="Supprimer le message">

                    <x-slot:trigger>

                        <x-admin.danger-button
                            type="button"
                            @click="$dispatch('open-modal','deleteContact')">

                            <i class="fas fa-trash"></i>

                            Supprimer

                        </x-admin.danger-button>

                    </x-slot:trigger>

                    <div class="space-y-4">

                        <p>

                            Voulez-vous vraiment supprimer ce message ?

                        </p>

                        <div class="bg-slate-800 rounded-xl p-4">

                            <strong>

                                {{ $contact->subject }}

                            </strong>

                            <br>

                            <span class="text-slate-400">

                                {{ $contact->name }}

                            </span>

                        </div>

                        <p class="text-sm text-red-400">

                            Cette action est irréversible.

                        </p>

                    </div>

                    <x-slot:footer>

                        <form
                            action="{{ route('contacts.destroy', $contact) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <x-admin.danger-button>

                                <i class="fas fa-trash"></i>

                                Oui, supprimer

                            </x-admin.danger-button>

                        </form>

                    </x-slot:footer>

                </x-admin.modal>

            </div>

        </x-admin.card>

    </div>

</div>
```

</x-admin.crud-page>

@endsection
