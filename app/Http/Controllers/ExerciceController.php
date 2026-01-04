<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Exercice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciceController extends Controller
{
    public function index()
    {
        $exercices = Exercice::whereHas('seance', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('seance')->get();

        return view('exercices.index', compact('exercices'));
    }

    public function create()
    {
        $seances = Seance::where('user_id', Auth::id())->get();
        return view('exercices.create', compact('seances'));
    }

    public function store(Request $request)
    {
        $seance = Seance::where('id', $request->seance_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        Exercice::create([
            'name' => $request->name,
            'sets' => $request->sets,
            'reps' => $request->reps,
            'weight' => $request->weight,
            'seance_id' => $seance->id,
        ]);

        return redirect()->route('exercices.index');
    }

    public function edit(Exercice $exercice)
    {
        if ($exercice->seance->user_id !== Auth::id()) abort(403);

        $seances = Seance::where('user_id', Auth::id())->get();

        return view('exercices.edit', compact('exercice', 'seances'));
    }

    public function update(Request $request, Exercice $exercice)
    {
        if ($exercice->seance->user_id !== Auth::id()) abort(403);

        $exercice->update($request->only('name', 'sets', 'reps', 'weight', 'seance_id'));

        return redirect()->route('exercices.index');
    }

    public function destroy($id)
    {
        $exercice = Exercice::where('id', $id)
            ->whereHas('seance', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->first();

        if (!$exercice) {
            return redirect()->route('exercices.index');
        }

        $exercice->delete();

        return redirect()->route('exercices.index');
    }
}
