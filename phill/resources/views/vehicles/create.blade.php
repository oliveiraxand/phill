@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('vehicles.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Empresa</label>
                            <select name="enterprise_id" id="enterprise_id" class="form-select">  
                                @foreach($enterprises as $enterprise)
                                    <option value="{{ $enterprise->id }}">{{ $enterprise->name }}</option>
                                @endforeach
                            </select>
                            <label>Placa</label>
                            <input
                                type="text"
                                class="form-control"
                                id="plate"
                                name="plate"
                                placeholder="AAA0000"
                                style="text-transform:uppercase"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
