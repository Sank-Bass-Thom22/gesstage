<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Création d\'un compte DRH') }}
        </h2>
    </x-slot><br />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                            <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" /><br />

                    @if(session()->get('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                    @endif

                    <form method="POST" action="{{ route('registerdrh') }}">
                        @csrf

                        <!-- Firstname -->
                        <div>
                            <x-label for="firstname" :value="__('Prénom')" />

                            <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
                        </div>

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Nom')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Mot de passe')" />

                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <!--
<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
{{ __('Déjà inscrit?') }}
</a>
-->

                            <x-button class="ml-4">
                                {{ __('Valider') }}
                            </x-button>
                        </div>
                    </form><br />

                    <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Fermer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </x-app-layout>