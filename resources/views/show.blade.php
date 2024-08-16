@extends('layouts.app')
@section('content')

<br>
    <section class="section section-lg bg-default">
        <div class="container">
            <div class="tabs-custom row row-50 justify-content-center flex-lg-row-reverse text-center text-md-left"
                id="tabs-4">
                <div class="col-lg-12 col-xl-9">
                    <!-- Tab panes-->
                    <div class="tab-content tab-content-1">
                        <div class="tab-pane fade show active" id="tabs-4-1">
                            <h4>{{ $noticias->titulo }}</h4>
                            <p>{{ $noticias->descricao }}</p>
                            <img src="{{ asset('images/' . $noticias->imagem) }}" alt="{{ $noticias->titulo }}" width="835" height="418" />
                            <p class="fh5co_mini_time py-3"> {{ $noticias->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection