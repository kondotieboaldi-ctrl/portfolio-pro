@extends('admin.layouts.app')

@section('content')

    <x-admin.alert />

    <div class="space-y-8">

        {{-- Bienvenue --}}

        <x-admin.card>

            <div class="flex flex-col lg:flex-row justify-between items-center">

                <div>

                    <h1 class="text-4xl font-bold">

                        Bonjour {{ auth()->user()->name }} 👋

                    </h1>

                    <p class="text-slate-400 mt-3">

                        Bienvenue dans votre espace d'administration.

                    </p>

                    <p class="text-slate-500 mt-2">

                        {{ now()->translatedFormat('l d F Y') }}

                    </p>

                </div>

                <div class="mt-6 lg:mt-0">

                    <a href="/" target="_blank">

                        <x-admin.button>

                            <i class="fas fa-globe"></i>

                            Voir le Portfolio

                        </x-admin.button>

                    </a>

                </div>

            </div>

        </x-admin.card>

        {{-- Statistiques --}}

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            <x-admin.stat-card title="Projets" :value="$projectsCount" icon="fa-code" color="blue" />

            <x-admin.stat-card title="Compétences" :value="$skillsCount" icon="fa-brain" color="green" />

            <x-admin.stat-card title="Expériences" :value="$experiencesCount" icon="fa-briefcase" color="orange" />

            <x-admin.stat-card title="Certifications" :value="$certificationsCount" icon="fa-award" color="yellow" />

            <x-admin.stat-card title="Diplômes" :value="$diplomasCount" icon="fa-graduation-cap" color="purple" />

            <x-admin.stat-card title="Messages" :value="$contactsCount" icon="fa-envelope" color="red" />

        </div>

        {{-- Accès rapides --}}

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            <a href="{{ route('projects.create') }}">

                <x-admin.card class="hover:border-blue-500 transition cursor-pointer">

                    <div class="text-center">

                        <i class="fas fa-code text-4xl text-blue-500 mb-4"></i>

                        <h3 class="font-bold">

                            Nouveau Projet

                        </h3>

                    </div>

                </x-admin.card>

            </a>

            <a href="{{ route('skills.create') }}">

                <x-admin.card class="hover:border-green-500 transition cursor-pointer">

                    <div class="text-center">

                        <i class="fas fa-brain text-4xl text-green-500 mb-4"></i>

                        <h3 class="font-bold">

                            Nouvelle Compétence

                        </h3>

                    </div>

                </x-admin.card>

            </a>

            <a href="{{ route('certifications.create') }}">

                <x-admin.card class="hover:border-yellow-500 transition cursor-pointer">

                    <div class="text-center">

                        <i class="fas fa-award text-4xl text-yellow-500 mb-4"></i>

                        <h3 class="font-bold">

                            Nouvelle Certification

                        </h3>

                    </div>

                </x-admin.card>

            </a>

            <a href="{{ route('diplomas.create') }}">

                <x-admin.card class="hover:border-purple-500 transition cursor-pointer">

                    <div class="text-center">

                        <i class="fas fa-graduation-cap text-4xl text-purple-500 mb-4"></i>

                        <h3 class="font-bold">

                            Nouveau Diplôme

                        </h3>

                    </div>

                </x-admin.card>

            </a>

            <a href="{{ route('experiences.create') }}">

                <x-admin.card class="hover:border-orange-500 transition cursor-pointer">

                    <div class="text-center">

                        <i class="fas fa-briefcase text-4xl text-orange-500 mb-4"></i>

                        <h3 class="font-bold">

                            Nouvelle Expérience

                        </h3>

                    </div>

                </x-admin.card>

            </a>

            <a href="{{ route('contacts.index') }}">

                <x-admin.card class="hover:border-red-500 transition cursor-pointer">

                    <div class="text-center">

                        <i class="fas fa-envelope text-4xl text-red-500 mb-4"></i>

                        <h3 class="font-bold">

                            Messages reçus

                        </h3>

                    </div>

                </x-admin.card>

            </a>

        </div>


        {{-- Dernières activités --}}

        <div class="grid lg:grid-cols-2 gap-6">


            <x-admin.card>

                <h2 class="text-xl font-bold mb-6">

                    Évolution des projets

                </h2>

                <canvas id="projectsChart" height="100"></canvas>

            </x-admin.card>


            <x-admin.card>

                <h2 class="text-xl font-bold mb-6">

                    Derniers Projets

                </h2>

                <div class="space-y-4">

                    @forelse($latestProjects as $project)

                        <div class="flex justify-between border-b border-slate-800 pb-4">

                            <div>

                                <h3 class="font-semibold">

                                    {{ $project->title }}

                                </h3>

                                <small class="text-slate-400">

                                    {{ $project->project_type }}

                                </small>

                            </div>

                            <small class="text-slate-500">

                                {{ $project->created_at->format('d-m-Y') }}

                            </small>

                        </div>

                    @empty

                        <p class="text-slate-500">

                            Aucun projet.

                        </p>

                    @endforelse

                </div>

            </x-admin.card>

            <x-admin.card>

                <h2 class="text-xl font-bold mb-6">

                    Derniers Messages

                </h2>

                <div class="space-y-4">

                    @forelse($latestContacts as $contact)

                        <div class="border-b border-slate-800 pb-4">

                            <h3 class="font-semibold">

                                {{ $contact->name }}

                            </h3>

                            <small class="text-slate-400">

                                {{ $contact->email }}

                            </small>

                        </div>

                    @empty

                        <p class="text-slate-500">

                            Aucun message reçu.

                        </p>

                    @endforelse

                </div>

            </x-admin.card>

        </div>

    </div>


    @push('scripts')

<script>

const ctx = document.getElementById('projectsChart');

new Chart(ctx, {

    type:'line',

    data:{

        labels:[
            'Jan','Fév','Mar','Avr','Mai','Juin',
            'Juil','Août','Sep','Oct','Nov','Déc'
        ],

        datasets:[{

            label:'Projets',

            data:@json($projectsByMonth),

            borderColor:'#3B82F6',

            backgroundColor:'rgba(59,130,246,.2)',

            fill:true,

            tension:.4

        }]

    },

    options:{

        responsive:true,

        plugins:{
            legend:{
                display:false
            }
        }

    }

});

</script>

@endpush

@endsection