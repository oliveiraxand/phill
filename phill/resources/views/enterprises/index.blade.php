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
                    <a href="{{ route('enterprises.create') }}" class="btn btn-primary"> Cadastrar Empresa</a>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">É parceira</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enterprises as $enterprise)
                            <tr>
                                <td scope="row">{{$enterprise->id}} </td>
                                <td scope="row">{{$enterprise->name}} </td>
                                <td scope="row">{{$enterprise->cnpj}} </td>
                                <td scope="row">{{$enterprise->is_partner}} </td>
                                <td scope="row"></td>
                                <td id="outer">
                                <a class="inner btn btn-sm btn-success" href="{{ route('enterprises.edit', $enterprise->id) }}">Editar</a>
                                    <form method="post" action="{{ route('enterprises.destroy') }}" class="inner" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="enterprise_id" value="{{ $enterprise->id }}">
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
