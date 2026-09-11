<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Evaluation;
use App\Models\Question;
use App\Models\Risk;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        $evaluationId = session('evaluation_id');

        $evaluation = null;

        if ($evaluationId) {
            $evaluation = Evaluation::where('id', $evaluationId)
                ->where('user_id', auth()->id())
                ->first();
        }

        return view('questionnaire.index', compact(
            'questions',
            'evaluation'
        ));
    }

    public function create()
    {
        $evaluation = Evaluation::create([
            'user_id' => auth()->id(),
            'nom' => 'Évaluation du ' . now()->format('d/m/Y H:i'),
            'statut' => 'En cours',
        ]);

        session(['evaluation_id' => $evaluation->id]);

        return redirect()
            ->route('questionnaire.index')
            ->with('success', 'Une nouvelle évaluation a été créée.');
    }

    public function store(Request $request)
    {
        $evaluationId = session('evaluation_id');

        if (!$evaluationId) {
            return redirect()
                ->route('questionnaire.index')
                ->with('error', 'Veuillez commencer une nouvelle évaluation.');
        }

        $evaluation = Evaluation::where('id', $evaluationId)
            ->where('user_id', auth()->id())
            ->first();

        if (!$evaluation) {
            session()->forget('evaluation_id');

            return redirect()
                ->route('questionnaire.index')
                ->with('error', 'Cette évaluation n’existe plus.');
        }

        	$questions = Question::all();

/*
|--------------------------------------------------------------------------
| Vérification des réponses
|--------------------------------------------------------------------------
| Toutes les questions doivent être répondues avant l'enregistrement.
*/

foreach ($questions as $question) {

    if (!$request->filled('question_' . $question->id)) {

        return redirect()
            ->route('questionnaire.index')
            ->with('error', 'Veuillez répondre à toutes les questions avant d’enregistrer le questionnaire.');
    }
}

/*
|--------------------------------------------------------------------------
| Enregistrement des réponses et calcul des risques
|--------------------------------------------------------------------------
*/

foreach ($questions as $question) {

    $reponse = $request->input('question_' . $question->id);

    Answer::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'question_id' => $question->id,
            'evaluation_id' => $evaluationId,
        ],
        [
            'reponse' => $reponse,
        ]
    );

    if ($reponse === 'oui') {

        $probabilite = 1;
        $impact = 1;
        $niveau = 'Faible';

    } elseif ($reponse === 'partiellement') {

        $probabilite = 3;
        $impact = 3;
        $niveau = 'Moyen';

    } else {

        $probabilite = 5;
        $impact = 5;
        $niveau = 'Critique';
    }

    $criticite = $probabilite * $impact;

    Risk::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'evaluation_id' => $evaluationId,
            'description' => $question->question,
        ],
        [
            'probabilite' => $probabilite,
            'impact' => $impact,
            'criticite' => $criticite,
            'niveau' => $niveau,
        ]
    );
}
 

        $evaluation->update([
            'statut' => 'Terminée',
        ]);

        return redirect()
            ->route('questionnaire.index')
            ->with('success', 'Les réponses et les risques ont été enregistrés avec succès.');
    }
}
