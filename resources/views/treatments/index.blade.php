<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Plan de traitement
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800">
                    Traitement des risques
                </h3>

                <p class="text-sm text-gray-600 mt-1">
                    Définissez les actions à mettre en place pour traiter les risques identifiés.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @forelse ($risks as $risk)

                    <div
                        id="risk-{{ $risk->id }}"
                        x-data="{ editing: {{ $risk->treatment ? 'false' : 'true' }} }"
                        class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm"
                    >

                        <p class="text-sm text-gray-600 mb-2">
                            Risque {{ $loop->iteration }}
                        </p>

                        <h4 class="font-semibold text-gray-800 mb-4">
                            {{ $risk->description }}
                        </h4>

                        <div class="grid grid-cols-2 gap-4 mb-5">

                            <div>
                                <p class="text-xs text-gray-600">
                                    Criticité
                                </p>

                                <p class="text-xl font-bold text-gray-800 mt-1">
                                    {{ $risk->criticite }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-600">
                                    Niveau
                                </p>

                                <p class="text-xl font-bold text-gray-800 mt-1">
                                    {{ $risk->niveau }}
                                </p>
                            </div>

                        </div>

                        @if ($risk->treatment)

                            <!-- Affichage du traitement enregistré -->
                            <div x-show="!editing">

                                 <div class="mb-5 p-3 bg-green-100 dark:bg-green-900/30 border border-green-300 dark:border-green-700 rounded-lg">
    				     <p class="text-sm font-semibold text-green-800 dark:text-green-300">
        				✓ Risque enregistré
    				     </p>
				</div>

                                <div class="mb-4">
                                    <p class="text-xs text-gray-600 mb-1">
                                        Solution à mettre en place
                                    </p>

                                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700">
                                        {{ $risk->treatment->solution }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="text-xs text-gray-600 mb-1">
                                        Responsable
                                    </p>

                                    <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700">
                                        {{ $risk->treatment->responsable ?: 'Non défini' }}
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-5">

                                    <div>
                                        <p class="text-xs text-gray-600 mb-1">
                                            Date limite
                                        </p>

                                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700">
                                            {{ $risk->treatment->date_limite ?: 'Non définie' }}
                                        </div>
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-600 mb-1">
                                            Statut
                                        </p>

                                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700">
                                            {{ $risk->treatment->statut }}
                                        </div>
                                    </div>

                                </div>

                               <button
    				type="button"
    					@click="editing = true"
    					class="px-5 py-2 bg-gray-200 dark:bg-slate-600 text-gray-700 dark:text-slate-100 rounded-lg hover:bg-gray-300 dark:hover:bg-slate-500"
				>	
   					 Modifier le traitement
				</button>

                            </div>

                            <!-- Formulaire de modification -->
                            <form
                                x-show="editing"
                                method="POST"
                                action="{{ route('treatments.store', $risk) }}"
                            >

                                @csrf

                                <div class="mb-4">

                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Solution à mettre en place
                                    </label>

                                    <textarea
                                        name="solution"
                                        rows="3"
                                        required
                                        class="w-full border-gray-300 rounded-lg"
                                        placeholder="Décrire l'action à mettre en place"
                                    >{{ old('solution', $risk->treatment->solution) }}</textarea>

                                </div>

                                <div class="mb-4">

                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Responsable
                                    </label>

                                    <input
                                        type="text"
                                        name="responsable"
                                        value="{{ old('responsable', $risk->treatment->responsable) }}"
                                        class="w-full border-gray-300 rounded-lg"
                                        placeholder="Nom du responsable"
                                    >

                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-4">

                                    <div>

                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Date limite
                                        </label>

                                        <input
                                            type="date"
                                            name="date_limite"
                                            value="{{ old('date_limite', $risk->treatment->date_limite) }}"
                                            class="w-full border-gray-300 rounded-lg"
                                        >

                                    </div>

                                    <div>

                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Statut
                                        </label>

                                        <select
                                            name="statut"
                                            class="w-full border-gray-300 rounded-lg"
                                        >

                                            <option value="En attente"
                                                {{ old('statut', $risk->treatment->statut) === 'En attente' ? 'selected' : '' }}>
                                                En attente
                                            </option>

                                            <option value="En cours"
                                                {{ old('statut', $risk->treatment->statut) === 'En cours' ? 'selected' : '' }}>
                                                En cours
                                            </option>

                                            <option value="Terminé"
                                                {{ old('statut', $risk->treatment->statut) === 'Terminé' ? 'selected' : '' }}>
                                                Terminé
                                            </option>

                                        </select>

                                    </div>

                                </div>

                                <div class="flex items-center gap-3">

                                    <button
                                        type="submit"
                                        class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700"
                                    >
                                        Enregistrer le traitement
                                    </button>

                                    <button
                                        type="button"
                                        @click="editing = false"
                                        class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300"
                                    >
                                        Annuler
                                    </button>

                                </div>

                            </form>

                        @else

                            <!-- Nouveau traitement -->
                            <form
                                method="POST"
                                action="{{ route('treatments.store', $risk) }}"
                            >

                                @csrf

                                <div class="mb-4">

                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Solution à mettre en place
                                    </label>

                                    <textarea
                                        name="solution"
                                        rows="3"
                                        required
                                        class="w-full border-gray-300 rounded-lg"
                                        placeholder="Décrire l'action à mettre en place"
                                    >{{ old('solution') }}</textarea>

                                </div>

                                <div class="mb-4">

                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Responsable
                                    </label>

                                    <input
                                        type="text"
                                        name="responsable"
                                        value="{{ old('responsable') }}"
                                        class="w-full border-gray-300 rounded-lg"
                                        placeholder="Nom du responsable"
                                    >

                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-4">

                                    <div>

                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Date limite
                                        </label>

                                        <input
                                            type="date"
                                            name="date_limite"
                                            value="{{ old('date_limite') }}"
                                            class="w-full border-gray-300 rounded-lg"
                                        >

                                    </div>

                                    <div>

                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Statut
                                        </label>

                                        <select
                                            name="statut"
                                            class="w-full border-gray-300 rounded-lg"
                                        >
                                            <option value="En attente">
                                                En attente
                                            </option>

                                            <option value="En cours">
                                                En cours
                                            </option>

                                            <option value="Terminé">
                                                Terminé
                                            </option>
                                        </select>

                                    </div>

                                </div>

                                <button
                                    type="submit"
                                    class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700"
                                >
                                    Enregistrer le traitement
                                </button>

                            </form>

                        @endif

                    		</div>
			
       				@empty
			
    				<div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
        			<p class="text-gray-600">
            			Aucun risque à traiter.
        		</p>
    		</div>

		@endforelse

            </div>

        </div>
    </div>

</x-app-layout>
