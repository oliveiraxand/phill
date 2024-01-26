<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::with('enterprise')->get();
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
            'name' => strtoupper($request->name),
            'cpf' => $request->cpf,
            'birth' => $request->birth,
            'enterprise_id' => $request->enterprise_id,
        ]);
        $request->session()->flash('success', 'Pessoa criada com sucesso!');
        return to_route('persons.index');
    }
    
    public function edit($id)
    {
        $person = Person::find($id);
        if (! $person) {
            session()->flash('error', 'Não foi possível encontrar essa pessoa!');
            return redirect()->route('persons.index')->withErrors([
                'error' => 'Não foi possível encontrar essa pessoa!'
            ]);
        }
        $enterprise = \App\Models\Enterprise::find($person->enterprise_id);
        return view('persons.edit', ['person' => $person, 'enterprise' => $enterprise]);
    }

    public function update(PersonRequest $request) {
        $person = Person::find($request->person_id);
        if(! $person) {
            session()->flash('error', 'Não foi possível encontrar essa pessoa!');
            return redirect()->route('persons.index')->withErrors([
                'error' => 'Não foi possível encontrar essa pessoa!'
            ]);
        }

        $person->update([
            'name' => strtoupper($request->name),
            'cpf' => $request->cpf,
            'birth' => $request->birth,
        ]);

        $request->session()->flash('success', 'Pessoa atualizado com sucesso!');
        return to_route('persons.index');
    }

    public function destroy(Request $request) {
        $person = Person::find($request->person_id);
        if(! $person){
            session()->flash('error', 'Não foi possível encontrar essa pessoa!');
            return redirect()->route('persons.index')->withErrors([
                'error' => 'Não foi possível encontrar essa pessoa!'
            ]);
        }
        $person->delete();
        session()->flash('success', 'Pessoa removido com sucesso!');
        return to_route('persons.index');
    }
}
