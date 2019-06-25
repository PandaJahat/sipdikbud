@extends('layouts.home')

@section('content')
<div class="d-none d-sm-block">
    <div class="image-home"></div>
</div>
<div class="d-block d-sm-none">
    <div class="image-home-mobile"></div>
</div>
<div class="card rounded-0 py-3">
    <form class="container" method="GET" action="{{ route('home.search.results') }}">
        <div class="form-row align-items-center">
            <div class="col-lg-7 col-md-5 col-sm-12 py-2">
                <input type="text" class="form-control shadow-blue border border-primary" name="search" placeholder="Pencarian">
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 py-2">
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                <select class="custom-select mr-sm-2 shadow-blue border border-primary" id="inlineFormCustomSelect" name="category">
                    <option value="all" selected>Semua Kategori</option>
                    <option value="title">Judul</option>
                    <option value="author">Penulis</option>
                    <option value="keyword">Kata Kunci</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
                <button type="submit" class="btn btn-primary btn-block shadow-blue">Cari</button>
            </div>
        </div>
    </form>
    <div class="container pt-3">
        <span>Kata kunci populer :
            <span class="badge badge-primary" onclick="selectPopularKeyword(this)">Pendidikan</span>
            <span class="badge badge-secondary">Model Belajar</span>
            <span class="badge badge-success">Buku</span>
            {{-- <span class="badge badge-danger">Sosial</span>
            <span class="badge badge-warning">High Order Thinking</span>
            <span class="badge badge-info">Pengembangan Diri</span>
            <span class="badge badge-light">Media</span>
            <span class="badge badge-dark">Efektifitas</span> --}}
        </span>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="container top-content items-center flex">
            <h1>Mitra</h1>
            <a href="javascript:;">Selengkapnya <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div data-tilt class="card border-0 shadow my-2">
                        <div class="card-body text-center">
                            <img width="100" class="img-fluid" src="{{ asset('front/img/cap.svg') }}">
                            <h3 class="font-weight-bold pt-1">Institusi</h3>
                            <h3><span class="badge badge-pill badge-primary">{{ $partner_count->institute }}</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div data-tilt class="card border-0 shadow my-2">
                        <div class="card-body text-center">
                            <img width="100" class="img-fluid" src="{{ asset('front/img/box.svg') }}">
                            <h3 class="font-weight-bold pt-1">Repositori</h3>
                            <h3><span class="badge badge-pill badge-primary">{{ $partner_count->repository }}</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div data-tilt class="card border-0 shadow my-2">
                        <div class="card-body text-center">
                            <img width="100" class="img-fluid" src="{{ asset('front/img/library.svg') }}">
                            <h3 class="font-weight-bold pt-1">Instansi</h3>
                            <h3><span class="badge badge-pill badge-primary">{{ $partner_count->non_institute }}</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="container top-content items-center flex">
                    <h1>Kontributor Teratas</h1>
                    <a class="pt-2" href="#0">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="jumbotron">
                    @foreach ($partners as $item)
                        <div class="alert alert-light clearfix shadow" role="alert">
                            <div class="float-left">
                                <img class="img-fluid" width="40" src="{{ empty($item->logo_file) ? asset('img/logo_default.png') : '' }}"> <span class="pl-3">{{ $item->name }}</span>
                            </div>
                            <div class="float-right">
                                <h4><span class="badge badge-primary">{{ $item->collections_count }}</span></h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5">
                <div class="container top-content-single">
                    <h1>Bidang</h1>
                </div>
                <div class="jumbotron">
                    <div class="list-group shadow">
                        @foreach ($categories as $item)
                            <a href="#" class="list-group-item list-group-item-action text-primary">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
