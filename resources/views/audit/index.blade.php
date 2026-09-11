<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Journal d'audit
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Journal des activités
                </h3>

                <p class="text-sm text-gray-600 mb-6">
                    Historique des actions effectuées sur le portail ISO 27001.
                </p>

                {{-- JOURNAUX ACTIFS --}}
                @if ($logs->isEmpty())

                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <p class="text-sm text-gray-600">
                            Aucune activité enregistrée pour le moment.
                        </p>
                    </div>

                @else

                    <div class="space-y-3">

                        @foreach ($logs as $log)

                            <div class="border border-gray-200 rounded-lg px-5 py-4">

                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">

                                    <div class="md:col-span-2">
                                        <p class="text-xs text-gray-400">Utilisateur</p>
                                        <p class="font-semibold text-gray-800">
                                            {{ $log->user->name ?? 'Système' }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <p class="text-xs text-gray-400">Action</p>
                                        <p class="text-sm text-gray-800">
                                            {{ $log->action }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-4">
                                        <p class="text-xs text-gray-400">Description</p>
                                        <p class="text-sm text-gray-600">
                                            {{ $log->description ?? '-' }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-2">
                                        <p class="text-xs text-gray-400">Date</p>
                                        <p class="text-sm text-gray-600 whitespace-nowrap">
                                            {{ $log->created_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-2 md:text-right">

                                        <form method="POST"
                                              action="{{ route('audit.delete', $log->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Voulez-vous supprimer ce journal ?');"
                                                    class="text-sm text-red-600 hover:text-red-700 hover:underline">
                                                Supprimer
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif


                {{-- BOUTON JOURNAUX SUPPRIMÉS --}}

                  <p class="text-red-600">
                     Utilisateur connecté : {{ auth()->user()->name }}
                     — Rôle : {{ auth()->user()->getRoleNames()->implode(', ') }}
                </p>
                 
                @if (auth()->user()->hasRole('Administrateur') && $deletedLogs->count() > 0)

                    <div class="mt-8 pt-6 border-t border-gray-200">

                        <button type="button"
                                onclick="document.getElementById('deleted-logs').classList.toggle('hidden')"
                                class="text-sm text-gray-700 hover:text-gray-900 hover:underline">
                            Voir les journaux supprimés
                        </button>


                        {{-- JOURNAUX SUPPRIMÉS CACHÉS --}}
                        <div id="deleted-logs" class="hidden mt-5">

                            <div class="space-y-3">

                                @foreach ($deletedLogs as $log)

                                    <div class="border border-gray-200 rounded-lg px-5 py-4 bg-gray-50">

                                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">

                                            <div class="md:col-span-2">
                                                <p class="text-xs text-gray-400">Utilisateur</p>
                                                <p class="font-semibold text-gray-800">
                                                    {{ $log->user->name ?? 'Système' }}
                                                </p>
                                            </div>

                                            <div class="md:col-span-2">
                                                <p class="text-xs text-gray-400">Action</p>
                                                <p class="text-sm text-gray-800">
                                                    {{ $log->action }}
                                                </p>
                                            </div>

                                            <div class="md:col-span-4">
                                                <p class="text-xs text-gray-400">Description</p>
                                                <p class="text-sm text-gray-600">
                                                    {{ $log->description ?? '-' }}
                                                </p>
                                            </div>

                                            <div class="md:col-span-4 flex gap-4 md:justify-end">

                                                <form method="POST"
                                                      action="{{ route('audit.restore', $log->id) }}">
                                                    @csrf

                                                    <button type="submit"
                                                            class="text-sm text-gray-600 hover:text-gray-900 hover:underline">
                                                        Restaurer
                                                    </button>
                                                </form>


                                                <form method="POST"
                                                      action="{{ route('audit.forceDelete', $log->id) }}"
                                                      onsubmit="return confirm('Voulez-vous supprimer définitivement ce journal ?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="text-sm text-red-600 hover:text-red-700 hover:underline">
                                                        Supprimer définitivement
                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
