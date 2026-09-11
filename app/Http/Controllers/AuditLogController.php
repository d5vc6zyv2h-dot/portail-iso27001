<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::with('user')
            ->latest()
            ->get();

        $deletedLogs = AuditLog::onlyTrashed()
            ->with('user')
            ->latest('deleted_at')
            ->get();

        return view('audit.index', compact('logs', 'deletedLogs'));
    }



        public function delete($id)
    {
            $log = AuditLog::findOrFail($id);

            $log->delete();

       return redirect()
           ->route('audit.index')
           ->with('success', 'Le journal a été déplacé vers les journaux supprimés.');
    }

    public function restore($id)
    {
        $log = AuditLog::withTrashed()->findOrFail($id);

        $log->restore();

        return redirect()
            ->route('audit.index')
            ->with('success', 'Le journal a été restauré avec succès.');
    }

    public function forceDelete($id)
    {
        $log = AuditLog::withTrashed()->findOrFail($id);

        $log->forceDelete();

        return redirect()
            ->route('audit.index')
            ->with('success', 'Le journal a été supprimé définitivement.');
    }
}
