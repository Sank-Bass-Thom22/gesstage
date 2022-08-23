<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
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
                            @forelse ($listeStage as $stage)
                            <li>
                                <a href="{{ route ('DRHshowrequest', $stage->id) }}">{{ $stage->intitule }}</a><br />
                                du {{ $stage->datedebut }} au {{ $stage->datefin }}
                            </li><br />
                            @empty
                            <li>
                                @if ($title === 'Nouvelles demandes')
                                {{ __('Vous n\'avez aucune demande de stage enregistrée.') }}
                                @elseif ($title === 'Demandes en cours de traitement')
                                {{ __('Vous n\'avez aucune demande en cour de traitement.') }}
                                @else
                                {{ __('Vous n\'avez aucune demande acceptée') }}
                                @endif
                            </li>
                            @endforelse
                        </ul><br />

                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Fermer</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
