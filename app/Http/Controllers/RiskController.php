<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\Evaluation;

class RiskController extends Controller
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
                    ->orderByDesc('criticite')
                    ->get();
            }
        }

        return view('risks.index', compact(
            'risks',
            'evaluation'
        ));
    }
}
