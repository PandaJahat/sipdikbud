@extends('layouts.home')

@push('styles')
    <style>
        .highlight-title a {
            line-height: 24px;
        }
    </style>
@endpush

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="active">Kategori</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>{{ $category->name }}</h1>
                    <p class="lead">Daftar publikasi kategori {{ $category->name }}.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            {{-- <aside class="sidebar col-md-4 col-lg-3 order-2 order-md-1 mb-5">
                <div class="accordion accordion-default accordion-toggle accordion-style-1" role="tablist">
                    <div class="card">
                        <div class="card-header accordion-header" role="tab" id="categories">
                            <h5 class="mb-0">
                                <a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories">KATEGORI</a>
                            </h5>
                        </div>
                        <div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-block btn-4 btn-v-3 mb-2">CARI</button>
            </aside> --}}
            <div class="col-md-8 col-lg-9 order-1 order-md-2 mb-5">
                <div class="row align-items-center justify-content-between mb-4">
                    <div class="col-auto mb-3 mb-sm-0">
                        {{-- <form method="get">
                            <div class="custom-select-1">
                                <select class="form-control border">
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date" selected="selected">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                        </form> --}}
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center">
                            <span>Menampilkan {{ $collections->firstItem() }} - {{ $collections->lastItem() }} dari {{ $collections->total() }} publikasi</span>
                        </div>
                    </div>
                </div>
                @foreach ($collections as $item)
                    <div class="product row align-items-center mb-5">
                        <div class="col-md-3 col-lg-12 col-xl-4 mb-4 mb-md-0 mb-lg-4 mb-xl-0">
                            <div class="image-frame">
                                <span class="image-frame-wrapper">
                                    <a href="shop-product-detail-right-sidebar.html">
                                        @if (!empty($item->cover_file))
                                            <img src="{{ $item->source()->exists() ? $item->source->thumbnail_path.$item->cover_file : $item->source }}" onerror="this.onerror=null;this.src='{{ asset('assets-front/img/nothing.png') }}';" class="img-fluid" alt="">
                                        @else
                                            <img src="{{ asset('assets-front/img/nothing.png') }}" class="img-fluid" alt="">
                                        @endif
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-12 col-xl-8">
                            <h2 class="line-height-1 font-weight-bold text-4 mb-2 highlight-title">
                                <a href="{{ route('home.detail', ['collection' => Crypt::encrypt($item->id)]) }}" class="link-color-dark">
                                    {{ $item->title }}
                                </a>
                            </h2>
                            {{-- <span class="badge badge-info">{{ $item->categories()->exists() ? $item->category->name : 'Lainnya' }}</span> --}}
                            <table class="table table-borderless table-sm">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 110px;">Kategori</th>
                                        <td class="highlight-publisher">: {{ $item->categories()->exists() ? $item->category->name : 'Lainnya' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 110px;">Tahun Terbit</th>
                                        <td class="highlight-publisher">: {{ $item->published_year }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penulis</th>
                                        <td class="highlight-author">: {{ $item->author->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sumber Data</th>
                                        <td>: {{ $item->source()->exists() ? $item->source->name : 'SIPDIKBUD' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lokasi</th>
                                        <td><a href="{{ $item->source()->exists() ? $item->source->url : 'javascript:;' }}" target="_blank">: {{ $item->source()->exists() ? $item->source->url : 'SIPDIKBUD' }}</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr class="my-4">
                            <a href="{{ route('home.detail', ['collection' => Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-h-3 btn-fs-2">Selengkapnya </a>
                        </div>
                    </div>
                @endforeach
                <hr class="mt-5 mb-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mb-3 mb-sm-0">
                            <span>Menampilkan {{ $collections->firstItem() }} - {{ $collections->lastItem() }} dari {{ $collections->total() }} publikasi</span>
                    </div>
                    <div class="col-auto">
                        <nav aria-label="Page navigation example">
                            {{ $collections->appends(Request::capture()->except('page'))->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection