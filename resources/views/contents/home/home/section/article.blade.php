<section class="section">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <div class="overflow-hidden mb-2">
                    <h2 class="font-weight-bold mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="200" style="animation-delay: 200ms;">Informasi Terbaru</h2>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="lead mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="400" style="animation-delay: 400ms;">
                        
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-4">
                    <article class="blog-post">
                        <div class="image-frame hover-effect-2">
                            <div class="image-frame-wrapper">
                                <a href="{{ route('home.article.detail', ['id' => Crypt::encrypt($article->id)]) }}">
                                    <img src="{{ empty($article->thumbnail_file) ? URL::to('/img/blank.png') : URL::to('/thumbnails/'.$article->thumbnail_file) }}" class="img-fluid img-news rounded" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="d-flex opacity-6 my-2">
                            <span class="top-sub-title text-color-primary">{{ \Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}</span>
                        </div>
                        <hr class="mt-0 mb-3">
                        <h2 class="font-weight-bold text-4 mb-3">
                            <a href="{{ route('home.article.detail', ['id' => Crypt::encrypt($article->id)]) }}" class="link-color-dark">{{ ucwords(strtolower($article->title)) }}</a>
                        </h2>
                        <p class="text-color-light-3">Kategori {{ $article->category->name }}</p>
                        <a href="{{ route('home.article.detail', ['id' => Crypt::encrypt($article->id)]) }}" class="text-color-primary font-weight-bold learn-more">SELENGKAPNYA <i class="fas fa-angle-right text-3" aria-label="Read more"></i></a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>