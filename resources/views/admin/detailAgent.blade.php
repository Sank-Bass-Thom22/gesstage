<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail agents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if(session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif

                <section>
                    <ul>
                        <li>PRENOM : {{ $agent->prenom }}</li>
                        <li>NOM : {{ $agent->nom }}</li>
                        <li>EMAIL : {{ $agent->email }}</li>
                        <li>TELEPHONE : {{ $agent->tel }}</li>
                        <li>FONCTION : {{ $agent->fonction }}</li>
                        <li>
                            SERVICE : 
                            @if ($service->visibilite == true)
                            {{ $service->servicename }}
                            @else
                            {{ __('Aucun service.') }}
                            @endif
                        </li>
                    </ul><br />

                <div>
                <a href="{{ route('listeagent') }}" class="btn btn-secondary">Fermer</a>
                </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>