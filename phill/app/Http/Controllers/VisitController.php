<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VisitRequest;
use App\Models\Visit;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::all();
        // dd($visits);
        return view('visits.index', [
            'visits' => $visits,
        ]);
    }

    public function create()
    {
        return view('visits.create', [
            'enterprises' => \App\Models\Enterprise::all(),
        ]);
    }

    public function store(VisitRequest $request)
    {
        Visit::create([
            'enterprise_id' => $request->enterprise_id,
            'plate' => $request->plate,
        ]);
        $request->session()->flash('success', 'Veículo criado com sucesso!');
        return to_route('visits.index');
    }
    
    public function edit($id)
    {
        $visit = Visit::find($id);
        if (! $visit) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('visits.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }
        $enterprise = \App\Models\Enterprise::find($visit->enterprise_id);
        return view('visits.edit', ['visit' => $visit, 'enterprise' => $enterprise]);
    }

    public function update(VisitRequest $request) {
        $visit = Visit::find($request->visit_id);
        if(! $visit) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('visits.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }

        $visit->update([
            'plate' => $request->plate,
        ]);

        $request->session()->flash('success', 'Veículo atualizado com sucesso!');
        return to_route('visits.index');
    }

    public function destroy(Request $request) {
        $visit = Visit::find($request->visit_id);
        if(! $visit){
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('visits.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }
        $visit->delete();
        session()->flash('success', 'Veículo removido com sucesso!');
        return to_route('visits.index');
    }
}
