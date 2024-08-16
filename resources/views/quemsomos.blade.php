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
                        <div class="tab-pane fade show active text-center" id="tabs-4-1">
                            <h4>Sobre nós</h4>
                            <p>Bem-vindo ao Vermelho e Preto News (VPnews), a sua fonte principal para todas as notícias sobre o Esporte Clube Vitória. Somos uma equipe apaixonada que vive e respira o futebol, especialmente quando se trata do nosso amado Leão da Barra. No nosso canal no YouTube, TV Vermelho e Preto, apresentamos o programa "Nosso Grito", onde discutimos e analisamos os acontecimentos mais recentes do clube.</p>
                            <p>O "Nosso Grito" é conduzido por Marzzo Silva e Phabio Almeida, dois grandes torcedores e conhecedores do Vitória. Juntos, eles trazem uma visão autêntica e apaixonada sobre os jogos, bastidores, transferências, e tudo o que envolve o universo rubro-negro. Aqui, você encontra análises aprofundadas, opiniões sinceras e a participação ativa da torcida, que faz do VPnews um verdadeiro ponto de encontro para quem ama o ECVitória.</p>
                            <img src="images/logo.png" alt="Sobre VPnews" width="420" class="mx-auto d-block" />
                        </div>
                        
                        <div class="tab-pane fade" id="tabs-4-2">
                            <h4>Nosso Grito: Análises e Opiniões</h4>
                            <p>No programa "Nosso Grito", Marzzo Silva e Phabio Almeida debatem os temas mais quentes do momento, sempre com uma abordagem crítica e informativa. Seja no pós-jogo ou nas semanas de preparação, o programa oferece uma análise detalhada sobre o desempenho do time, além de abordar as expectativas da torcida e as decisões da diretoria.</p>
                            <p>Nosso objetivo é conectar a nação rubro-negra e dar voz aos torcedores, que são o coração e a alma do clube. Acompanhe nossos conteúdos para ficar por dentro de tudo o que acontece no universo do ECVitória.</p>
                            <img src="images/about-1-835x418.jpg" alt="Nosso Grito" width="835" height="418" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <br>

    <!-- Our Team-->
    <section class="section section-lg section-bottom-md-70 bg-default">
        <div class="container">
            <h3 class="oh"><span class="d-inline-block wow slideInUp" data-wow-delay="0s">Nosso Time</span></h3>
            <div class="row row-lg row-40 justify-content-center">
                <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay=".2s" data-wow-duration="1s">
                    <!-- Team Modern-->
                    <article class="team-modern"><a class="team-modern-figure" href="#"><img
                                src="images/ocimar.png" alt="" width="270" height="236" /></a>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">Marzzo Silva</a></h6>
                            <div class="team-modern-status">Apresentador</div>
                            <ul class="list-inline team-modern-social-list">
                                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                            </ul>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay="0s" data-wow-duration="1s">
                    <!-- Team Modern-->
                    <article class="team-modern"><a class="team-modern-figure" href="#"><img
                                src="images/fabio.png" alt="" width="270" height="236" /></a>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">Phabio Almeida</a></h6>
                            <div class="team-modern-status">Comentárista</div>
                            <ul class="list-inline team-modern-social-list">
                                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                            </ul>
                        </div>
                    </article>
                </div>
                {{-- <div class="col-sm-6 col-lg-3 wow fadeInRight" data-wow-delay=".1s" data-wow-duration="1s">
                    <!-- Team Modern-->
                    <article class="team-modern"><a class="team-modern-figure" href="#"><img
                                src="images/victor.png" alt="" width="270" height="236" /></a>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">Victor Lisboa</a></h6>
                            <div class="team-modern-status">Diretor</div>
                            <ul class="list-inline team-modern-social-list">
                                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                            </ul>
                        </div>
                    </article>
                </div> --}}
                <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                    <!-- Team Modern-->
                    <article class="team-modern"><a class="team-modern-figure" href="#"><img
                                src="images/rafael.png" alt="" width="270" height="236" /></a>
                        <div class="team-modern-caption">
                            <h6 class="team-modern-name"><a href="#">Rafael</a></h6>
                            <div class="team-modern-status">Produtor</div>
                            <ul class="list-inline team-modern-social-list">
                                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
