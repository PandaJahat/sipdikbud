@extends('layouts.home')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Rincian Publikasi</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>Rincian Publikasi</h1>
                    <p class="lead">Data lengkap publikasi.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-5 mb-5 mb-md-0">
                <div class="image-frame">
                    <span class="image-frame-wrapper">
                        <a href="javascript:;">
                            @if (!empty($collection->cover_file))
                                <img src="{{ $collection->source()->exists() ? $collection->source->thumbnail_path.$collection->cover_file : $collection->source }}" onerror="this.onerror=null;this.src='{{ asset('assets-front/img/nothing.png') }}';" class="img-fluid" alt="">
                            @else
                                <img src="{{ asset('assets-front/img/nothing.png') }}" class="img-fluid" alt="">
                            @endif
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-md-7">
                <h2 class="line-height-1 font-weight-bold mb-2">{{ $collection->title }}</h2>
                <p class="mt-4">
                    {!! $collection->description !!}
                </p>
                <hr class="my-4">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 150px;">Kategori :</th>
                            <td class="highlight-publisher">{{ $collection->categories()->exists() ? $collection->category->name : 'Lainnya' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tahun Terbit :</th>
                            <td class="highlight-publisher">{{ $collection->published_year }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Penulis :</th>
                            <td class="highlight-author">{{ $collection->author->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sumber Data :</th>
                            <td>{{ $collection->source()->exists() ? $collection->source->name : 'SIPDIKBUD' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Lokasi :</th>
                            <td><a href="{{ $collection->source()->exists() ? $collection->source->url : 'javascript:;' }}" target="_blank">{{ $collection->source()->exists() ? $collection->source->url : 'SIPDIKBUD' }}</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Bahasa :</th>
                            <td>{{ $collection->language()->exists() ? $collection->language->name : '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kata Kunci :</th>
                            <td>{{ $collection->keywords()->exists() ? implode(',', json_decode($collection->keywords->pluck('keyword'))) : '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <ul class="nav nav-tabs nav-tabs-default" id="productDetailTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold active" id="productDetailDescTab" data-toggle="tab" href="#productDetailDesc" role="tab" aria-controls="productDetailDesc" aria-expanded="true">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="productDetailMoreInfoTab" data-toggle="tab" href="#productDetailMoreInfo" role="tab" aria-controls="productDetailMoreInfo">Diskusi</a>
                    </li>
                </ul>
                <div class="tab-content" id="contentTabProductDetail">
                    <div class="tab-pane fade pt-4 pb-4 show active" id="productDetailDesc" role="tabpanel" aria-labelledby="productDetailDescTab">
                        <a href="{{ route('collection.detail', ['id' => Crypt::encrypt($collection->id), 'prev_url' => Crypt::encrypt(Request::fullUrl())]) }}" class="btn btn-success">Download Publikasi</a>
                    </div>
                    <div class="tab-pane fade pt-4 pb-4" id="productDetailMoreInfo" role="tabpanel" aria-labelledby="productDetailMoreInfoTab">
                        <a href="{{ route('collection.detail', ['id' => Crypt::encrypt($collection->id), 'prev_url' => Crypt::encrypt(Request::fullUrl())]) }}" class="btn btn-success">Lihat Diskusi</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection