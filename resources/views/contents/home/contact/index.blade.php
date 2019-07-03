@extends('layouts.home')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="#">Home</a></li>
                        <li class="active">Kontak</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>Header Default</h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="no-gutters py-5">
            <h3 class="mb-3">Mari Kenal <strong class="text-primary">SIPDIKBUD !</strong></h3>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="d-flex justify-content-start align-items-center py-3">
                        <img class="img-fluid" width="90" src="{{ asset('assets-front/img/sign-post.svg') }}">
                        <h6 class="text-justify pl-3">
                            Komplek Kementerian Pendidikan dan Kebudayaan, Gedung E Lantai 19, Jalan Jenderal Sudirman - Senayan, Jakarta 10270
                        </h6>
                    </div>
                    <div class="d-flex justify-content-start align-items-center py-3">
                        <img class="img-fluid" width="90" src="{{ asset('assets-front/img/call.svg') }}">
                        <h5 class="pl-3">Telp : 0215713827</h5>
                    </div>
                    <div class="d-flex justify-content-start align-items-center py-3">
                        <img class="img-fluid" width="90" src="{{ asset('assets-front/img/email.svg') }}">
                        <h5 class="pl-3">Email : puslitjakbud@kemdikbud.go.id</h5>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <img class="img-fluid" src="{{ asset('assets-front/img/map.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection