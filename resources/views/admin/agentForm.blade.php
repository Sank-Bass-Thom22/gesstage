<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" /><br />

        @if(session()->get('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <br />

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Enregistrement d'un agent
        </h2><br />

        <form method="POST" action="{{ route('addagent') }}">
            @csrf

            <!-- Prénom -->
            <div>
                <x-label for="prenom" :value="__('Prénom')" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>

            <!-- Nom -->
            <div>
            <x-label for="nom" :value="__('Nom')" />

            <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>

            <!-- Email -->
            <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Téléphone -->
            <div class="mt-4">
            <x-label for="tel" :value="__('Téléphone')" />

            <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required />
            </div>

            <!-- Fonction -->
            <div class="mt-4">
            <x-label for="fonction" :value="__('Fonction')" />

            <x-input id="fonction" class="block mt-1 w-full" type="text" name="fonction" :value="old('fonction')" required />
            </div>

            <!-- Service -->
            <div class="mt-4">
                <label for="service">Service</label>

                <select id=service" name="id_service" required>
            <option value="">-----</option>
            @foreach($listeService as $liste)
            <option value="{{ $liste->id }}">{{ $liste->servicename }}</option>
            @endforeach
        </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Valider') }}
                </x-button>
            </div>
        </form>

        <div>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Fermer</a>
        </div>
    </x-auth-card>
</x-guest-layout>
