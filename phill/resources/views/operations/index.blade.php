@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
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
                                <th scope="row">{{$operation->id}} </th>
                                <th scope="row">{{$operation->name}} </th>
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
