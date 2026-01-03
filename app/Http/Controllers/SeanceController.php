<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeanceController extends Controller
{
    public function index()
    {
        $seances = Seance::where('user_id', Auth::id())->get();
        return view('seances.index', compact('seances'));
    }

    public function create(Request $request)
    {
        $exercices = $request->old('exercices', []);

        if ($request->filled('add_exercice')) {
            $exercices[] = ['name' => '', 'sets' => '', 'reps' => '', 'weight' => ''];
            return redirect()->back()->withInput(['exercices' => $exercices]);
        }

        if ($request->filled('remove_exercice')) {
            $indexToRemove = $request->input('remove_exercice');
            unset($exercices[$indexToRemove]);
            $exercices = array_values($exercices);
            return redirect()->back()->withInput(['exercices' => $exercices]);
        }

        return view('seances.create', compact('exercices'));
    }

    public function store(Request $request)
    {
        if ($request->filled('add_exercice') || $request->filled('remove_exercice')) {
            return redirect()->back()->withInput();
        }

        $seance = Seance::create([
            'title' => $request->title,
            'date'  => $request->date,
            'note'  => $request->note,
            'user_id' => Auth::id(),
        ]);

        if ($request->has('exercices')) {
            foreach ($request->exercices as $exercice) {
                if (!empty($exercice['name'])) {
                    $seance->exercices()->create($exercice);
                }
            }
        }

        return redirect()->route('seances.index')->with('success', 'Séance créée !');
    }

    public function edit(Request $request, Seance $seance)
    {
        if ($seance->user_id !== Auth::id()) abort(403);

        $exercices = $request->old('exercices', $seance->exercices->toArray());

        if ($request->filled('add_exercice')) {
            $exercices[] = ['name' => '', 'sets' => '', 'reps' => '', 'weight' => ''];
            return redirect()->back()->withInput(['exercices' => $exercices]);
        }

        if ($request->filled('remove_exercice')) {
            $indexToRemove = $request->input('remove_exercice');
            unset($exercices[$indexToRemove]);
            $exercices = array_values($exercices);
            return redirect()->back()->withInput(['exercices' => $exercices]);
        }

        return view('seances.edit', compact('seance', 'exercices'));
    }

    public function update(Request $request, Seance $seance)
    {
        if ($seance->user_id !== Auth::id()) abort(403);

        if ($request->filled('add_exercice') || $request->filled('remove_exercice')) {
            return redirect()->back()->withInput();
        }

        $seance->update([
            'title' => $request->title,
            'date'  => $request->date,
            'note'  => $request->note,
        ]);

        $exercicesInput = $request->input('exercices', []);
        $ids = collect($exercicesInput)->pluck('id')->filter()->toArray();
        $seance->exercices()->whereNotIn('id', $ids)->delete();

        foreach ($exercicesInput as $exerciceData) {
            if (isset($exerciceData['id'])) {
                $exercice = $seance->exercices()->find($exerciceData['id']);
                if ($exercice) $exercice->update($exerciceData);
            } else {
                if (!empty($exerciceData['name'])) {
                    $seance->exercices()->create($exerciceData);
                }
            }
        }

        return redirect()->route('seances.index')->with('success', 'Séance modifiée avec succès !');
    }

    public function destroy(Seance $seance)
    {
        if ($seance->user_id !== Auth::id()) abort(403);
        $seance->delete();
        return redirect()->route('seances.index');
    }

    public function historique(Request $request)
    {
        $query = Seance::where('user_id', Auth::id());

        if ($request->filled('search')) $query->where('title', 'like', '%' . $request->search . '%');
        if ($request->filled('date')) $query->where('date', $request->date);

        $order = $request->get('order', 'desc');
        $seances = $query->orderBy('date', $order)->get();

        return view('seances.historique', compact('seances'));
    }

    public function show(Seance $seance)
    {
        if ($seance->user_id !== Auth::id()) abort(403);
        $seance->load('exercices');
        return view('seances.show', compact('seance'));
    }
}
