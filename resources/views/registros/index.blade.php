@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex flex-column gap-3">
                <div class="card" style="background-color: white;">
                    <div class="card-header">{{ __('Pesquisar Registros') }}</div>
                    <form id="search-form" class="p-3" action="{{ route('registros.index') }}">
                        <div class="card-body p-0 mb-3">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="nome">Nome</label>
                                    <input type="search" class="form-control" id="textfield1" name="nome"
                                        value="{{ request()->nome ?? '' }}" placeholder="Nome">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="search" class="form-control" id="cpf" name="cpf"
                                        value="{{ request()->cpf ?? '' }}" placeholder="999.999.999-99">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option value="">Selecione</option>
                                        <option value="Masculino" {{ request()->sexo == 'Masculino' ? 'selected' : '' }}>
                                            Masculino</option>
                                        <option value="Feminino" {{ request()->sexo == 'Feminino' ? 'selected' : '' }}>
                                            Feminino</option>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Selecione</option>
                                        <option value="Ambos" {{ request()->status == 'Ambos' ? 'selected' : '' }}>
                                            Ambos</option>
                                        <option value="Excluído" {{ request()->status == 'Excluído' ? 'selected' : '' }}>
                                            Excluído</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('registros.create') }}" class="btn btn-success">Cadastrar</a>
                            <div>
                                <button type="submit" class="btn btn-info float-right">Pesquisar</button>
                                <a class="btn btn-danger float-right" href="{{ route('registros.index') }}">Limpar
                                    Campos</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card p-3 bg-light">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 30%;">Nome</th>
                                <th scope="col" style="width: 15%;">CPF</th>
                                <th scope="col" style="width: 20%;">Sexo</th>
                                <th scope="col" style="width: 5%;">Idade</th>
                                <th scope="col" style="width: 10%;">Status</th>
                                <th scope="col" style="width: 20%;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registros as $registro)
                                <tr>
                                    <td>{{ $registro->nome }}</td>
                                    <td id="cpf">{{ $registro->cpf }}</td>
                                    <td>{{ $registro->sexo }}</td>
                                    <td>{{ $registro->idade }}</td>
                                    <td class="{{ $registro->trashed() ? 'bg-danger' : 'bg-success' }} text-light">
                                        @if ($registro->trashed())
                                            Excluído
                                        @else
                                            Ativo
                                        @endif
                                    </td>
                                    <td>
                                        @if ($registro->trashed())
                                            <form action="{{ route('registros.restore', $registro->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-success">Restaurar</button>
                                            </form>
                                            <form action="{{ route('registros.forceDelete', $registro->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir permanente</button>
                                            </form>
                                        @else
                                            <a href="{{ route('registros.show', $registro->id) }}"
                                                class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                            <a href="{{ route('registros.edit', $registro->id) }}"
                                                class="btn btn-sm btn-outline-primary">Editar</a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                data-id="{{ $registro->id }}">Excluir</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $registros->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="delete-form" action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var form = document.getElementById('delete-form');
            form.action = '/registros/' + id;
        });

        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');

            $('#search-form').submit(function() {
                var cpf = $('#cpf').val().replace(/\D/g, '');
                $('#cpf').val(cpf);
            });
        });
    </script>
@endsection
