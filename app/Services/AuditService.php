<?php

namespace App\Services;

use App\Models\AuditLog;

class AuditService
{
    public static function log(string $action, ?string $description = null): void
    {
        $previousHash = AuditLog::latest('id')->value('hash') ?? '';

        $data = ($previousHash ?? '')
            . '|' . auth()->id()
            . '|' . $action
            . '|' . ($description ?? '')
            . '|' . now()->toDateTimeString();

        $hash = hash('sha256', $data);

        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'description' => $description,
            'hash' => $hash,
        ]);
    }
}
