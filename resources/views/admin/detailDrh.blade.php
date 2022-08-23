<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail DRH') }}
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
                        <li>PRENOM : {{ $showDrh->firstname }}</li>
                        <li>NOM : {{ $showDrh->name }}</li>
                        <li>EMAIL : {{ $showDrh->email }}</li>
                    </ul><br />

                <div>
                    <form method="POST" action="{{ route('deletedrh', $showDrh->id) }}">
                        @csrf

                        <button type="submit" class="btn btn-secondary">Supprimer</button>
                    </form>
                    <form method="POST" action="{{ route('updatedrh', $showDrh->id) }}">
                        @csrf

                        <button type="submit" class="btn btn-secondary">Modifier</button>
                    </form>
                <a href="{{ route('listedrh') }}" class="btn btn-secondary">Fermer</a>
                </div>
                </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
