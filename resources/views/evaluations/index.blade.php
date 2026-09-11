<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mes évaluations
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- En-tête -->
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Évaluations
                    </h3>

                    <p class="text-sm text-gray-600 mt-1">
                        Sélectionnez une évaluation pour travailler dessus.
                    </p>
                </div>

                <form method="POST" action="{{ route('evaluations.create') }}">
                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700"
                    >
                        + Nouvelle évaluation
                    </button>
                </form>

            </div>


            <!-- Évaluations actives -->
            @if ($evaluations->count() > 0)

                <div class="space-y-4">

                    @foreach ($evaluations as $evaluation)

                        <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm">

                            <div class="flex items-center justify-between gap-4">

                                <!-- Informations -->
                                <div>

                                    <h4 class="font-semibold text-gray-800">
                                        {{ $evaluation->nom }}
                                    </h4>

                                    <div class="mt-2 text-sm text-gray-600 space-y-1">

                                        <p>
                                            Statut :
                                            <span class="font-medium text-gray-700">
                                                {{ $evaluation->statut }}
                                            </span>
                                        </p>

                                        <p>
                                            Risques :
                                            <span class="font-medium text-gray-700">
                                                {{ $evaluation->risks_count }}
                                            </span>
                                        </p>

                                        <p>
                                            Créée le :
                                            {{ $evaluation->created_at->format('d/m/Y à H:i') }}
                                        </p>

                                    </div>

                                </div>


                                <!-- Actions -->
                                	<div class="flex items-center gap-4">

    					@if ($evaluationId == $evaluation->id)

        				<span class="inline-flex items-center justify-center px-4 py-2 text-sm bg-green-100 text-green-700 rounded-lg whitespace-nowrap">
           					 Évaluation active
       					 </span>

					@else

                                        <form
                                            method="POST"
                                            action="{{ route('evaluations.select', $evaluation) }}"
                                        >
                                            @csrf

                                            <button
                                                type="submit"
                                                class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 whitespace-nowrap"
                                            >
                                                Sélectionner
                                            </button>
                                        </form>

                                    @endif


                                    <form
                                        method="POST"
                                        action="{{ route('evaluations.destroy', $evaluation) }}"
                                        onsubmit="return confirm('Voulez-vous vraiment déplacer cette évaluation vers la corbeille ?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 whitespace-nowrap"
                                        >
                                            Supprimer
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white border border-gray-200 rounded-lg p-8 text-center">

                    <p class="text-gray-600 mb-4">
                        Aucune évaluation n'a encore été créée.
                    </p>

                    <form method="POST" action="{{ route('evaluations.create') }}">
                        @csrf

                        <button
                            type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700"
                        >
                            Créer une évaluation
                        </button>

                    </form>

                </div>

            @endif


            <!-- Corbeille -->
            @if ($deletedEvaluations->count() > 0)

                <div
                    class="mt-8"
                    x-data="{ open: false }"
                >

                    <!-- Bouton pour afficher/cacher -->
                    <button
                        type="button"
                        @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 bg-white border border-gray-200 rounded-lg text-left hover:bg-gray-50"
                    >

                        <span class="font-semibold text-gray-800">
                            Évaluations supprimées
                        </span>

                        <span
                            class="text-gray-600"
                            x-text="open ? '▲' : '▼'"
                        ></span>

                    </button>


                    <!-- Contenu caché -->
                    <div
                        x-show="open"
                        x-transition
                        class="mt-4 space-y-4"
                    >

                        @foreach ($deletedEvaluations as $evaluation)

                            <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm">

                                <div class="flex items-center justify-between gap-4">

                                    <!-- Informations -->
                                    <div>

                                        <h4 class="font-semibold text-gray-800">
                                            {{ $evaluation->nom }}
                                        </h4>

                                        <div class="mt-2 text-sm text-gray-600 space-y-1">

                                            <p>
                                                Statut :
                                                <span class="font-medium text-gray-700">
                                                    {{ $evaluation->statut }}
                                                </span>
                                            </p>

                                            <p>
                                                Risques :
                                                <span class="font-medium text-gray-700">
                                                    {{ $evaluation->risks_count }}
                                                </span>
                                            </p>

                                            <p>
                                                Supprimée le :
                                                {{ $evaluation->deleted_at->format('d/m/Y à H:i') }}
                                            </p>

                                        </div>

                                    </div>


                                    <!-- Restaurer -->
                                    <div>

                                        <form
                                            method="POST"
                                            action="{{ route('evaluations.restore', $evaluation->id) }}"
                                        >
                                            @csrf

                                            <button
                                                type="submit"
                                                class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 whitespace-nowrap"
                                            >
                                                Restaurer
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>
    </div>

</x-app-layout>

