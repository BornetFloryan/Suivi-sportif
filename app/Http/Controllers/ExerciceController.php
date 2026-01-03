<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Exercice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciceController extends Controller
{
    public function store(Request $request, Seance $seance)
    {
        if ($seance->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string',
            'sets' => 'required|integer',
            'reps' => 'required|integer',
            'weight' => 'nullable|integer',
        ]);

        $seance->exercices()->create($request->all());

        return redirect()->route('seances.show', $seance);
    }

    public function destroy(Seance $seance, Exercice $exercice)
    {
        if ($seance->user_id !== Auth::id()) {
            abort(403);
        }

        $exercice->delete();

        return redirect()->route('seances.show', $seance);
    }
}