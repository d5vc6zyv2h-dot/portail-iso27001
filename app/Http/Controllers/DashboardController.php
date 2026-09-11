<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Risk;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $evaluationId = session('evaluation_id');

        $evaluation = null;
        $riskCount = 0;

        if ($evaluationId) {

            $evaluation = Evaluation::where('id', $evaluationId)
                ->where('user_id', auth()->id())
                ->first();

            if ($evaluation) {
                $riskCount = Risk::where('evaluation_id', $evaluationId)
                    ->where('user_id', auth()->id())
                    ->count();
            }
        }

        $users = User::count();

        return view('dashboard', compact(
            'users',
            'evaluation',
            'riskCount'
        ));
    }
}
