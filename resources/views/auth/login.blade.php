<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPDIKBUD | Sistem Informasi Penelitian Kemendikbud</title>
    <meta name="keywords" content="puslitjakdikbud, kemdikbud, penelitian" />
    <meta name="description" content="Sistem Informasi Penelitian Kemendikbud">
    <meta name="author" content="puslitjakdikbud">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets-front/img/favicon.png') }}" sizes="32x32" type="image/png">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,900%7COpen+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/linear-icons/css/linear-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/vendor/magnific-popup/magnific-popup.min.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-front/css/theme-elements.css') }}">
    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/skins/default.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets-front/css/custom.css') }}">
    <!-- Head Libs -->
    <script src="{{ asset('assets-front/vendor/modernizr/modernizr.min.js') }}"></script>
    <style>
        .dropdown-menu {
            background: white;
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="container-fluid d-flex flex-column">
            <div class="row align-items-center min-height-100vh">
                <div class="col-md-6 align-self-stretch p-0">
                    <div class="image-frame h-100">
                        <div class="image-frame-wrapper">
                            <div class="image-frame-background min-height-370 appear-animation animated scaleOut appear-animation-visible" data-appear-animation="scaleOut" data-appear-animation-duration="8s" data-plugin-image-background="" data-plugin-options="{'imageUrl': '{{ asset('assets-front/img/login-new.jpg') }}'}" style="background-image: url({{ asset('assets-front/img/login-new.jpg') }}); background-size: cover; background-position: center center; background-repeat: no-repeat; animation-duration: 8s; animation-delay: 100ms;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <hr class="opacity-4 my-0">
                    <section class="section">
                        <div class="row m-0">
                            <div class="col-half-section pl-md-5">
                                <div role="main" class="main">
                                    {{-- <div class="overflow-hidden">
                                        <span class="d-block top-sub-title appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="600" style="animation-delay: 600ms;">MASUK</span>
                                    </div> --}}
                                    <div class="overflow-hidden mb-1">
                                        <h1 class="font-weight-bold text-6 mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="800" style="animation-delay: 800ms; font-size: 3.8rem !important;">SIP-Dikbud</h1>
                                    </div>
                                    <div class="overflow-hidden mb-1">
                                        <p class="text-2 mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="1000" style="animation-delay: 1000ms;">Sistem Informasi Penelitian Pendidikan dan Kebudayaan</p>
                                    </div>
                                    <div class="appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="800" style="animation-delay: 800ms;">
                                        <ul style="justify-content: left;" class="nav nav-tabs nav-tabs-minimal" id="tabMinimal" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link  active show" id="minimal-portfolio-tab" data-toggle="tab" href="#minimal-portfolio" role="tab" aria-controls="minimal-portfolio" aria-expanded="true" aria-selected="false">Masuk</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="minimal-process-tab" data-toggle="tab" href="#minimal-process" role="tab" aria-controls="minimal-process" aria-selected="true">Daftar</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="tabMinimalContent">
                                            <div class="tab-pane fade pt-4 pb-4  active show" id="minimal-portfolio" role="tabpanel" aria-labelledby="minimal-portfolio-tab">
                                                <h2 class="font-weight-bold text-4 mb-4">Silahkan Masuk Menggunakan Akun Anda !</h2>
                                                <form action="{{ route('login') }}" id="frmRegister" method="post">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col mb-2">
                                                            <label for="frmRegisterEmail">EMAIL / USERNAME</label>
                                                            <input type="email" name="email" value="{{ old('email') }}" maxlength="100" class="form-control bg-light-5 rounded border-0 text-1" name="email" id="frmRegisterEmail" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col mb-5">
                                                            <label for="frmRegisterPassword">PASSWORD</label>
                                                            <input type="password" name="password" value="" class="form-control bg-light-5 rounded border-0 text-1" name="password" id="frmRegisterPassword" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <div class="col text-right">
                                                            <button type="submit" class="btn text-light shadow bg-primary-4 btn-rounded btn-v-3 btn-h-3 font-weight-bold">MASUK</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade pt-4 pb-4" id="minimal-process" role="tabpanel" aria-labelledby="minimal-process-tab">
                                                @include('auth.login.register-form')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <footer id="footer" class="bg-transparent">
                                    <p class="text-color-light-3 text-center text-lg-left appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600" style="animation-delay: 1600ms;">Copyrights © 2019 All Rights Reserved</p>
                                </footer>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor -->
    <script src="{{ asset('assets-front/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/common/common.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/jquery.validation/jquery.validation.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/vide/vide.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/vivus/vivus.min.js') }}"></script>
    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets-front/js/theme.js') }}"></script>
    <!-- Theme Custom -->
    <script src="{{ asset('assets-front/js/custom.js') }}"></script>
    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets-front/js/theme.init.js') }}"></script>
    <!-- Examples -->
    <script src="{{ asset('assets-front/js/examples/examples.portfolio.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    @stack('scripts')
</body>

</html>