@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                </div>
            </div>
        </div>
        <div class="row my-4 px-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h6 class="card-subtitle  text-body-secondary">Úlimo registro</h6>
                    <h5 class="card-title">{{ $ultimoRegistro->nome }}</h5>
                    <h6 class="card-subtitle mb-4 text-body-secondary">Idade: {{ $ultimoRegistro->idade }} | Sexo:
                        {{ $ultimoRegistro->sexo }}</h6>
                    <p class="card-text">Criado em: {{ $ultimoRegistro->created_at->format('d/m/Y H:i') }}.</p>
                    <a href="{{ route('registros.show', $ultimoRegistro->id) }}" class="card-link">Ver detalhes</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card bg-success text-light mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Total de Registros</h5>
                        <h3 class="card-subtitle mb-2">{{ $totalRegistros }}</h3>
                    </div>
                </div>
                <div class="card bg-danger text-light">
                    <div class="card-body">
                        <h5 class="card-title">Total de Registros Excluídos</h5>
                        <h3 class="card-subtitle mb-2">{{ $totalRegistrosExcluidos }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-light mb-2" style="background-color: #d63384;">
                    <div class="card-body">
                        <h5 class="card-title">Total de Registros com sexo feminino</h5>
                        <h3 class="card-subtitle mb-2">{{ $countFeminino }}</h3>
                    </div>
                </div>
                <div class="card text-light mb-2" style="background-color: #0026fd;">
                    <div class="card-body">
                        <h5 class="card-title">Total de Registros com sexo masculino</h5>
                        <h3 class="card-subtitle mb-2">{{ $countMasculino }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
