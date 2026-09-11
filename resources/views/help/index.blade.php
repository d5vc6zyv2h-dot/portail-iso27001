
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Aide & Contact
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Présentation -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    À propos du Portail ISO 27001
                </h3>

                <p class="text-sm text-gray-600 leading-relaxed">
                    Le Portail ISO 27001 est une plateforme web destinée à accompagner
                    les organisations dans l'identification et l'analyse des risques
                    liés à la sécurité de l'information.
                </p>

                <p class="text-sm text-gray-600 leading-relaxed mt-3">
                    Il permet notamment de réaliser des évaluations, d'identifier les
                    risques, de définir des mesures de traitement et de générer un rapport.
                </p>

            </div>


            <!-- Guide -->
            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-5">
                    Comment utiliser le portail ?
                </h3>

                <div class="space-y-5">

                    <div class="flex gap-4">
                        <div class="w-8 h-8 flex-shrink-0 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold">
                            1
                        </div>

                        <div>
                            <p class="font-medium text-gray-800">
                                Créer une évaluation
                            </p>

                            <p class="text-sm text-gray-600 mt-1">
                                Créez une nouvelle évaluation pour commencer une analyse.
                            </p>
                        </div>
                    </div>


                    <div class="flex gap-4">
                        <div class="w-8 h-8 flex-shrink-0 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold">
                            2
                        </div>

                        <div>
                            <p class="font-medium text-gray-800">
                                Répondre au questionnaire
                            </p>

                            <p class="text-sm text-gray-600 mt-1">
                                Répondez aux 10 questions du questionnaire ISO.
                            </p>
                        </div>
                    </div>


                    <div class="flex gap-4">
                        <div class="w-8 h-8 flex-shrink-0 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold">
                            3
                        </div>

                        <div>
                            <p class="font-medium text-gray-800">
                                Analyser les risques
                            </p>

                            <p class="text-sm text-gray-600 mt-1">
                                Consultez les risques identifiés ainsi que leur criticité.
                            </p>
                        </div>
                    </div>


                    <div class="flex gap-4">
                        <div class="w-8 h-8 flex-shrink-0 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold">
                            4
                        </div>

                        <div>
                            <p class="font-medium text-gray-800">
                                Définir le plan de traitement
                            </p>

                            <p class="text-sm text-gray-600 mt-1">
                                Définissez les mesures nécessaires pour traiter les risques.
                            </p>
                        </div>
                    </div>


                    <div class="flex gap-4">
                        <div class="w-8 h-8 flex-shrink-0 rounded-full bg-gray-800 text-white flex items-center justify-center font-semibold">
                            5
                        </div>

                        <div>
                            <p class="font-medium text-gray-800">
                                Générer le rapport
                            </p>

                            <p class="text-sm text-gray-600 mt-1">
                                Modifiez la conclusion puis générez le rapport au format PDF.
                            </p>
                        </div>
                    </div>

                </div>

            </div>


            <!-- FAQ -->
            <div
                x-data="{ open: null }"
                class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm mb-6"
            >

                <h3 class="text-lg font-semibold text-gray-800 mb-5">
                    Questions fréquentes
                </h3>


                <div class="border-b border-gray-200">

                    <button
                        type="button"
                        @click="open = open === 1 ? null : 1"
                        class="w-full py-4 flex justify-between text-left"
                    >
                        <span class="font-medium text-gray-800">
                            À quoi sert le portail ?
                        </span>

                        <span class="text-gray-600">
                            <span x-show="open !== 1">+</span>
                            <span x-show="open === 1">−</span>
                        </span>
                    </button>

                    <div
                        x-show="open === 1"
                        class="pb-4 text-sm text-gray-600"
                    >
                        Le portail permet d'identifier, d'évaluer et de traiter les risques
                        liés à la sécurité de l'information.
                    </div>

                </div>


                <div class="border-b border-gray-200">

                    <button
                        type="button"
                        @click="open = open === 2 ? null : 2"
                        class="w-full py-4 flex justify-between text-left"
                    >
                        <span class="font-medium text-gray-800">
                            Combien de questions contient le questionnaire ?
                        </span>

                        <span class="text-gray-600">
                            <span x-show="open !== 2">+</span>
                            <span x-show="open === 2">−</span>
                        </span>
                    </button>

                    <div
                        x-show="open === 2"
                        class="pb-4 text-sm text-gray-600"
                    >
                        Le questionnaire contient actuellement 10 questions.
                    </div>

                </div>


                <div class="border-b border-gray-200">

                    <button
                        type="button"
                        @click="open = open === 3 ? null : 3"
                        class="w-full py-4 flex justify-between text-left"
                    >
                        <span class="font-medium text-gray-800">
                            Peut-on gérer plusieurs évaluations ?
                        </span>

                        <span class="text-gray-600">
                            <span x-show="open !== 3">+</span>
                            <span x-show="open === 3">−</span>
                        </span>
                    </button>

                    <div
                        x-show="open === 3"
                        class="pb-4 text-sm text-gray-600"
                    >
                        Oui. Plusieurs évaluations peuvent être créées et sélectionnées.
                    </div>

                </div>


                <div class="border-b border-gray-200">

                    <button
                        type="button"
                        @click="open = open === 4 ? null : 4"
                        class="w-full py-4 flex justify-between text-left"
                    >
                        <span class="font-medium text-gray-800">
                            Peut-on générer un rapport ?
                        </span>

                        <span class="text-gray-600">
                            <span x-show="open !== 4">+</span>
                            <span x-show="open === 4">−</span>
                        </span>
                    </button>

                    <div
                        x-show="open === 4"
                        class="pb-4 text-sm text-gray-600"
                    >
                        Oui. Le rapport peut être généré au format PDF.
                    </div>

                </div>


                <div>

                    <button
                        type="button"
                        @click="open = open === 5 ? null : 5"
                        class="w-full py-4 flex justify-between text-left"
                    >
                        <span class="font-medium text-gray-800">
                            Qui peut utiliser la plateforme ?
                        </span>

                        <span class="text-gray-600">
                            <span x-show="open !== 5">+</span>
                            <span x-show="open === 5">−</span>
                        </span>
                    </button>

                    <div
                        x-show="open === 5"
                        class="pb-4 text-sm text-gray-600"
                    >
                        La plateforme peut être utilisée par les organisations souhaitant
                        structurer leur démarche d'analyse et de gestion des risques.
                    </div>

                </div>

            </div>


            <!-- Entreprises -->
<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 text-center mb-6">

    <h3 class="text-2xl font-semibold text-gray-800 dark:text-white">
        Vous souhaitez utiliser notre plateforme ?
    </h3>

    <p class="text-gray-600 dark:text-gray-300 mt-3 max-w-2xl mx-auto">
        Vous représentez une entreprise ou une organisation et souhaitez
        découvrir le Portail ISO 27001, demander une démonstration ou discuter
        d'une installation adaptée à vos besoins ?
    </p>

    <a href="#contact"
       class="inline-block mt-5 px-5 py-2
              bg-gray-800 dark:bg-white
              text-white dark:text-gray-800
              rounded-lg
              hover:bg-gray-700 dark:hover:bg-gray-100">
        Nous contacter
    </a>

</div>


            <!-- Équipe -->
            <div id="contact">

                <div class="text-center mb-6">

                    <h3 class="text-2xl font-semibold text-gray-800">
                        Notre équipe
                    </h3>

                    <p class="text-sm text-gray-600 mt-2">
                        Une équipe dédiée au développement et à la maintenance de la plateforme.
                    </p>

                </div>

            	
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    			<!-- Mvuezolo Tshitshi Jordan -->
    		<div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm text-center dark:bg-gray-800 dark:border-gray-700">

        	<div class="w-28 h-28 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 flex items-center justify-center">
            		<img src="{{ asset('images/equipe/jordan.jpg') }}"
     				alt="Mvuezolo Tshitshi Jordan"
    			 class="w-full h-full object-cover rounded-full">
        	</div>

        	<h4 class="font-semibold text-gray-800 dark:text-white">
            	Mvuezolo Tshitshi Jordan
        	</h4>

        	<p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
            	Développeur Web — Authentification & RBAC
        	</p>

        	<div class="mt-4 text-sm text-gray-600 dark:text-gray-400 space-y-1">
            	<p>Téléphone :+243 898547401</p>
            <p>Email :jordantshitshi@icloud.com</p>
        </div>

    </div>


    <!-- Nyaketi Somba Christine -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-5 shadow-sm text-center">

        <div class="w-28 h-28 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 flex items-center justify-center">
            <img src="{{ asset('images/equipe/christine.png') }}"
     	alt="Nyaketi Somba Christine"
     	class="w-full h-full object-cover rounded-full">
        </div>

        <h4 class="font-semibold text-gray-800 dark:text-white">
            Nyaketi Somba Christine
        </h4>

        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
            Développeur Web — Questionnaire & Analyse des risques
        </p>

        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400 space-y-1">
            <p>Téléphone :+243 820800936</p>
            <p>Email : christinenyaketi@gmail.com</p>
        </div>

    </div>


    <!-- Tutomisa Ngungu Simon -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-5 shadow-sm text-center">

        <div class="w-28 h-28 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 flex items-center justify-center">
            	<img src="{{ asset('images/equipe/simon.png') }}"
     		alt="Tutomisa Ngungu Simon"
    		 class="w-full h-full object-cover rounded-full">
        </div>

        <h4 class="font-semibold text-gray-800 dark:text-white">
            Tutomisa Ngungu Simon
        </h4>

        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
            Développeur Web — Plan de traitement & Rapport
        </p>

        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400 space-y-1">
            <p>Téléphone :+243 838168999</p>
            <p>Email : Simontutomisa1@gmail.com</p>
        </div>

    </div>


    <!-- Ndeka Kazadi Gloria -->
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-5 shadow-sm text-center">

        <div class="w-28 h-28 mx-auto mb-4 rounded-full bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-700 flex items-center justify-center">
            	<img src="{{ asset('images/equipe/gloria.png') }}"
		alt="Ndeka Kazadi Gloria"
     		class="w-full h-full object-cover rounded-full">
        </div>



        <h4 class="font-semibold text-gray-800 dark:text-white">
            Ndeka Kazadi Gloria
        </h4>

        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
            Développeur Web — Journal d’audit
        </p>

        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400 space-y-1">
            <p>Téléphone :+243 898853490</p>
            <p>Email : </p>
        </div>


    </div>

</div>



                </div>

            </div>

        </div>
    </div>

</x-app-layout>

