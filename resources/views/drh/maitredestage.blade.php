<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Choix d\'un maitre de stage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('DRHapprobation', $idStage) }}">
                        @csrf

                        <!-- Liste des agents -->
                        <div>
                            <label for="agent">Liste des agents</label><br />

                            <select id="agent" name="idAgent" required>
                                <option>*</option>
                                @forelse($allAgent as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->prenom }} {{ $agent->nom }}</option>
                                @empty
                                Aucun agent enregistré.
                                @endforelse
                            </select>
                        </div>

                        <div>
                            <button class="btn btn-secondary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
