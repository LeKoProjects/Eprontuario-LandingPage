@extends('layouts.admin')

@section('content')
<main>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
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
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="title">{{ __('Título') }}</label>
                                    <input class="form-control" id="name" name="name" type="text" required>
                                </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="tags">{{ __('Tags') }}</label>
                                    <select class="form-control" id="tags" name="tags[]" multiple required>
                                        {{-- @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="title">{{ __('Imagem') }}</label>
                                    <input class="form-control" id="email" name="email" type="file" required>
                                </div>
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
    </div>
</div>
</main>
@endsection
