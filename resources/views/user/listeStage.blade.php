<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes demandes de stage') }}
        </h2>
    </x-slot><br />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->get('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                    @endif

                    <section>
                        <ul>
                            @forelse ($allStage as $stage)
                            <li>
                                <a href="{{ route('showstage', $stage->id) }}">{{ $stage->intitule }}</a><br />
                                @if($stage->invitation == false)
                                {{ __('En attente de traitement.') }}
                                @elseif($stage->invitation == true && $stage->approbation == false)
                                {{ __('En cours de traitement.') }}
                                @else
                                @if(date('Y-m-d') < $stage->datedebut)
                                    {{ __('Stage à venir.') }}
                                    @elseif(date('Y-m-d') > $stage->datefin)
                                    {{ __('Stage terminé.') }}
                                    @else
                                    {{ __('Stage en cours.') }}
                                    @endif
                                    @endif
                            </li><br />
                            @empty
                            <li>
                                {{ __('Vous n\'avez aucune demande de stage enregistrée.') }}
                            </li><br />
                            @endforelse
                        </ul>

                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Fermer</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
