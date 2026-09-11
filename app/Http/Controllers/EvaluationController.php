<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::where('user_id', auth()->id())
            ->withCount('risks')
            ->latest()
            ->get();

        $deletedEvaluations = Evaluation::onlyTrashed()
            ->where('user_id', auth()->id())
            ->withCount('risks')
            ->latest('deleted_at')
            ->get();

        $evaluationId = session('evaluation_id');

        return view('evaluations.index', compact(
            'evaluations',
            'deletedEvaluations',
            'evaluationId'
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
            ->with('success', 'Une nouvelle évaluation a été créée. Vous pouvez maintenant remplir le questionnaire.');
    }

    public function select(Evaluation $evaluation)
    {
        if ($evaluation->user_id !== auth()->id()) {
            abort(403);
        }

        session(['evaluation_id' => $evaluation->id]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Évaluation sélectionnée avec succès.');
    }

    public function destroy(Evaluation $evaluation)
    {
        if ($evaluation->user_id !== auth()->id()) {
            abort(403);
        }

        $evaluation->delete();

        if (session('evaluation_id') == $evaluation->id) {
            session()->forget('evaluation_id');
        }

        return redirect()
            ->route('evaluations.index')
            ->with('success', 'L’évaluation a été déplacée vers la corbeille.');
    }

	public function restore($id)
{
    $evaluation = Evaluation::onlyTrashed()
        ->where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $evaluation->restore();

    return redirect()
        ->route('evaluations.index')
        ->with('success', 'L’évaluation a été restaurée avec succès.');
}
}
