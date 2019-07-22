@extends('layouts.home')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Tentang SIP-Dikbud</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>Tentang SIP</h1>
                    <p class="lead">Penjelasan tentang SIP-Dikbud</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="no-gutters py-5">
            <h3 class="">Apa itu <strong class="text-primary">SIP-Dikbud ?</strong></h3>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                     {{--{!! option_exists('about') ? option('about') : '' !!} --}}
                     <p class="text-justify">
                     SIP-Dikbud merupakan media penyebarluasan hasil Penelitian/Kajian Pendidikan dan Kebudayaan, dan menjadi wadah pertemuan serta pertukaran ide/gagasan antar jejaring penelitian. Publikasi yang diterbitkan dapat diakses secara terbuka dan telah melalui tahapan seleksi serta bebas untuk dimanfaatkkan sesuai dengan kode etik ilmiah.
                     </p>
                     <video width="100%;" controls="" autoplay="false" name="media"><source src="https://app.demoo.id/front_sipdikbud/new/img/sipdikbud.mp4" type="video/mp4"></video>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img class="img-fluid" src="{{ asset('assets-front/img/imac-new.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection