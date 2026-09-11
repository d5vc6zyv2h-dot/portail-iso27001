<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter un utilisateur
        </h2>
    </x-slot>

    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">
            Nouvel utilisateur
        </h1>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block">Nom</label>
                <input type="text" name="name" class="border rounded w-full p-2">
            </div>

            <div class="mb-4">
                <label class="block">Email</label>
                <input type="email" name="email" class="border rounded w-full p-2">
            </div>

            <div class="mb-4">
                <label class="block">Mot de passe</label>
                <input type="password" name="password" class="border rounded w-full p-2">
            </div>

            <div class="mb-4">
                <label class="block">Rôle</label>

                <select name="role" class="border rounded w-full p-2">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    class="px-4 py-2 bg-gray-800 text-white rounded">
                Créer l'utilisateur
            </button>
        </form>
    </div>
</x-app-layout>
