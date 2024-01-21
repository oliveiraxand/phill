<?php

namespace App\Http\Controllers;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use App\Http\Requests\EnterpriseRequest;

class EnterpriseController extends Controller
{
    public function index()
    {
        $enterprises = Enterprise::all();
        return view('enterprises.index', [
            'enterprises' => $enterprises,
        ]);
    }

    public function create()
    {
        return view('enterprises.create');
    }

    public function store(EnterpriseRequest $request)
    {
        Enterprise::create([
            'name' => strtoupper($request->name),
            'cnpj' => $request->cnpj,
            'is_partner' => $request->is_partner,
        ]);
        $request->session()->flash('success', 'Empresa criada com sucesso!');
        return to_route('enterprises.index');
    }
    
    public function edit($id)
    {
        $enterprise = Enterprise::find($id);
        if (! $enterprise) {
            session()->flash('error', 'Não foi possível encontrar essa empresa!');
            return redirect()->route('enterprises.index')->withErrors([
                'error' => 'Não foi possível encontrar essa empresa!'
            ]);
        }

        return view('enterprises.edit', ['enterprise' => $enterprise]);
    }

    public function update(EnterpriseRequest $request) {
        $enterprise = Enterprise::find($request->enterprise_id);
        if(! $enterprise) {
            session()->flash('error', 'Não foi possível encontrar essa empresa!');
            return redirect()->route('enterprises.index')->withErrors([
                'error' => 'Não foi possível encontrar essa empresa!'
            ]);
        }

        $enterprise->update([
            'name' => strtoupper($request->name),
            'cnpj' => $request->cnpj,
            'is_partner' => $request->is_partner,
        ]);

        $request->session()->flash('success', 'empresa atualizada com sucesso!');
        return to_route('enterprises.index');
    }

    public function destroy(Request $request) {
        $enterprise = Enterprise::find($request->enterprise_id);
        if(! $enterprise){
            session()->flash('error', 'Não foi possível encontrar essa empresa!');
            return redirect()->route('enterprises.index')->withErrors([
                'error' => 'Não foi possível encontrar essa empresa!'
            ]);
        }
        $enterprise->delete();
        session()->flash('success', 'Empresa removida com sucesso!');
        return to_route('enterprises.index');
    }
}