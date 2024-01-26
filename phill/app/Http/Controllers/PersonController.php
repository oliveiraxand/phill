<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        // dd($persons);
        return view('persons.index', [
            'persons' => $persons,
        ]);
    }

    public function create()
    {
        return view('persons.create', [
            'enterprises' => \App\Models\Enterprise::all(),
        ]);
    }

    public function store(PersonRequest $request)
    {
        Person::create([
            'enterprise_id' => $request->enterprise_id,
            'plate' => $request->plate,
        ]);
        $request->session()->flash('success', 'Veículo criado com sucesso!');
        return to_route('persons.index');
    }
    
    public function edit($id)
    {
        $person = Person::find($id);
        if (! $person) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('persons.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }
        $enterprise = \App\Models\Enterprise::find($person->enterprise_id);
        return view('persons.edit', ['person' => $person, 'enterprise' => $enterprise]);
    }

    public function update(PersonRequest $request) {
        $person = Person::find($request->person_id);
        if(! $person) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('persons.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }

        $person->update([
            'plate' => $request->plate,
        ]);

        $request->session()->flash('success', 'Veículo atualizado com sucesso!');
        return to_route('persons.index');
    }

    public function destroy(Request $request) {
        $person = Person::find($request->person_id);
        if(! $person){
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('persons.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }
        $person->delete();
        session()->flash('success', 'Veículo removido com sucesso!');
        return to_route('persons.index');
    }
}
