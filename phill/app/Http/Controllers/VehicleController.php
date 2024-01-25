<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('enterprise')->get();
        // dd($vehicles);
        return view('vehicles.index', [
            'vehicles' => $vehicles,
        ]);
    }

    public function create()
    {
        return view('vehicles.create', [
            'enterprises' => \App\Models\Enterprise::all(),
        ]);
    }

    public function store(VehicleRequest $request)
    {
        Vehicle::create([
            'enterprise_id' => $request->enterprise_id,
            'plate' => $request->plate,
        ]);
        $request->session()->flash('success', 'Veículo criado com sucesso!');
        return to_route('vehicles.index');
    }
    
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        if (! $vehicle) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('vehicles.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }

        return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

    public function update(VehicleRequest $request) {
        $vehicle = Vehicle::find($request->vehicle_id);
        if(! $vehicle) {
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('vehicles.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }

        $vehicle->update([
            'enterprise_id' => $request->enterprise_id,
            'plate' => $request->plate,
        ]);

        $request->session()->flash('success', 'Veículo atualizado com sucesso!');
        return to_route('vehicles.index');
    }

    public function destroy(Request $request) {
        $vehicle = Vehicle::find($request->vehicle_id);
        if(! $vehicle){
            session()->flash('error', 'Não foi possível encontrar essa operação!');
            return redirect()->route('vehicles.index')->withErrors([
                'error' => 'Não foi possível encontrar essa operação!'
            ]);
        }
        $vehicle->delete();
        session()->flash('success', 'Veículo removido com sucesso!');
        return to_route('vehicles.index');
    }
}
