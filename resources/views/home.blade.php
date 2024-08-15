@extends('layouts.admin')

@section('content')
<main>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Novo Artigo') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="title">{{ __('Título') }}</label>
                                        <input class="form-control" id="name" name="name" type="text" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="title">{{ __('Imagem') }}</label>
                                        <input class="form-control" id="email" name="email" type="file" required>
                                    </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="descricao">{{ __('Descrição') }}</label>
                                    <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="" required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">{{ __('Enviar') }}</button>
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Lista de Artigos') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artigos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->titulo }}</td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $item->id }}">
                                                    Editar
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->id }}">
                                                Excluir
                                            </button>
                                        </td>
                                    </tr>
    
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Confirmar
                                                        Exclusão</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Tem certeza de que deseja excluir?</strong>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('artigos.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Modal for Editing -->
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Editar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('artigos.update', $item->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="Artigo{{ $item->id }}"
                                                                class="form-label">Titulo</label>
                                                            <input type="text" class="form-control"
                                                                id="titulo{{ $item->id }}" name="titulo"
                                                                value="{{ $item->titulo }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="Imagem{{ $item->id }}"
                                                                class="form-label">Imagem</label>
                                                            <input type="text" class="form-control"
                                                                id="imagem{{ $item->id }}" name="imagem"
                                                                value="{{ $item->imagem }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="Descrição{{ $item->id }}"
                                                                class="form-label">Descrição</label>
                                                            <textarea  class="form-control"
                                                                id="descricao{{ $item->id }}" name="descricao"
                                                                value="{{ $item->descricao }}" rows="5">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
