<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    protected $fillable = [
        'user_id',
        'evaluation_id',
        'description',
        'probabilite',
        'impact',
        'criticite',
        'niveau',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function treatment()
    {
        return $this->hasOne(Treatment::class);
    }
}
