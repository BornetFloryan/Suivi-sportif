<?php

namespace App\Http\Controllers;

use App\Models\Seance;

use Illuminate\Http\Request;
use Illuminate\Http\Facades\Auth;

class SeanceController extends Controller
{
    public function index(){
        $seances = Seance::where('user_id', Auth::id())->get();
        return view('seances.index', compact('seances'));
    }

    public function create(){
        return view('seances.create');
    }

    public function store(Request $request){
        Seance::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'note' => $request->input('note'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('seances.index');
    }
}
