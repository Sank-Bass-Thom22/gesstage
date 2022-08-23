<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard DRH') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Stage</h1>
                    <ul>
                        <li><a href="{{ route ('DRHlistestage', 'newRequest') }}">Nouvelles demandes</a></li>
                        <li><a href="{{ route ('DRHlistestage', 'requestBeingProcessed') }}">Demandes en cour de traitement</a></li>
                        <li><a href="{{ route ('DRHlistestage', 'requestApproved') }}">Demandes acceptées</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
