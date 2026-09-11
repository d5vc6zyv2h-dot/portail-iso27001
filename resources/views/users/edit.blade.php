<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'utilisateur
        </h2>
    </x-slot>

    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">
            Modifier : {{ $user->name }}
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Nom</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="border rounded w-full p-2"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="border rounded w-full p-2"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block mb-1">Rôle</label>

                <select name="role" class="border rounded w-full p-2" required>
                    @foreach($roles as $role)
                        <option
                            value="{{ $role->name }}"
                            @selected($user->hasRole($role->name))
                        >
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3">
                <button
                    type="submit"
                    class="px-4 py-2 bg-gray-800 text-white rounded"
                >
                    Enregistrer les modifications
                </button>

                <a
                    href="{{ route('users.index') }}"
                    class="px-4 py-2 border rounded"
                >
                    Annuler
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
