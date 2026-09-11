<nav class="fixed top-0 left-0 right-0 z-50 bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-slate-700">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-16">

            <!-- Portail ISO 27001 -->
            <div class="flex items-center h-16">
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center h-16 font-semibold text-gray-800 dark:text-slate-100 text-base">
                    🏠 Portail ISO 27001
                </a>
            </div>

            <!-- Navigation -->
            <div class="flex items-center gap-6 h-16">

                <!-- Tableau de bord -->
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center h-16 text-gray-700 dark:text-slate-100 text-base hover:text-blue-600 dark:hover:text-blue-300">
                    Tableau de bord
                </a>

                <!-- Modules -->
                <div x-data="{ open: false }" class="relative h-16">

                    <button
                        type="button"
                        @click="open = !open"
                        class="inline-flex items-center h-16 text-gray-700 dark:text-slate-100 text-base hover:text-blue-600 dark:hover:text-blue-300"
                    >
                        Modules ▾
                    </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"
                        class="absolute right-0 mt-2 w-56 bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded-lg shadow-lg z-50"
                    >

                        @can('gerer_utilisateurs')
                            <a href="{{ route('users.index') }}"
                               class="block px-4 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-600">
                                Gestion utilisateurs
                            </a>
                        @endcan

                        @can('gerer_evaluations')
                            <a href="{{ route('evaluations.index') }}"
                               class="block px-4 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-600">
                                Évaluations
                            </a>
                        @endcan

                        @can('remplir_questionnaire')
                            <a href="{{ route('questionnaire.index') }}"
                               class="block px-4 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-600">
                                Questionnaire ISO
                            </a>
                        @endcan

                        @can('gerer_risques')
                            <a href="{{ route('risks.index') }}"
                               class="block px-4 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-600">
                                Analyse des risques
                            </a>
                        @endcan

                        @can('gerer_traitements')
                            <a href="{{ route('treatments.index') }}"
                               class="block px-4 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-600">
                                Plan de traitement
                            </a>
                        @endcan

                        @can('voir_audit')
                            <a href="{{ route('audit.index') }}"
                               class="block px-4 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-600">
                                Journal
                            </a>
                        @endcan

                        <!-- Rapport -->
                        <div x-data="{ reportOpen: false }">

                            <button
                                type="button"
                                @click="reportOpen = !reportOpen"
                                class="flex items-center justify-between w-full px-4 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-600"
                            >
                                <span>Rapport</span>
                                <span>▸</span>
                            </button>

                            <div
                                x-show="reportOpen"
                                class="bg-gray-50 dark:bg-slate-800 border-t border-gray-100 dark:border-slate-600"
                            >

                                <a href="{{ route('report.pdf') }}"
                                   class="block px-6 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                                    Générer le PDF
                                </a>

                                <a href="{{ route('report.edit') }}"
                                   class="block px-6 py-2 text-gray-700 dark:text-slate-100 hover:bg-gray-100 dark:hover:bg-slate-700">
                                    Modifier le rapport
                                </a>

                            </div>

                        </div>

                    </div>

                </div>


		<!-- Aide & Contact -->
		<a href="{{ route('help.index') }}"
   	          class="inline-flex items-center h-16 text-gray-700 dark:text-slate-100 text-base hover:text-blue-600 dark:hover:text-blue-300">
    		   Aide & Contact
		</a>

                <!-- Profil -->
                <a href="{{ route('profile.edit') }}"
                   class="inline-flex items-center h-16 text-gray-700 dark:text-slate-100 text-base hover:text-blue-600 dark:hover:text-blue-300">
                    Profil
                </a>

                <!-- Déconnexion -->
                <form method="POST"
                      action="{{ route('logout') }}"
                      class="flex items-center h-16">

                    @csrf

                    <button
                        type="submit"
                        class="inline-flex items-center h-16 text-gray-700 dark:text-slate-100 text-base hover:text-red-500 dark:hover:text-red-400"
                    >
                        Déconnexion
                    </button>

                </form>

                <!-- Mode sombre -->
                <button
                    type="button"
                    onclick="toggleDarkMode()"
                    class="inline-flex items-center justify-center w-10 h-10 rounded-lg text-gray-700 dark:text-yellow-300 hover:bg-gray-100 dark:hover:bg-slate-700 text-xl"
                    title="Changer le thème"
                >
                    <span id="theme-icon">🌙</span>
                </button>

            </div>

        </div>

    </div>

</nav>

<script>
    function toggleDarkMode() {

        const html = document.documentElement;
        const icon = document.getElementById('theme-icon');

        if (html.classList.contains('dark')) {

            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');

            if (icon) {
                icon.textContent = '🌙';
            }

        } else {

            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');

            if (icon) {
                icon.textContent = '☀️';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function () {

        const icon = document.getElementById('theme-icon');

        if (
            icon &&
            document.documentElement.classList.contains('dark')
        ) {
            icon.textContent = '☀️';
        }

    });
</script>
