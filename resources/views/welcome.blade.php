@extends('layouts.app')
<style>
    .fh5co_news_img {
    position: relative;
}

.fh5co_news_img img {
    width: 100%;
    height: auto;
}

.play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2rem;
    color: white;
    text-decoration: none;
    border-radius: 50%;
    padding: 0.5rem;
}

.play-button i {
    position: relative;
    top: -2px;
}

.item {
    margin-bottom: 1rem;
}

.fh5co_small_post_heading {
    font-size: 1rem;
    color: #333;
}

.fh5co_small_post_heading:hover {
    text-decoration: underline;
}

.c_g {
    font-size: 0.875rem;
    color: #666;
}

</style>
@section('content')
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            @if ($artigos->count() > 0)
                {{-- Exibir o artigo mais recente --}}
                <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                    @php
                        $artigoRecente = $artigos->first();
                    @endphp
                    <div class="fh5co_suceefh5co_height">
                        <img src="{{ asset('images/' . $artigoRecente->imagem) }}" alt="img" />
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font">
                            <div class="">
                                <a href="{{ route('NoticiasShow', $artigoRecente->id) }}" class="color_fff">
                                    <i
                                        class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ $artigoRecente->created_at->format('d/m/Y') }}
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('NoticiasShow', $artigoRecente->id) }}" class="fh5co_good_font">
                                    {{ $artigoRecente->titulo }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Exibir os outros artigos --}}
                <div class="col-md-6">
                    <div class="row">
                        @foreach ($artigos->slice(1) as $artigo)
                            <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                                <div class="fh5co_suceefh5co_height_2">
                                    <img src="{{ asset('images/' . $artigo->imagem) }}" alt="img" />
                                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                    <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                        <div class="">
                                            <a href="{{ route('NoticiasShow', $artigo->id) }}" class="color_fff">
                                                <i
                                                    class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ $artigo->created_at->format('d/m/Y') }}
                                            </a>
                                        </div>
                                        <div class="">
                                            <a href="{{ route('NoticiasShow', $artigo->id) }}" class="fh5co_good_font_2">
                                                {{ $artigo->titulo }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4">Lives</div>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="slider3">
                    @foreach ($lives as $item)
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="position-relative">
                                    <!-- Imagem do Vídeo com Botão de Play -->
                                    <div class="fh5co_news_img">
                                        <img src="images/{{ $item->imagem }}" alt="Imagem do vídeo" class="img-fluid" />
                                        <a href="{{ $item->link }}" class="play-button" target="_blank">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                    <!-- Título e Data -->
                                    <div class="pt-2">
                                        <a href="{{ $item->link }}" target="_blank" class="d-block fh5co_small_post_heading">
                                            <span>{{ $item->titulo }}</span>
                                        </a>
                                        <div class="c_g"><i class="fa fa-clock-o"></i>{{ $item->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach ($trending as $item)
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img">
                                <img src="images/{{ $item->imagem }}" alt="" class="fh5co_img_special_relative" />
                            </div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="{{ $item->link }}" target="_blank" class="text-white">
                                    {{ $item->titulo }}
                                </a>
                                <div class="fh5co_latest_trading_date_and_name_color">
                                    {{ $item->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Noticias</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach ($artigosDoQuintoEmDiante as $item)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="images/{{ $item->imagem }}" alt="" /></div>
                            <div>
                                <a href="{{ route('NoticiasShow', $item->id) }}" class="d-block fh5co_small_post_heading"><span class="">
                                        {{ $item->titulo }}</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{ $item->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Classificação</div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="images/nathan-mcbride-229637.jpg" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="single.html" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis
                            nostrud quis xercitation ullamco. </a> <a href="single.html" class="fh5co_mini_time py-3"> Thomson Smith -
                            April 18,2016 </a>
                            <div class="fh5co_consectetur"> Amet consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="images/ryan-moreno-98837.jpg" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <a href="single.html" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis
                            nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith -
                            April 18,2016 </a>
                            <div class="fh5co_consectetur"> Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolore.
                            </div>
                            <ul class="fh5co_gaming_topikk pt-3">
                                <li> Why 2017 Might Just Be the Worst Year Ever for Gaming</li>
                                <li> Ghost Racer Wants to Be the Most Ambitious Car Game</li>
                                <li> New Nintendo Wii Console Goes on Sale in Strategy Reboot</li>
                                <li> You and Your Kids can Enjoy this News Gaming Console</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <img src="images/photo-1449157291145-7efd050a4d0e-578x362.jpg" alt=""/>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <a href="single.html" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis
                            nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith -
                            April 18,2016 </a>
                            <div class="fh5co_consectetur"> Quis nostrud xercitation ullamco laboris nisi aliquip ex ea commodo
                                consequat.
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="images/office-768x512.jpg" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <a href="single.html" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis
                            nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith -
                            April 18,2016 </a>
                            <div class="fh5co_consectetur"> Amet consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Resultados</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        <a href="#" class="fh5co_tagg">Business</a>
                        <a href="#" class="fh5co_tagg">Technology</a>
                        <a href="#" class="fh5co_tagg">Sport</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                        <a href="#" class="fh5co_tagg">Photography</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Education</a>
                        <a href="#" class="fh5co_tagg">Social</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="images/download (1).jpg" alt="img" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                            <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="images/allef-vinicius-108153.jpg" alt="img" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> Enim ad minim veniam nostrud xercitation ullamco.</div>
                            <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-5 align-self-center">
                            <img src="images/download (2).jpg" alt="img" class="fh5co_most_trading"/>
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                            <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-5 align-self-center"><img src="images/seth-doyle-133175.jpg" alt="img"
                                                                  class="fh5co_most_trading"/></div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                            <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
