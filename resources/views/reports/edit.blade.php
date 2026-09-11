<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier le rapport
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow p-6">

                <form method="POST" action="{{ route('report.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Nom de l'évaluation -->
                    <div class="mb-6">
                        <label for="nom"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Nom de l'évaluation
                        </label>

                        <input
                            type="text"
                            id="nom"
                            name="nom"
                            value="{{ old('nom', $evaluation->nom) }}"
                            class="w-full border-gray-300 rounded-lg focus:border-gray-500 focus:ring-gray-500"
                            required
                        >

                        @error('nom')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                       <!-- Conclusion -->
<div class="mb-6">
    <label for="conclusion"
           class="block text-sm font-medium text-gray-700 mb-2">
        Conclusion du rapport
    </label>

    <textarea
        id="conclusion"
        name="conclusion"
        rows="6"
        class="w-full border-gray-300 rounded-lg focus:border-gray-500 focus:ring-gray-500"
        placeholder="Saisissez la conclusion du rapport..."
    >{{ old('conclusion', $evaluation->conclusion) }}</textarea>

    @error('conclusion')
        <p class="mt-1 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>

                    <!-- Boutons -->
                    <div class="flex items-center gap-3">

                        <button
                            type="submit"
                            class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                            Enregistrer
                        </button>

                        <a
                            href="{{ route('report.pdf') }}"
                            class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                            Générer le PDF
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
