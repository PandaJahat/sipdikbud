@extends('layouts.default')

@section('content')
<div class="uk-grid blog_article" data-uk-grid-margin>
    <div class="uk-width-1-1">
        <div class="md-card">
            <div class="md-card-content large-padding">
                <div class="uk-article">
                    <h1 class="uk-article-title">{{ ucwords(strtolower($article->title)) }}</h1>
                    <p class="uk-article-meta">
                        Ditulias oleh {{ ucwords(strtolower($article->author)) }} pada {{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}
                        <br>Kategori <a href="javascript:;">{{ $article->category->name }}</a>
                    </p>
                    @if (!empty($article->thumbnail_file))
                    <img src="{{ URL::to('/thumbnails/original/'.$article->thumbnail_file) }}" alt="thumbnail" class="uk-align-center">
                    @endif
                    <hr class="uk-article-divider">
                    {!! $article->content !!}
                </div>
                <hr>
                <a href="{{ route('article.list') }}" class="md-btn md-btn-default">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection