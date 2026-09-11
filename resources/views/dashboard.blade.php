<x-app-layout>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Utilisateurs -->
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <p class="text-sm text-gray-600">
                        Utilisateurs
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $users }}
                    </p>
                </div>


                <!-- Risques -->
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <p class="text-sm text-gray-600">
                        Risques
                    </p>

                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $riskCount }}
                    </p>
                </div>


                   <!-- Rapport -->
<div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">

    <p class="text-sm text-gray-600">
        Rapports
    </p>

    <p class="text-3xl font-bold text-gray-800 mt-2">
        {{ ($evaluation && $riskCount > 0) ? 1 : 0 }}
    </p>

    @if ($evaluation && $riskCount > 0)
        <a
            href="{{ route('report.pdf') }}"
            class="inline-block mt-3 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700"
        >
            Générer le PDF
        </a>
    @endif

</div>

            </div>

        </div>
    </div>

</x-app-layout>
