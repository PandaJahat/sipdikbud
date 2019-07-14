<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': false, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 120}" style="min-height: 60px;">
    <div class="header-body" style="top: 0px; position: fixed;">
        <div class="header-container container" style="height: 60px; min-height: 0px;">
            <div class="header-row">
                <div class="header-column justify-content-start">
                    <div class="header-logo">
                        <a href="{{ route('home') }}">
                            <img alt="logo" width="175" height="30" src="{{ asset('assets-front/img/logo-sipdikbud-revised.png') }}">
                        </a>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-nav header-nav-top-line">
                        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                            <nav class="collapse">
                                @include('layouts.home-components.menu')
                            </nav>
                        </div>
                        <button class="header-btn-collapse-nav ml-3" data-toggle="collapse" data-target=".header-nav-main nav">
                            <span class="hamburguer">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="close">
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                        <div class="header-button d-sm-flex ml-3">
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                <span style="font-weight: 400;" class="wrap">
                                    <span>Masuk/Daftar</span>
                                    {{-- <i class="lnr lnr-user"></i> --}}
                                </span>
                            </a>
                            @else
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                <span style="font-weight: 400;" class="wrap">
                                    <span>{{ Auth::user()->name }}</span>
                                    {{-- <i class="lnr lnr-user"></i> --}}
                                </span>
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>