@extends('layouts.app')
@section('content')
<div class="container-fluid  fh5co_fh5co_bg_contcat">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-6 py-3">
                <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                    <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                        <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-phone"></i></span> </div>
                    </div>
                    <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                        <span class="c_g d-block">Telefone</span>
                        <span class="d-block c_g fh5co_contact_us_no_text">+55 (71) 9 9175-1822</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 py-3">
                <div class="row fh5co_contact_us_no_icon_difh5co_hover">
                    <div class="col-3 fh5co_contact_us_no_icon_difh5co_hover_1">
                        <div class="fh5co_contact_us_no_icon_div"> <span><i class="fa fa-envelope"></i></span> </div>
                    </div>
                    <div class="col-9 align-self-center fh5co_contact_us_no_icon_difh5co_hover_2">
                        <span class="c_g d-block">E-mail</span>
                        <span class="d-block c_g fh5co_contact_us_no_text">-</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="container-fluid mb-4">
    <div class="container">
        <div class="col-12 text-center contact_margin_svnit ">
            <div class="text-center fh5co_heading py-2">Contato</div>
        </div>
        <div class="row">
            {{-- <div class="col-12 col-md-6">
                <form class="row" id="fh5co_contact_form">
                    <div class="col-12 py-3">
                        <input type="text" class="form-control fh5co_contact_text_box" placeholder="Nome" />
                    </div>
                    <div class="col-6 py-3">
                        <input type="text" class="form-control fh5co_contact_text_box" placeholder="E-mail" />
                    </div>
                    <div class="col-6 py-3">
                        <input type="text" class="form-control fh5co_contact_text_box" placeholder="Assunto" />
                    </div>
                    <div class="col-12 py-3">
                        <textarea class="form-control fh5co_contacts_message" placeholder="Messagem"></textarea>
                    </div>
                    <div class="col-12 py-3 text-center"> <a href="#" class="btn contact_btn">Enviar</a> </div>
                </form>
            </div> --}}
            <div class="col-12 col-md-12 align-self-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15651.935482576163!2d-38.4282165!3d-12.9195064!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7161102b6e90c7b%3A0xd1acf55bd83df67c!2sEst%C3%A1dio%20Manoel%20Barradas%20(Barrad%C3%A3o)!5e0!3m2!1sen!2sbr!4v1692012998701!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map_sss"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
