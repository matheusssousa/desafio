@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column gap-3">
                <div class="card p-3" style="background-color: white;">
                    <h5>Trocar informações da conta</h5>
                    <hr>
                    <form id="info-form" action="{{ route('perfil.info') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="form-label">{{ __('Nome') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $user->name ?? '') }}" required autocomplete="name" autofocus
                                        placeholder="Nome">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email ?? '') }}" required autocomplete="email"
                                        autofocus placeholder="E-mail">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
                <div class="card p-3" style="background-color: white;">
                    <h5>Alterar Senha</h5>
                    <hr>
                    <form id="password-form" action="{{ route('perfil.senha') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="form-label">{{ __('Senha') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="password" autofocus placeholder="Senha">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation"
                                        class="form-label">{{ __('Confirmar senha') }}</label>
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Senha">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
                <div class="card p-3" style="background-color: white;">
                    <h5>Deletar meu usuário</h5>
                    <hr>
                    <form id="delete-form" action="{{ route('perfil.deletar') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>Tem certerza de que deseja exluir seu usuário?</p>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection