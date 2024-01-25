@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('vehicles.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                        <label>Empresa</label>
                            <input 
                                type="text"
                                class="form-control"
                                id="enterprise"
                                name="enterprise"
                                style="text-transform:uppercase"
                                value="{{ $enterprise->name }}"
                                disabled
                            />
                            <label>Placa</label>
                            <input
                                type="text"
                                class="form-control"
                                id="plate"
                                name="plate"
                                placeholder="AAA0000"
                                style="text-transform:uppercase"
                                value="{{ $vehicle->plate }}"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
