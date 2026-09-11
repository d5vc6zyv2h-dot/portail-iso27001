<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des utilisateurs
        </h2>
    </x-slot>

    <div class="p-6">

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold text-gray-800">
                Utilisateurs
            </h1>

            <a
                href="{{ route('users.create') }}"
                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
            >
                + Ajouter un utilisateur
            </a>

        </div>

        <div class="space-y-3">

            @foreach($users as $user)

                <div class="p-4 bg-white border border-gray-200 rounded flex justify-between items-center shadow-sm">

                    <div>

                        <strong class="text-gray-800">
                            {{ $user->name }}
                        </strong>

                        <div class="text-gray-600">
                            {{ $user->email }}
                        </div>

                        <div class="mt-1 text-gray-700">
                            <strong>Rôle :</strong>
                            {{ $user->roles->pluck('name')->join(', ') }}
                        </div>

                    </div>

                    <div class="flex gap-2">

                        {{-- Consulter --}}
                        <a
                            href="{{ route('users.show', $user) }}"
                            class="px-4 py-2 border border-gray-300 text-gray-700 rounded hover:bg-gray-100"
                        >
                            Consulter
                        </a>

                        {{-- Modifier --}}
                        <a
                            href="{{ route('users.edit', $user) }}"
                            class="px-4 py-2 border border-gray-300 text-gray-700 rounded hover:bg-gray-100"
                        >
                            Modifier
                        </a>

                        {{-- Supprimer --}}
                        <form
                            action="{{ route('users.destroy', $user) }}"
                            method="POST"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="px-4 py-2 border border-red-500 text-red-600 rounded hover:bg-red-50"
                            >
                                Supprimer
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</x-app-layout>
