<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de l'utilisateur
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="max-w-2xl mx-auto bg-white border rounded-lg p-6">

            <h1 class="text-2xl font-bold mb-6">
                Informations du compte
            </h1>

            <div class="space-y-4">

                <div>
                    <strong>Nom :</strong>
                    {{ $user->name }}
                </div>

                <div>
                    <strong>Email :</strong>
                    {{ $user->email }}
                </div>

                <div>
                    <strong>Rôle :</strong>
                    {{ $user->roles->pluck('name')->join(', ') }}
                </div>

                <div>
                    <strong>Compte créé le :</strong>
                    {{ $user->created_at->format('d/m/Y H:i') }}
                </div>

                <div>
                    <strong>Dernière modification :</strong>
                    {{ $user->updated_at->format('d/m/Y H:i') }}
                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <a
                    href="{{ route('users.edit', $user) }}"
                    class="px-4 py-2 bg-gray-800 text-white rounded"
                >
                    Modifier
                </a>

                <a
                    href="{{ route('users.index') }}"
                    class="px-4 py-2 border rounded"
                >
                    Retour
                </a>

            </div>

        </div>

    </div>
</x-app-layout>
