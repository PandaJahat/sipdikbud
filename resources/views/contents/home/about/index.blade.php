@extends('layouts.home')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="#">Home</a></li>
                        <li class="active">Tentang SIPDIKBUD</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>Tentang SIPDIKBUD</h1>
                    <p class="lead">Penjelasan tentang SIPDIKBUD.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="no-gutters py-5">
            <h3 class="">Apa itu <strong class="text-primary">SIPDIKBUD ?</strong></h3>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <p class="text-justify pt-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <ul class="list-unstyled">
                        <li>Nulla volutpat aliquam velit :
                            <ul>
                                <li>Phasellus iaculis neque</li>
                                <li>Purus sodales ultricies</li>
                                <li>Vestibulum laoreet porttitor sem</li>
                                <li>Ac tristique libero volutpat at</li>
                                <li>Phasellus iaculis neque</li>
                                <li>Purus sodales ultricies</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <img class="img-fluid px-5" src="{{ asset('assets-front/img/imac.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection