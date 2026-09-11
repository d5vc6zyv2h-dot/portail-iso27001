<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\Treatment;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $evaluationId = session('evaluation_id');

        $evaluation = null;
        $risks = collect();

        if ($evaluationId) {

            $evaluation = Evaluation::where('id', $evaluationId)
                ->where('user_id', auth()->id())
                ->first();

            if ($evaluation) {
                $risks = Risk::where('user_id', auth()->id())
                    ->where('evaluation_id', $evaluationId)
                    ->with('treatment')
                    ->orderByDesc('criticite')
                    ->get();
            }
        }

        return view('treatments.index', compact(
            'risks',
            'evaluation'
        ));
    }

    public function store(Request $request, Risk $risk)
    {
        $request->validate([
            'solution' => 'required|string',
            'responsable' => 'nullable|string',
            'date_limite' => 'nullable|date',
            'statut' => 'required|string',
        ]);

        if ($risk->user_id !== auth()->id()) {
            abort(403);
        }

        Treatment::updateOrCreate(
            ['risk_id' => $risk->id],
            [
                'solution' => $request->solution,
                'responsable' => $request->responsable,
                'date_limite' => $request->date_limite,
                'statut' => $request->statut,
            ]
        );

        return redirect()
            ->route('treatments.index')
            ->with('success', 'Le risque a été enregistré avec succès.')
            ->withFragment('risk-' . $risk->id);
    }
}
