@extends('layouts.admin')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Seção de Artigos -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Novo Artigo</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('artigos.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="titulo">Título</label>
                                    <input class="form-control" id="titulo" name="titulo" type="text" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="imagem">Imagem</label>
                                    <input class="form-control" id="imagem" name="imagem" type="file" required>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label" for="descricao">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Lista de Artigos</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 45%;">Título</th>
                                    <th style="width: 20%;">Editar</th>
                                    <th style="width: 25%;">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artigos as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->titulo }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal de Exclusão -->
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Confirmar Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Tem certeza de que deseja excluir?</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('artigos.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Edição -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Editar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('artigos.update', $item->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="titulo{{ $item->id }}" class="form-label">Título</label>
                                                        <input type="text" class="form-control" id="titulo{{ $item->id }}" name="titulo" value="{{ $item->titulo }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="imagem{{ $item->id }}" class="form-label">Imagem</label>
                                                        <input type="file" class="form-control" id="imagem{{ $item->id }}" name="imagem">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="descricao{{ $item->id }}" class="form-label">Descrição</label>
                                                        <textarea class="form-control" id="descricao{{ $item->id }}" name="descricao" rows="5" required>{{ $item->descricao }}</textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
                        <!-- Links de Paginação -->
                        <div class="d-flex justify-content-center">
                            {{ $artigos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!-- Seção de Trending -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Nova Trending</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('trending.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="tituloTrending">Título</label>
                                    <input class="form-control" id="tituloTrending" name="titulo" type="text" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="imagemTrending">Imagem</label>
                                    <input class="form-control" id="imagemTrending" name="imagem" type="file" required>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label" for="link">Link</label>
                                <input class="form-control" id="link" name="link" type="text" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Lista de Trending</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 45%;">Título</th>
                                    <th style="width: 20%;">Editar</th>
                                    <th style="width: 25%;">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trending as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->titulo }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editTrendingModal{{ $item->id }}">
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTrendingModal{{ $item->id }}">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal de Exclusão -->
                                <div class="modal fade" id="deleteTrendingModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteTrendingModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteTrendingModalLabel{{ $item->id }}">Confirmar Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Tem certeza de que deseja excluir?</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('trending.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Edição -->
                                <div class="modal fade" id="editTrendingModal{{ $item->id }}" tabindex="-1" aria-labelledby="editTrendingModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editTrendingModalLabel{{ $item->id }}">Editar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('trending.update', $item->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="tituloTrending{{ $item->id }}" class="form-label">Título</label>
                                                        <input type="text" class="form-control" id="tituloTrending{{ $item->id }}" name="titulo" value="{{ $item->titulo }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="imagemTrending{{ $item->id }}" class="form-label">Imagem</label>
                                                        <input type="file" class="form-control" id="imagemTrending{{ $item->id }}" name="imagem">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="link{{ $item->id }}" class="form-label">Link</label>
                                                        <input type="text" class="form-control" id="link{{ $item->id }}" name="link" value="{{ $item->link }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
                        <!-- Links de Paginação -->
                        <div class="d-flex justify-content-center">
                            {{ $trending->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!-- Seção de Lives -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Nova Live</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('lives.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="tituloLive">Título</label>
                                    <input class="form-control" id="tituloLive" name="titulo" type="text" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="imagemLive">Imagem</label>
                                    <input class="form-control" id="imagemLive" name="imagem" type="file" required>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label" for="linkLive">Link</label>
                                <input class="form-control" id="linkLive" name="link" type="text" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Lista de Lives</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 45%;">Título</th>
                                    <th style="width: 20%;">Editar</th>
                                    <th style="width: 25%;">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lives as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->titulo }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editLiveModal{{ $item->id }}">
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteLiveModal{{ $item->id }}">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal de Exclusão -->
                                <div class="modal fade" id="deleteLiveModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteLiveModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteLiveModalLabel{{ $item->id }}">Confirmar Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Tem certeza de que deseja excluir?</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('lives.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Edição -->
                                <div class="modal fade" id="editLiveModal{{ $item->id }}" tabindex="-1" aria-labelledby="editLiveModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLiveModalLabel{{ $item->id }}">Editar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('lives.update', $item->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="tituloLive{{ $item->id }}" class="form-label">Título</label>
                                                        <input type="text" class="form-control" id="tituloLive{{ $item->id }}" name="titulo" value="{{ $item->titulo }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="imagemLive{{ $item->id }}" class="form-label">Imagem</label>
                                                        <input type="file" class="form-control" id="imagemLive{{ $item->id }}" name="imagem">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="linkLive{{ $item->id }}" class="form-label">Link</label>
                                                        <input type="text" class="form-control" id="linkLive{{ $item->id }}" name="link" value="{{ $item->link }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
                        <!-- Links de Paginação -->
                        <div class="d-flex justify-content-center">
                            {{ $lives->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
