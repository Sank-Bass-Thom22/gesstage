<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détail stage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->get('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                    @endif

                    <section>
                        <ul>
                            <li>
                                <h3>Intitulé du stage :</h3>
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}">
                                    @csrf

                                    <div id="int-write">
                                        {{ $detailStage->intitule }}
                                    </div>

                                    <div id="int-read" style="visibility:hidden">
                                        <x-input id="intitule" class="block mt-1 w-full" type="text" name="intitule" :value="__($detailStage->intitule)" required autofocus />
                                    </div>

                                    <x-button class="btn btn-secondary" id="int-mod">Modifier</x-button>
                                    <x-button class="btn btn-secondary" style="visibility:hidden" id="int-val">Valider</x-button>
                                </form>
                                @else
                                <div id="int-write-x">{{ $detailStage->intitule }}</div>
                                @endif
                            </li>
                            <li>
                                <h3>Période du stage :</h3>
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}">
                                    @csrf

                                    <div class="" id="date-df-write">
                                        du {{ $detailStage->datedebut }} au {{ $detailStage->datefin }}
                                    </div>

                                    <div style="visibility:hidden" id="debut-read">
                                        <x-label for="datedebut" :value="__('Début du stage')" />

                                        <x-input id="datedebut" class="block mt-1 w-full" type="date" name="datedebut" :value="__($detailStage->datedebut)" required autofocus />
                                    </div>

                                    <div style="visibility:hidden" id="fin-read">
                                        <x-label for="datefin" :value="__('Fin du stage')" />

                                        <x-input id="datefin" class="block mt-1 w-full" type="date" name="datefin" :value="__($detailStage->datefin)" required autofocus />
                                    </div>

                                    <x-button class="btn btn-secondary" id="date-df-mod">Modifier</x-button>
                                    <x-button class="btn btn-secondary" style="visibility:hidden" id="date-df-val">Valider</x-button>
                                </form>
                                @else
                                <div id="date-df-write-x">du {{ $detailStage->datedebut }} au {{ $detailStage->datefin }}</div>
                                @endif
                            </li>
                            <li>
                                <h3>Curriculum vitae :</h3>
                                <!--{{ $detailStage->curriculumvitae }}-->
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div id="cv-download">
                                        <a href="Curriculum-vitae/ACg7mAEH5d0zoXYbR70d45rkYTwa8GqMN8jDfoej.pdf">curriculum-vitae.pdf</a>
                                    </div>

                                    <div class="mt-4" style="visibility:hidden" id="cv-upload">
                                        <x-input id="curriculumvitae" class="block mt-1 w-full" type="file" name="curriculumvitae" required />
                                    </div>

                                    <x-button class="btn btn-secondary" id="cv-mod">Mettre à jour</x-button>
                                    <x-button class="btn btn-secondary" style="visibility:hidden" id="cv-val">Valider</x-button>
                                </form>
                                @else
                                <div id="cv-download-x"><a href="Curriculum-vitae/ACg7mAEH5d0zoXYbR70d45rkYTwa8GqMN8jDfoej.pdf">curriculum-vitae.pdf</a></div>
                                @endif
                            </li>
                            <li>
                                <h3>Lettre de motivation :</h3>
                                <!--{{ $detailStage->motivation }}-->
                                @if ($detailStage->invitation == false)
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div id="ldm-download">
                                        <a href="Lettre-de-motivation/EDGrNdNaPEM9ecJhU25vRTFb6RyQmyq7c3TKratc.pdf">lettre-de-motivation.pdf</a>
                                    </div>

                                    <div id="" style="visibility:hidden" id="ldm-upload">
                                        <x-label for="motivation" :value="__('Lettre de motivation')" />

                                        <x-input id="motivation" class="block mt-1 w-full" type="file" name="motivation" required />
                                    </div>

                                    <x-button class="btn btn-secondary" id="ldm-mod">Mettre à jour</x-button>
                                    <x-button class="btn btn-secondary" style="visibility:hidden" id="ldm-val">Valider</x-button>
                                </form>
                                @else
                                <div id="ldm-download-x"><a href="Lettre-de-motivation/EDGrNdNaPEM9ecJhU25vRTFb6RyQmyq7c3TKratc.pdf">lettre-de-motivation.pdf</a></div>
                                @endif
                            </li>

                            @if ($detailStage->approbation == true)
                            <li>
                                <h3>Thème de recherche :</h3>
                                @if ($detailStage->theme == '')
                                <p>Aucun thème de recherche enregistré pour le moment.</p><br />
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Ajouter</x-button>
                                </form>
                                @else
                                <p>{{ $detailStage->theme }}</p><br />
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Modifier</x-button>
                                </form>
                                @endif
                            </li>
                            <li>
                                <h3>Maître de stage :</h3>
                                @if ($detailAgent->email == '')
                                <p>Aucun maître de stage assigné pour le moment.</p>
                                @else
                                <p>
                                    {{ $detailAgent->prenom }} {{ $detailAgent->nom }}
                                    {{ $detailAgent->fonction }} {{ $detailService->servicename }}
                                    {{ $detailAgent->tel }}
                                    {{ $detailAgent->email }}
                                </p>
                                @endif
                            </li>
                            <li>
                                <h3>Mémoir ou rapport de fin de stage :</h3>
                                @if ($detailStage->rapport == '')
                                <p>Aucun mémoir ou rapport de stage enregistré pour le moment.</p><br />
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Ajouter</x-button>
                                </form>
                                @else
                                {{ $detailStage->rapport }}
                                <form method="POST" action="{{ route ('listestage', $detailStage->id) }}">
                                    @csrf

                                    <x-button class="btn btn-secondary">Modifier</x-button>
                                </form>
                                @endif
                            </li>
                            @endif
                        </ul><br />

                        <div>
                            <a href="{{ route('listestage') }}" class="btn btn-secondary">Fermer</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
