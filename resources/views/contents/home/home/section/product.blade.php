<section class="section section-text-overlay">
    <span class="text-background font-primary font-weight-bold appear-animation animated textBgFadeInUp appear-animation-visible" data-appear-animation="textBgFadeInUp" data-appear-animation-delay="500" style="animation-delay: 500ms;">SIPDIKBUD</span>
    <div class="container">
        <div class="row">
            <div class="col mb-5">
                <h2 class="font-weight-semibold mb-0">Jelajahi publikasi di Sipdikbud</h2>
                {{-- <p class="font-weight-light mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eros ipsum, facilisis eget scelerisque non, fermentum at tellus.</p> --}}
            </div>
        </div>
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
                            <h4>Institusi ({{ $partner_count->institute }})</h4>
                        </div>
                        <p>Institusi terintegrasi dengan SIP-DIKBUD.</p>
                    </div>
                </div>
                <div class="icon-box icon-box-style-4 pb-3">
                    <div class="icon-box-icon-offset-border border-color-primary">
                        <div class="icon-box-icon bg-primary">
                            <i class="lnr lnr-book"></i>
                        </div>
                    </div>
                    <div class="icon-box-info">
                        <div class="icon-box-info-title">
                            <h4>Open Journal Systems ({{ $partner_count->ojs }})</h4>
                        </div>
                        <p>Open Journal System terintegrasi dengan SIP-DIKBUD.</p>
                    </div>
                </div>
                <div class="icon-box icon-box-style-4 pb-3">
                    <div class="icon-box-icon-offset-border border-color-primary">
                        <div class="icon-box-icon bg-primary">
                            <i class="lnr lnr-database"></i>
                        </div>
                    </div>
                    <div class="icon-box-info">
                        <div class="icon-box-info-title">
                            <h4>Aplikasi Lainnya ({{ $partner_count->non_institute }})</h4>
                        </div>
                        <p>Aplikasi lainnya terintegrasi dengan SIP-DIKBUD.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5 mb-md-0">
                {{-- <h4 class="mb-4">Sektor</h4>
                <ul class="list list-style-1">
                    @foreach ($partners as $item)
                        <li><a href="">{{ $item->name }} ({{ number_format($item->collections_count) }})</a> </li>
                    @endforeach
                </ul> --}}
            </div>
            <div class="col-lg-3 mb-5 mb-md-0" style="font-size: 18px;">
                <h4 class="mb-4">Kategori</h4>
                <ul class="list list-style-1">
                    @foreach ($categories as $item)
                        <li><a href="{{ route('home.category', ['id' => Crypt::encrypt($item->id)]) }}">{{ $item->name }} ({{ number_format($item->collections_count) }})</a></li>                        
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section section-height-3 bg-light-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-semibold mb-2">Saat ini terdapat {{ $collection_count }} publikasi di dalam SIPDIKBUD</h2>
                <p class="mb-2">
                    Publikasi yang diterbitkan akses terbuka ditinjau oleh rekan sejawat dan dibuat bebas untuk dibaca, diunduh, dan digunakan kembali sesuai dengan pilihan lisensi pengguna penulis.</p>
                <ul class="list list-style-1">
                    {{-- <li>Lihat direktori <a class="text-primary" href="hasil.html"> jurnal akses terbuka</a> </li>
                    <li>Lihat semua publikasi dengan <a class="text-primary" href=""> artikel akses terbuka</a></li>
                    <li>Faucibus porta lacus fringilla vel</li>
                    <li>Aenean sit amet erat nunc</li> --}}
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Telusuri menurut Judul Publikasi :</h4>
                <hr class="mb-4">
                <ul class="list list-inline">
                    @foreach (range('A', 'Z') as $char)
                    <li class="list-inline-item px-2">
                        <h2><a href="{{ route('home.alphabet', ['char' => Crypt::encrypt($char)]) }}"> {{ $char }}</a></h2>
                    </li>
                    @endforeach
                    <li class="list-inline-item px-2">
                        <h2><a href=""> 0-9</a></h2>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>