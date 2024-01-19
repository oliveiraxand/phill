<?php

namespace App\Http\Controllers;
use App\Http\Requests\OperationRequest;
use Illuminate\Http\Request;
use App\Models\Operation;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::all();
        return view('operations.index', [
            'operations' => $operations,
        ]);
    }

    public function create()
    {
        return view('operations.create');
    }

    public function store(OperationRequest $request)
    {
        Operation::create([
            'name' => strtoupper($request->name),
        ]);
        $request->session()->flash('success', 'Operação criada com sucesso!');
        return to_route('operations.index');
    }
    
    public function edit($id)
    {
        $operation = Operation::find($id);
        if (! $operation) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('operations.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }

        return view('operations.edit', ['operation' => $operation]);
    }

    public function update(OperationRequest $request) {
        $operation = Operation::find($request->operation_id);
        if(! $operation) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('operations.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }

        $operation->update([
            'name' => strtoupper($request->name),
        ]);

        $request->session()->flash('success', 'Operação atualizada com sucesso!');
        return to_route('operations.index');
    }
}