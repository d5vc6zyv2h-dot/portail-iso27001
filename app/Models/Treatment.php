<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'risk_id',
        'solution',
        'responsable',
        'date_limite',
        'statut',
    ];

    public function risk()
    {
        return $this->belongsTo(Risk::class);
    }
}
