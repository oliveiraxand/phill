@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('enterprises.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>NOME</label>
                            <input type="hidden" name="enterprise_id" value="{{ $enterprise->id }}">
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Digite o tipo de operação"
                                style="text-transform:uppercase"
                                value="{{ $enterprise->name }}"
                            />
                        </div>
                        <label>CNPJ</label>
                            <input
                                type="text"
                                class="form-control"
                                id="cnpj"
                                name="cnpj"
                                placeholder="Digite o cnpj da empresa"
                                value="{{ $enterprise->cnpj }}"
                            />
                            <input type="hidden" name="is_partner" id="is_partner" value="1" />
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
