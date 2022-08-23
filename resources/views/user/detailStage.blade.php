<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail stage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->get('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                    @endif

                    <section>
                        <ul>
                            <li>
                                <h3>Intitulé du stage :</h3>
                                {{ $detailStage->intitule }}
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Modifier</x-button>
                                </form>
                                @endif
                            </li>
                            <li>
                                <h3>Période du stage :</h3>
                                du {{ $detailStage->datedebut }} au {{ $detailStage->datefin }}
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Modifier</x-button>
                                </form>
                                @endif
                            </li>
                            <li>
                                <h3>Curriculum vitae :</h3>
                                {{ $detailStage->curriculumvitae }}
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Mettre à jour</x-button>
                                </form>
                                @endif
                            </li>
                            <li>
                                <h3>Lettre de motivation :</h3>
                                {{ $detailStage->motivation }}
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Mettre à jour</x-button>
                                </form>
                                @endif
                            </li>

                            @if ($detailStage->approbation == true)
                            <li>
                                <h3>Thème de recherche :</h3>
                                @if ($detailStage->theme == '')
                                <p>Aucun thème de recherche enregistré pour le moment.</p><br />
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Ajouter</x-button>
                                </form>
                                @else
                                <p>{{ $detailStage->theme }}</p><br />
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Modifier</x-button>
                                </form>
                                @endif
                            </li>
                            <li>
                                <h3>Maître de stage :</h3>
                                @if ($detailAgent->email == '')
                                <p>Aucun maître de stage assigné pour le moment.</p>
                                @else
                                <p>
                                    {{ $detailAgent->prenom }} {{ $detailAgent->nom }}
                                    {{ $detailAgent->fonction }} {{ $detailService->servicename }}
                                    {{ $detailAgent->tel }}
                                    {{ $detailAgent->email }}
                                </p>
                                @endif
                            </li>
                            <li>
                                <h3>Mémoir ou rapport de fin de stage :</h3>
                                @if ($detailStage->rapport == '')
                                <p>Aucun mémoir ou rapport de stage enregistré pour le moment.</p><br />
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Ajouter</x-button>
                                </form>
                                @else
                                {{ $detailStage->rapport }}
                                <form method="POST" action="{{ route ('listestage') }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Modifier</x-button>
                                </form>
                                @endif
                            </li>
                            @endif
                        </ul><br />

                        <div>
                        <a href="{{ route('listestage') }}" class="btn btn-secondary">Fermer</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>