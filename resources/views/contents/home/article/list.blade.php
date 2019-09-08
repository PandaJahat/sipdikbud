@extends('layouts.home')

@section('content')
<div role="main" class="main">
    <section class="page-header page-header-color page-header-quaternary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb justify-content-start">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Berita</li>
                    </ul>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-md-12">
                    <h1>Berita</h1>
                    {{-- <p class="lead">Penjelasan tentang SIP-Dikbud</p> --}}
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="no-gutters py-5">
            <div class="row">
                <div class="col-md-8 col-lg-9 order-1 offset-md-1 mb-5 mb-md-0">
                    <div class="no-gutters py-5">
                        <div class="row">
                            <div class="col-md-8 col-lg-9 order-1 offset-md-1 mb-5 mb-md-0">
                                @foreach ($articles as $article)
                                <article class="blog-post">
                                    <header class="blog-post-header mb-4">
                                        <a href="{{ route('home.article.detail', ['id' => Crypt::encrypt($article->id)]) }}">
                                            <img src="{{ !file_exists(public_path('/thumbnails/'.$article->thumbnail_file)) ? URL::to('/img/blank.png') : URL::to('/thumbnails/'.$article->thumbnail_file) }}" class="img-fluid rounded" alt="">
                                        </a>
                                        <i class="post-format-icon lnr lnr-picture bg-primary text-color-light text-7 p-3"></i>
                                    </header>
                                    <h2 class="font-weight-semibold text-5">
                                        <a href="{{ route('home.article.detail', ['id' => Crypt::encrypt($article->id)]) }}" class="link-color-dark">
                                            {{ ucwords(strtolower($article->title)) }}
                                        </a>
                                    </h2>
                                    <div class="d-flex mb-3">
                                        <span class="post-date text-color-primary pr-3"><i class="lnr lnr-calendar-full"></i> {{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</span>
                                        <span class="post-date text-color-primary pr-3"><i class="lnr lnr-user"></i> {{ $article->author }}</span>
                                    </div>
                                    <p>
                                        {{ str_limit(strip_tags($article->content), 90,'. . .') }}
                                    </p>
                                    <a href="{{ route('home.article.detail', ['id' => Crypt::encrypt($article->id)]) }}" class="text-color-primary font-weight-bold learn-more">SELENGKAPNYA <i class="fas fa-angle-right text-2" aria-label="Read more"></i></a>
                                </article>
                                <hr class="mt-5 mb-4">
                                @endforeach
                                {{ $articles->appends(Request::capture()->except('page'))->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection