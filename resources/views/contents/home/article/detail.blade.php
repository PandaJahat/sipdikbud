@extends('layouts.home')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home.article.list') }}">Berita</a></li>
                        <li class="active">Detail Berita</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>Detail Berita</h1>
                    {{-- <p class="lead">Penjelasan tentang SIP-Dikbud</p> --}}
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="no-gutters py-5">
            <div class="row">
                <div class="col-md-8 col-lg-9 order-1 offset-md-1 mb-5 mb-md-0">
                    <article class="blog-post mb-4">
                        <h3>{{ ucwords(strtolower($article->title)) }}</h3>
                        <div class="d-flex mb-3">
                            <span class="post-date text-color-primary pr-3"><i class="lnr lnr-calendar-full"></i> {{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</span>
                            <span class="post-date text-color-primary pr-3"><i class="lnr lnr-user"></i> {{ ucwords(strtolower($article->author)) }}</span>
                            <span class="post-date text-color-primary pr-3"><i class="lnr lnr-tag"></i> {{ $article->category->name }}</span>
                        </div>
                        <header class="blog-post-header mb-3">
                            <img src="{{ empty($article->thumbnail_file) ? URL::to('/img/blank.png') : URL::to('/thumbnails/original/'.$article->thumbnail_file) }}" class="img-fluid rounded" alt="">
                        </header>
                        {!! $article->content !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection