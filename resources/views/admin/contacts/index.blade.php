@extends('admin.layouts.app')

@section('content')

<x-admin.crud-page>

    <x-slot:title>

        Messages

    </x-slot:title>

    <x-slot:subtitle>

        Consultez les messages envoyés depuis votre portfolio.

    </x-slot:subtitle>

    <x-admin.datatable>

        <x-slot:header>

            <div>

                <h2 class="text-xl font-semibold">

                    Boîte de réception

                </h2>

                <p class="text-sm text-slate-400">

                    {{ $contacts->total() }} message(s)

                </p>

            </div>

        </x-slot:header>

        <x-admin.table>

            <x-admin.table-head>

                <x-admin.table-th>

                    Expéditeur

                </x-admin.table-th>

                <x-admin.table-th>

                    Email

                </x-admin.table-th>

                <x-admin.table-th>

                    Sujet

                </x-admin.table-th>

                <x-admin.table-th>

                    Reçu le

                </x-admin.table-th>

                <x-admin.table-th class="text-center">

                    Actions

                </x-admin.table-th>

            </x-admin.table-head>

            <x-admin.table-body>

                @forelse($contacts as $contact)

                    <x-admin.table-row>

                        <x-admin.table-td class="font-semibold">

                            {{ $contact->name }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            {{ $contact->email }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            {{ \Illuminate\Support\Str::limit($contact->subject,40) }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            {{ $contact->created_at->format('d-m-Y H:i') }}

                        </x-admin.table-td>

                        <x-admin.table-td>

                            <div class="flex justify-center gap-2">

                                <a
                                    href="{{ route('contacts.show',$contact) }}">

                                    <x-admin.button>

                                        <i class="fas fa-eye"></i>

                                        Lire

                                    </x-admin.button>

                                </a>

                                <x-admin.modal
                                    id="deleteContact{{ $contact->id }}"
                                    title="Suppression">

                                    <x-slot:trigger>

                                        <x-admin.danger-button
                                            type="button"
                                            @click="$dispatch('open-modal','deleteContact{{ $contact->id }}')">

                                            <i class="fas fa-trash"></i>

                                            Supprimer

                                        </x-admin.danger-button>

                                    </x-slot:trigger>

                                    Voulez-vous supprimer ce message ?

                                    <x-slot:footer>

                                        <form
                                            action="{{ route('contacts.destroy',$contact) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <x-admin.danger-button>

                                                Oui, supprimer

                                            </x-admin.danger-button>

                                        </form>

                                    </x-slot:footer>

                                </x-admin.modal>

                            </div>

                        </x-admin.table-td>

                    </x-admin.table-row>

                @empty

                    <x-admin.table-row>

                        <x-admin.table-td
                            colspan="5"
                            class="text-center py-16">

                            <i class="fas fa-inbox text-5xl text-slate-600 mb-5"></i>

                            Aucun message reçu.

                        </x-admin.table-td>

                    </x-admin.table-row>

                @endforelse

            </x-admin.table-body>

        </x-admin.table>

        <x-slot:pagination>

            {{ $contacts->links() }}

        </x-slot:pagination>

    </x-admin.datatable>

</x-admin.crud-page>

@endsection