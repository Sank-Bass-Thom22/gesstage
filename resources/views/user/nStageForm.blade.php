<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if(session()->get('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif

        <form method="POST" action="{{ route('addstage') }}" enctype="multipart/form-data">
            @csrf

            <!-- Intitulé du stage -->
            <div>
                <x-label for="intitule" :value="__('Intitulé du stage')" />

                <x-input id="intitule" class="block mt-1 w-full" type="text" name="intitule" :value="old('intitule')" required autofocus />
            </div>

            <!-- Début du stage -->
            <div>
            <x-label for="datedebut" :value="__('Date de début')" />

            <x-input id="datedebut" class="block mt-1 w-full" type="date" name="datedebut" :value="old('datedebut')" required autofocus />
            </div>

            <!-- Fin du stage -->
            <div>
                <x-label for="datefin" :value="__('Fin du stage')" />

                <x-input id="datefin" class="block mt-1 w-full" type="date" name="datefin" :value="old('datefin')" required />
            </div>

            <!-- Curriculum vitae -->
            <div class="mt-4">
            <x-label for="curriculumvitae" :value="__('Curriculum vitae')" />

            <x-input id="curriculumvitae" class="block mt-1 w-full" type="file" name="curriculumvitae" required />
            </div>

            <!-- Lettre de motivation -->
            <div>
            <x-label for="motivation" :value="__('Lettre de motivation')" />

            <x-input id="motivation" class="block mt-1 w-full" type="file" name="motivation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Valider') }}
                </x-button>
            </div>
        </form>
        <div>
            <a href="{{ route('dashboard') }}">Fermer</a>
        </div>
    </x-auth-card>
</x-guest-layout>
