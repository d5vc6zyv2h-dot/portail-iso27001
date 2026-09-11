<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Analyse des risques
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4">

            <!-- Introduction -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800">
                    Risques identifiés
                </h3>

                <p class="text-sm text-gray-600 mt-1">
                    Résultats obtenus à partir du questionnaire ISO 27001.
                </p>
            </div>

            <!-- Cartes des risques -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @forelse ($risks as $risk)

                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">

                        <p class="text-sm text-gray-600 mb-2">
                            Risque {{ $loop->iteration }}
                        </p>

                        <h4 class="font-semibold text-gray-800 mb-4">
                            {{ $risk->description }}
                        </h4>

                        <div class="grid grid-cols-3 gap-4">

                            <div>
                                <p class="text-xs text-gray-600">
                                    Probabilité
                                </p>

                                <p class="text-xl font-bold text-gray-800 mt-1">
                                    {{ $risk->probabilite }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-600">
                                    Impact
                                </p>

                                <p class="text-xl font-bold text-gray-800 mt-1">
                                    {{ $risk->impact }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-600">
                                    Criticité
                                </p>

                                <p class="text-xl font-bold text-gray-800 mt-1">
                                    {{ $risk->criticite }}
                                </p>
                            </div>

                        </div>

                        <div class="mt-5 pt-4 border-t border-gray-100">

                            <span class="text-sm text-gray-600">
                                Niveau :
                            </span>

                            <span class="text-sm font-semibold text-gray-800">
                                {{ $risk->niveau }}
                            </span>

                        </div>

                    </div>

                		@empty

    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
        <p class="text-gray-600">
            Aucun risque identifié.
        </p>
    </div>

@endforelse

            </div>

        </div>
    </div>

</x-app-layout>
