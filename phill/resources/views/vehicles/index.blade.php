@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Placa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td scope="row">{{$vehicle->id}} </td>
                                <td scope="row">{{$vehicle->enterprise->name}} </td>
                                <td scope="row">{{$vehicle->plate}} </td>
                                <td scope="row"></td>
                                <td id="outer">
                                <a class="inner btn btn-sm btn-success" href="{{ route('vehicles.edit', $vehicle->id) }}">Editar</a>
                                    <form method="post" action="{{ route('vehicles.destroy') }}" class="inner" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                                        <input type="submit" class="btn btn-sm btn-danger" value="Apagar">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
