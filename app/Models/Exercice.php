<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sets',
        'reps',
        'weight',
        'seance_id',
    ];

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
}