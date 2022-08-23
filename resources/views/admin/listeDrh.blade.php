<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des DRH') }}
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
                            @forelse ($allDrh as $drh)
                            <li>
                                <a href="{{ route ('showdrh', $drh->id) }}">{{ $drh->firstname }}{{ __(' ') }}{{ $drh->name }}</a>
                                                            </li>
                            @empty
                            <li>.
                                {{ __('Il n\'y a aucun DRH enregistré.') }}
                            </li>
                            @endforelse
                        </ul><br />

                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Fermer</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
