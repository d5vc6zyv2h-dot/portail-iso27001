 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>Rapport d'analyse des risques</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #222;
            margin: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
        }

        h2 {
            margin-top: 25px;
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .info {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 7px;
            text-align: left;
        }

        th {
            background-color: #eeeeee;
        }

        .conclusion {
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <h1>RAPPORT D'ANALYSE DES RISQUES</h1>

    <p style="text-align: center;">
        Portail ISO 27001
    </p>

    <div class="info">
        <p>
            <strong>Évaluation :</strong>
            {{ $evaluation->nom }}
        </p>

        <p>
            <strong>Statut :</strong>
            {{ $evaluation->statut }}
        </p>

        <p>
            <strong>Date du rapport :</strong>
            {{ now()->format('d/m/Y H:i') }}
        </p>
    </div>

    <h2>1. Risques identifiés</h2>

    @if($risks->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Probabilité</th>
                    <th>Impact</th>
                    <th>Criticité</th>
                    <th>Niveau</th>
                </tr>
            </thead>

            <tbody>
                @foreach($risks as $risk)
                    <tr>
                        <td>{{ $risk->description }}</td>
                        <td>{{ $risk->probabilite }}</td>
                        <td>{{ $risk->impact }}</td>
                        <td>{{ $risk->criticite }}</td>
                        <td>{{ $risk->niveau }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else

        <p>Aucun risque n'a été identifié pour cette évaluation.</p>

    @endif


    <h2>2. Plan de traitement</h2>

    @if($risks->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>Risque</th>
                    <th>Solution</th>
                    <th>Responsable</th>
                    <th>Date limite</th>
                    <th>Statut</th>
                </tr>
            </thead>

            <tbody>
                @foreach($risks as $risk)

                    @if($risk->treatment)

                        <tr>
                            <td>{{ $risk->description }}</td>
                            <td>{{ $risk->treatment->solution }}</td>
                            <td>{{ $risk->treatment->responsable }}</td>
                            <td>{{ $risk->treatment->date_limite }}</td>
                            <td>{{ $risk->treatment->statut }}</td>
                        </tr>

                    @endif

                @endforeach
            </tbody>
        </table>

    @else

        <p>Aucun traitement n'est disponible.</p>

    @endif


    <div class="conclusion">

         
    <h2>3. Conclusion</h2>

    <p>
        {{ $evaluation->conclusion }}
    </p>

    </div>

</body>
</html>
