@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('enterprises.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>NOME</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Digite o nome da empresa"
                                style="text-transform:uppercase"
                            />
                        </div>
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input
                                type="text"
                                class="form-control"
                                id="cnpj"
                                name="cnpj"
                                placeholder="Digite o cnpj da empresa"
                            />
                            <input type="hidden" name="is_partner" id="is_partner" value="1" />
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
