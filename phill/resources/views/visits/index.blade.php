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
                            <th scope="col">Pessoa</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Chegada</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Saída</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Empresa Parceira</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Nota Fiscal</th>
                            <th scope="col">Comentário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visits as $visit)
                            <tr>
                                <td scope="row">{{$visit->id}} </td>
                                <td scope="row">{{$visit->person_id}} </td>
                                <td scope="row">{{$visit->vehicle_id}} </td>
                                <td scope="row">{{$visit->arrival}} </td>
                                <td scope="row">{{$visit->input}} </td>
                                <td scope="row">{{$visit->output}} </td>
                                <td scope="row">{{$visit->enterprise_client_id}} </td>
                                <td scope="row">{{$visit->enterprise_partner_id}} </td>
                                <td scope="row">{{$visit->operation_id}} </td>
                                <td scope="row">{{$visit->nfs}} </td>
                                <td scope="row">{{$visit->comment}} </td>
                                <td scope="row"></td>
                                <td id="outer">
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
