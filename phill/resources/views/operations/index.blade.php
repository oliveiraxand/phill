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
                    <a href="{{ route('operations.create') }}" class="btn btn-primary"> Criar Operação</a>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($operations as $operation)
                            <tr>
                                <td scope="row">{{$operation->id}} </td>
                                <td scope="row">{{$operation->name}} </td>
                                <td scope="row"></td>
                                <td id="outer">
                                    <a class="inner btn btn-sm btn-success" href="{{ route('operations.edit', $operation->id) }}">Editar</a>
                                    <form method="post" action="{{ route('operations.destroy') }}" class="inner" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="operation_id" value="{{ $operation->id }}">
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
