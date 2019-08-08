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

    @stack('styles')

    <!-- Head Libs -->
    <script src="{{ asset('assets-front/vendor/modernizr/modernizr.min.js') }}"></script>

    <style>
        /* Slider */

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-slider {
            position: relative;
            display: block;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .slick-list:focus {
            outline: none;
        }

        .slick-list.dragging {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .slick-track {
            position: relative;
            top: 0;
            left: 0;
            display: block;
        }

        .slick-track:before,
        .slick-track:after {
            display: table;
            content: '';
        }

        .slick-track:after {
            clear: both;
        }

        .slick-loading .slick-track {
            visibility: hidden;
        }

        .slick-slide {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
        }

        [dir='rtl'] .slick-slide {
            float: right;
        }

        .slick-slide img {
            display: block;
        }

        .slick-slide.slick-loading img {
            display: none;
        }

        .slick-slide.dragging img {
            pointer-events: none;
        }

        .slick-initialized .slick-slide {
            display: block;
        }

        .slick-loading .slick-slide {
            visibility: hidden;
        }

        .slick-vertical .slick-slide {
            display: block;
            height: auto;
            border: 1px solid transparent;
        }

        .slick-arrow.slick-hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="body">
        @include('layouts.home-components.header')
        @yield('content')
        @include('layouts.home-components.footer')
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
    <!-- Current Page Vendor and Views -->
    {{-- <script src="{{ asset('assets-front/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets-front/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> --}}
    <!-- Theme Custom -->
    <script src="{{ asset('assets-front/js/custom.js') }}"></script>
    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets-front/js/theme.init.js') }}"></script>
    <!-- Examples -->
    <script src="{{ asset('assets-front/js/examples/examples.portfolio.js') }}"></script>
    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js' }}','ga');
        
            ga('create', 'UA-12345678-1', 'auto');
            ga('send', 'pageview');
        </script>
         -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <script>
        $(document).ready(function(){
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
    @stack('scripts')
</body>

</html>