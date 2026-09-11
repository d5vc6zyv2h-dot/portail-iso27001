```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased bg-gray-100">

        <div class="min-h-screen flex flex-col items-center justify-center px-4">

            <!-- RBAC -->
            <div class="mb-6 text-center">

                <div class="flex items-center justify-center gap-3">
                    <span class="w-10 h-px bg-gray-400"></span>

                    <h1 class="text-4xl font-extrabold tracking-widest text-gray-800">
                        RBAC
                    </h1>

                    <span class="w-10 h-px bg-gray-400"></span>
                </div>

                <p class="text-sm text-gray-500 mt-2 tracking-wide">
                    Contrôle d'accès basé sur les rôles
                </p>

            </div>

            <!-- Formulaire -->
            <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

        </div>

    </body>
</html>
```
