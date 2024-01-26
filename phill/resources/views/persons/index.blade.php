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
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Aniversário</th>
                            <th scope="col">Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($persons as $person)
                            <tr>
                                <td scope="row">{{$person->id}} </td>
                                <td scope="row">{{$person->name}} </td>
                                <td scope="row">{{$person->cpf}} </td>
                                <td scope="row">{{$person->birth}} </td>
                                <td scope="row">{{$person->enterprise_id}} </td>
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
