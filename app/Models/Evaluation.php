<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'nom',
        'statut',
        'conclusion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function risks()
    {
        return $this->hasMany(Risk::class);
    }
}
