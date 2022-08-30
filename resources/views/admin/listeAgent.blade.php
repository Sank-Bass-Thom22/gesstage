<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des agents') }}
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
                        <table>
                            <thead>
                                <tr>
                                    <td>AGENT</td>
                                    <td colspan="2">OPTIONS</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($allAgent as $agent)
                                <tr>
                                    <td><a href="{{ route('showagent', $agent->id) }}">{{ $agent->prenom }} {{ $agent->nom }}</a></td>
                                    <td>
                                        <form method="POST" action="{{ route('editagentform', $agent->id) }}">
                                            @csrf

                                            <x-button class="btn btn-primary">
                                                {{ __('Modifier') }}
                                            </x-button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('deleteagent', $agent->id) }}">
                                            @csrf

                                            <x-button class="btn btn-danger">
                                                {{ __('Supprimer') }}
                                            </x-button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><br />

                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Fermer</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
