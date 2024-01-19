@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('operation.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>NOME</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Digite o tipo de operação"
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
