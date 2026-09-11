<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportEditController extends Controller
{
    public function edit()
    {
        $evaluationId = session('evaluation_id');

        if (!$evaluationId) {
            return redirect()
                ->route('questionnaire.index')
                ->with('error', 'Aucune évaluation sélectionnée.');
        }

        $evaluation = Evaluation::where('id', $evaluationId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$evaluation) {
            return redirect()
                ->route('questionnaire.index')
                ->with('error', 'Cette évaluation n’existe pas.');
        }

        return view('reports.edit', compact('evaluation'));
    }

    public function update(Request $request)
    {
        $evaluationId = session('evaluation_id');

        $evaluation = Evaluation::where('id', $evaluationId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'conclusion' => ['nullable', 'string'],
        ]);

        $evaluation->update([
            'nom' => $request->nom,
            'conclusion' => $request->conclusion,
        ]);

        return redirect()
            ->route('report.edit')
            ->with('success', 'Le rapport a été enregistré avec succès.');
    }
}
