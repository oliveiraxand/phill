@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('persons.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Digite o Nome"
                                style="text-transform:uppercase"
                            />
                            <label>CPF</label>
                            <input
                                type="text"
                                class="form-control"
                                id="cpf"
                                name="cpf"
                                placeholder="000.000.000-00"
                                style="text-transform:uppercase"
                            />
                            <label>Data de Nascimento</label>
                            <input
                                type="text"
                                class="form-control"
                                id="birth"
                                name="birth"
                                placeholder="00/00/0000"
                                style="text-transform:uppercase"
                            />
                        </div>
                        <label>Empresa</label>
                            <select name="enterprise_id" id="enterprise_id" class="form-select">  
                                @foreach($enterprises as $enterprise)
                                    <option value="{{ $enterprise->id }}">{{ $enterprise->name }}</option>
                                @endforeach
                            </select>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
