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

    public function create()
    {
        return view('seances.create');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('seances.index');
    }

    public function edit(Seance $seance)
    {
        if ($seance->user_id !== Auth::id()) abort(403);
        return view('seances.edit', compact('seance'));
    }

    public function update(Request $request, Seance $seance)
    {
        if ($seance->user_id !== Auth::id()) abort(403);

        $seance->update([
            'title' => $request->title,
            'date'  => $request->date,
            'note'  => $request->note,
        ]);

        return redirect()->route('seances.index', $seance->id);
    }

    public function destroy($id)
    {
        $seance = Seance::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$seance) {
            return redirect()->route('seances.index');
        }

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
