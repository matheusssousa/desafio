@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Cadastrar Registro
                    </div>
                    <div class="card-body">
                        <form id="search-form" action="{{ route('registros.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p><i>Dados Pessoais</i></p>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="nome" class="form-label">{{ __('Nome') }}</label>
                                    <input id="nome" type="text"
                                        class="form-control @error('nome') is-invalid @enderror" name="nome"
                                        value="{{ old('nome') }}" required autocomplete="nome" autofocus
                                        placeholder="Nome">
                                    @error('nome')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cpf" class="form-label">{{ __('CPF') }}</label>
                                    <input id="cpf" type="text"
                                        class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                        value="{{ old('cpf') }}" required autocomplete="cpf"
                                        placeholder="999.999.999-99">
                                    @error('cpf')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="idade" class="form-label">{{ __('Idade') }}</label>
                                    <input id="idade" type="number"
                                        class="form-control @error('idade') is-invalid @enderror" name="idade"
                                        value="{{ old('idade') }}" required autocomplete="idade" placeholder="Idade">
                                    @error('idade')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="sexo" class="form-label">{{ __('Sexo') }}</label>
                                    <select name="sexo" id="sexo"
                                        class="form-select @error('sexo') is-invalid @enderror" required>
                                        <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>
                                            Masculino</option>
                                        <option value="Feminino" {{ old('sexo') == 'Feminino' ? 'selected' : '' }}>Feminino
                                        </option>
                                        <option value="Outro" {{ old('sexo') == 'Outro' ? 'selected' : '' }}>Outro
                                        </option>
                                    </select>
                                    @error('sexo')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <p><i>Endereço</i></p>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-3">
                                    <label for="cep" class="form-label">{{ __('CEP') }}</label>
                                    <input id="cep" type="text"
                                        class="form-control @error('cep') is-invalid @enderror" name="cep"
                                        value="{{ old('cep') }}" required autocomplete="cep" placeholder="99999-999">
                                    <small id="cep-status" class="text-muted"></small>
                                    @error('cep')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rua" class="form-label">{{ __('Rua') }}</label>
                                    <input id="rua" type="text"
                                        class="form-control @error('rua') is-invalid @enderror" name="rua"
                                        value="{{ old('rua') }}" required autocomplete="rua" placeholder="Rua">
                                    @error('rua')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="numero" class="form-label">{{ __('Número') }}</label>
                                    <input id="numero" type="text"
                                        class="form-control @error('numero') is-invalid @enderror" name="numero"
                                        value="{{ old('numero') }}" required autocomplete="numero" placeholder="Número">
                                    @error('numero')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-3">
                                    <label for="bairro" class="form-label">{{ __('Bairro') }}</label>
                                    <input id="bairro" type="text"
                                        class="form-control @error('bairro') is-invalid @enderror" name="bairro"
                                        value="{{ old('bairro') }}" required autocomplete="bairro" placeholder="Bairro">
                                    @error('bairro')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cidade" class="form-label">{{ __('Cidade') }}</label>
                                    <input id="cidade" type="text"
                                        class="form-control @error('cidade') is-invalid @enderror" name="cidade"
                                        value="{{ old('cidade') }}" required autocomplete="cidade" placeholder="Cidade">
                                    @error('cidade')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="estado" class="form-label">{{ __('Estado') }}</label>
                                    <input id="estado" type="text"
                                        class="form-control @error('estado') is-invalid @enderror" name="estado"
                                        value="{{ old('estado') }}" required autocomplete="estado" placeholder="Estado">
                                    @error('estado')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <p><i>Educação</i></p>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <label for="ensino_medio" class="form-label">{{ __('Ensino médio completo?') }}</label>
                                    <select name="ensino_medio" id="ensino_medio"
                                        class="form-select @error('ensino_medio') is-invalid @enderror" required>
                                        <option value="1" {{ old('ensino_medio') == '1' ? 'selected' : '' }}>Sim
                                        </option>
                                        <option value="0" {{ old('ensino_medio') == '0' ? 'selected' : '' }}>Não
                                        </option>
                                    </select>
                                    @error('ensino_medio')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <p><i>Outras Informações</i></p>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-3">
                                    <label for="salario" class="form-label">{{ __('Salário') }}</label>
                                    <input id="salario" type="number" step="0.01"
                                        class="form-control @error('salario') is-invalid @enderror" name="salario"
                                        value="{{ old('salario') }}" required autocomplete="salario" placeholder="Salário">
                                    @error('salario')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                 <div class="form-group col-md-9">
                                    <label for="anexo" class="form-label">{{ __('Anexo') }}</label>
                                    <input id="anexo" type="file"
                                        class="form-control @error('anexo') is-invalid @enderror" name="anexo"
                                        value="{{ old('anexo') }}" required autocomplete="anexo" placeholder="Anexo">
                                    @error('anexo')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <a href="{{ route('registros.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');

            $('#search-form').submit(function() {
                var cpf = $('#cpf').val().replace(/\D/g, '');
                $('#cpf').val(cpf);
            });
        });

        $(document).ready(function() {
            $('#cep').on('blur', function() {
                let cep = $(this).val().replace(/\D/g, '');
                if (cep) {
                    $('#cep-status').text('Buscando...');
                    $('#rua, #bairro, #cidade, #estado').prop('disabled', true);

                    $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(dados) {
                        if (!dados.erro) {
                            $('#rua').val(dados.logradouro);
                            $('#bairro').val(dados.bairro);
                            $('#cidade').val(dados.localidade);
                            $('#estado').val(dados.uf);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    }).always(function() {
                        $('#cep-status').text('');
                        $('#rua, #bairro, #cidade, #estado').prop('disabled', false);
                    });
                }
            });
        });
    </script>
@endsection
