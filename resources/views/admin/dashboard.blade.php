<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Administrateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h3>Service</h3>
                        <ul>
                            <li><a href="{{ route('listeservice') }}">Liste des services</a></li>
                            <li><a href="{{ route('serviceform') }}">Ajouter un service</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3>Agent</h3>
                        <ul>
                            <li><a href="{{ route('listeagent') }}">Liste des agents</a></li>
                            <li><a href="{{ route('agentform') }}">Enregistrer un agent</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3>Compte DRH</h3>
                        <ul>
                            <li><a href="{{ route('listedrh') }}">Liste des DRH</a></li>
                            <li><a href="{{ route('drhform') }}">Créer un compte DRH</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
