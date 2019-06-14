
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    {{-- <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32"> --}}

    <title>SIPDIKBUD</title>

    <link rel="icon" type="image" href="{{ asset('favicon.ico') }}">

    @stack('links-first')

    <!-- uikit -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/uikit/css/uikit.almost-flat.min.css') }}" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="{{ asset('assets/icons/flags/flags.min.css') }}" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="{{ asset('assets/css/style_switcher.min.css') }}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="{{ asset('assets/css/themes/themes_combined.min.css') }}" media="all">

    @stack('links')

    <style>
      #sidebar_main .sidebar_main_header {
          background-image: url("{{ asset('img/logo_resize.png') }}");
          background-position: center;
          height: 100;
          width: 100;
          object-fit: contain;
      }

      #sidebar_main .menu_section>ul>li ul li.act_item>a {
          color: #1976d2;
      }

      #sidebar_main .menu_section>ul>li.current_section>a .menu_title {
          color: #1976d2;
      }

      #sidebar_main .menu_section>ul>li.current_section>a>.menu_icon .material-icons {
          color: #1976d2;
      }

      #sidebar_main .menu_section>ul>li ul li>a:hover {
          color: #1976d2;
      }

      #sidebar_main .menu_section>ul>li>a:hover {
          color: #1976d2;
      }

      .small-as-possible {
          width: 1px;
          white-space: nowrap;
      }

      .uk-datepicker-nav {
          background: #1876d2;
      }

      .uk-datepicker-table a.uk-active {
          background-color: #1876d2;
          color: #fff;
      }
    </style>

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="assets/css/ie.css" media="all">
    <![endif]-->

    @stack('styles')

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">

    @include('layouts.default-components.header')
    
    @include('layouts.default-components.sidebar')

    <div id="page_content">
        <div id="page_content_inner">

            @yield('content')

        </div>
    </div>
    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="{{ asset('assets/js/common.min.js') }}"></script>
    <!-- uikit functions -->
    <script src="{{ asset('assets/js/uikit_custom.min.js') }}"></script>
    <!-- altair common functions/helpers -->
    <script src="{{ asset('assets/js/altair_admin_common.min.js') }}"></script>


    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript( "{{ asset('assets/js/custom/dense.min.js') }}", function(data) {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.0/dist/loadingoverlay.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $.LoadingOverlaySetup({
            image : "https://loading.io/spinners/balls/index.circle-slack-loading-icon.gif"
            });
        })
    </script>    

    @stack('scripts')

</body>
</html>
