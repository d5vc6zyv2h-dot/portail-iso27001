<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function pdf()
    {
        $evaluationId = session('evaluation_id');

        if (!$evaluationId) {
            return redirect()
                ->route('questionnaire.index')
                ->with('error', 'Aucune évaluation sélectionnée.');
        }

        $evaluation = Evaluation::where('id', $evaluationId)
            ->where('user_id', Auth::id())
            ->with('risks')
            ->first();

        if (!$evaluation) {
            return redirect()
                ->route('questionnaire.index')
                ->with('error', 'Cette évaluation n’existe pas.');
        }

        $risks = $evaluation->risks()
            ->with('treatment')
            ->orderByDesc('criticite')
            ->get();

        $pdf = Pdf::loadView('reports.pdf', compact(
            'evaluation',
            'risks'
        ));

        return $pdf->download('rapport-analyse-risques.pdf');
    }
}
