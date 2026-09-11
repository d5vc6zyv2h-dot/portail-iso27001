<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Questionnaire ISO 27001
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Évaluation de la sécurité de l'information
                </h3>

                <p class="text-sm text-gray-600 mb-6">
                    Répondez aux questions suivantes afin d'identifier les risques liés à la sécurité.
                </p>

                @if (session('success'))
                    <div class="mb-6 p-3 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-3 bg-red-100 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-6">

                    @if ($evaluation)

                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4">

                            <p class="text-sm text-gray-500">
                                Évaluation actuelle
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $evaluation->nom }}
                            </p>

                            <p class="text-sm text-gray-600 mt-1">
                                Statut :
                                <span class="font-medium text-gray-800">
                                    {{ $evaluation->statut }}
                                </span>
                            </p>

                        </div>

                    @else

                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4">

                            <p class="text-gray-600">
                                Aucune évaluation en cours.
                            </p>

                        </div>

                    @endif

                    <a href="{{ route('questionnaire.create') }}"
                       class="inline-block px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                        + Nouvelle évaluation
                    </a>

                </div>

                @if ($evaluation)

                    <form method="POST" action="{{ route('questionnaire.store') }}">
                        @csrf

                        @foreach ($questions as $index => $question)

                            <div class="mb-6 pb-6 border-b border-gray-200">

                                <p class="font-medium text-gray-800 mb-3">
                                    {{ $index + 1 }}. {{ $question->question }}
                                </p>

                                <p class="text-sm text-gray-600 mb-3">
                                    Catégorie : {{ $question->categorie }}
                                </p>

                                <div class="flex gap-6">

                                    <label class="flex items-center gap-2">
                                        <input type="radio"
                                               name="question_{{ $question->id }}"
                                               value="oui"
                                               class="text-gray-700">
                                        <span>Oui</span>
                                    </label>

                                    <label class="flex items-center gap-2">
                                        <input type="radio"
                                               name="question_{{ $question->id }}"
                                               value="non"
                                               class="text-gray-700">
                                        <span>Non</span>
                                    </label>

                                    <label class="flex items-center gap-2">
                                        <input type="radio"
                                               name="question_{{ $question->id }}"
                                               value="partiellement"
                                               class="text-gray-700">
                                        <span>Partiellement</span>
                                    </label>

                                </div>

                            </div>

                        @endforeach

                        <button type="submit"
                                class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                            Enregistrer les réponses
                        </button>

                    </form>

                @else

                    <p class="text-sm text-gray-600">
                        Cliquez sur « Nouvelle évaluation » pour commencer le questionnaire.
                    </p>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
