<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord
        </h2>
    </x-slot>

    <div class="p-6">
        <h1 class="text-2xl font-bold">
            Bienvenue {{ auth()->user()->name }}
        </h1>

        <p class="mt-2">
            Rôle :
            <strong>{{ auth()->user()->getRoleNames()->first() }}</strong>
        </p>

        <div class="mt-6 space-y-2">

            @can('gerer_utilisateurs')
                <p>👥 Gestion des utilisateurs</p>
            @endcan

            @can('gerer_risques')
                <p>⚠️ Gestion des risques</p>
            @endcan

            @can('gerer_traitements')
                <p>🛠️ Plan de traitement</p>
            @endcan

            @can('voir_audit')
                <p>📜 Journal d'audit</p>
            @endcan

            @can('remplir_questionnaire')
                <p>📝 Questionnaire</p>
            @endcan

        </div>
    </div>
</x-app-layout>
