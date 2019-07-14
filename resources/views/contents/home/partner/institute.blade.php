@extends('layouts.home')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Institusi</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>Institusi</h1>
                    <p class="lead">Institusi terintegrasi dengan SIP.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="no-gutters py-5">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="icon-box icon-box-style-4 pb-3">
                        <div class="icon-box-icon-offset-border border-color-primary">
                            <div class="icon-box-icon bg-primary">
                                <i class="lnr lnr-apartment"></i>
                            </div>
                        </div>
                        <div class="icon-box-info">
                            <div class="icon-box-info-title">
                                <h4>Balitbang Kemendikbud (2)</h4>
                            </div>
                            <p>Institusi terintegrasi dengan SIP.</p>
                        </div>
                    </div>
                    <div class="icon-box icon-box-style-4 pb-3">
                        <div class="icon-box-icon-offset-border border-color-primary">
                            <div class="icon-box-icon bg-primary">
                                <i class="lnr lnr-apartment"></i>
                            </div>
                        </div>
                        <div class="icon-box-info">
                            <div class="icon-box-info-title">
                                <h4>Perguruan Tinggi (0)</h4>
                            </div>
                            <p>Institusi terintegrasi dengan SIP.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="icon-box icon-box-style-4 pb-3">
                        <div class="icon-box-icon-offset-border border-color-primary">
                            <div class="icon-box-icon bg-primary">
                                <i class="lnr lnr-apartment"></i>
                            </div>
                        </div>
                        <div class="icon-box-info">
                            <div class="icon-box-info-title">
                                <h4>K/L & Pemda (0)</h4>
                            </div>
                            <p>Institusi terintegrasi dengan SIP.</p>
                        </div>
                    </div>
                    <div class="icon-box icon-box-style-4 pb-3">
                        <div class="icon-box-icon-offset-border border-color-primary">
                            <div class="icon-box-icon bg-primary">
                                <i class="lnr lnr-apartment"></i>
                            </div>
                        </div>
                        <div class="icon-box-info">
                            <div class="icon-box-info-title">
                                <h4>Lembaga Riset Non-Pemerintah (0)</h4>
                            </div>
                            <p>Institusi terintegrasi dengan SIP.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection