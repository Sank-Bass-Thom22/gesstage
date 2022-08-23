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
            Ajout d'un service
        </h2><br />

        <form method="POST" action="{{ route('addservice') }}">
            @csrf

            <!-- Servicename -->
            <div>
                <x-label for="servicename" :value="__('Nom service')" />

                <x-input id="servicename" class="block mt-1 w-full" type="text" name="servicename" :value="old('servicename')" required autofocus />
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