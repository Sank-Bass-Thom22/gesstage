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
                        <h2>Stage</h2>
                        <ul>
                            <li>
                                <h3>Intitulé du stage :</h3>
                                {{ $showRequest->intitule }}
                            </li>
                            <li>
                                <h3>Période du stage :</h3>
                                du {{ $showRequest->datedebut }} au {{ $showRequest->datefin }}
                            </li>
                            <li>
                                <h3>Curriculum vitae :</h3>
                                {{ $showRequest->curriculumvitae }}
                            </li>
                            <li>
                                <h3>Lettre de motivation :</h3>
                                {{ $showRequest->motivation }}
                            </li>
                            @if ($showRequest->approbation == true)
                            <li>
                                <h3>Thème</h3>
                                {{ $showRequest->theme }}
                            </li>
                            <li>
                                <h3>Rapport de stage</h3>
                                {{ $showRequest->rapport }}
                            </li>
                            @endif
                        </ul><br />

                        @if (isset($showEmploye, $showService))
                        <h2>Maître de stage</h2>
                        <ul>
                            <li>
                                <h3>Prénom(s), nom</h3>
                                {{ $showEmploye->prenom }}{{ __(' ') }}{{ $showEmploye->nom }}
                            </li>
                            <li>
                                <h3>Addresse mail></h3>
                                {{ $showEmploye->email }}
                            </li>
                            <li>
                                <h3>Téléphone</h3>
                                {{ $showEmploye->tel }}
                            </li>
                            <li>
                                <h3>Profession</h3>
                                {{ $showEmploye->fonction }}
                            </li>
                            <li>
                                <h3>Service</h3>
                                {{ $showService->servicename }}
                            </li>
                        </ul>
                        @endif

                        <h2>Postulant</h2>
                        <ul>
                            <li>
                                <h3>Nom, prénom(s)</h3>
                                {{ $showUser->name }}{{ __(' ') }}{{ $showUser->firstname }}
                            </li>
                            <li>
                                <h3>Adresse mail</h3>
                                {{ $showUser->email }}
                            </li>
                        </ul><br />

                        <div>
                            @if ($showRequest->approbation == false)

                            <div class="">
                                <form method="POST" action="{{ route ('DRHdestroyrequest', $showRequest->id) }}">
                                    @csrf

                                    <button class="btn btn-secondary">Supprimer</button>
                                </form>
                                @if ($showRequest->invitation == false)
                                <form method="POST">
                                    @csrf

                                    <button class="btn btn-secondary">Inviter pour un entretien</button>
                                </form>

                                <a href="{{ route ('DRHlistestage', 'newRequest') }}" class="btn btn-secondary">Fermer</a>
                                @else
                                <form method="POST">
                                    @csrf

                                    <button class="btn btn-secondary">Approuver la demande</button>
                                </form>

                                <a href="{{ route ('DRHlistestage', 'requestBeingProcessed') }}" class="btn btn-secondary">Fermer</a>
                                @endif
                            </div>
                            @else
                            <form method="POST">
                                @csrf

                                <button class="btn btn-secondary">Thème</button>
                            </form>

                            <form method="POST">
                                @csrf

                                <button class="btn btn-secondary">Rapport</button>
                            </form>

                            <a href="{{ route ('DRHlistestage', 'requestApproved') }}" class="btn btn-secondary">Fermer</a>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
