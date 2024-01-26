@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('persons.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <input type="hidden" name="person_id" value="{{ $person->id }}">
                            <label>Nome Completo</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Digite o Nome"
                                style="text-transform:uppercase"
                                value="{{ $person->name }}"
                            />
                            <label>CPF</label>
                            <input
                                type="text"
                                class="form-control"
                                id="cpf"
                                name="cpf"
                                placeholder="000.000.000-00"
                                style="text-transform:uppercase"
                                value="{{ $person->cpf }}"
                            />
                            <label>Data de Nascimento</label>
                            <input
                                type="text"
                                class="form-control"
                                id="birth"
                                name="birth"
                                placeholder="00/00/0000"
                                style="text-transform:uppercase"
                                value="{{ $person->birth }}"
                            />
                            <label>Empresa</label>
                            <input 
                                type="text"
                                class="form-control"
                                id="enterprise"
                                name="enterprise"
                                style="text-transform:uppercase"
                                value="{{ $enterprise->name }}"
                                disabled
                            />
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
