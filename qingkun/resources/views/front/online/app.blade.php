<!-- Powered by wangyx -->
<!-- Email:chinawangyx@hotmail.com -->
<!-- Wechat:ChinaWangyx -->
<!-- May the force be with you. -->

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/img/header/logo_title.png" type="image/x-icon"/>

    <!-- Styles -->
    {{--    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/online/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common/layout.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/footer.css') }}" rel="stylesheet">

    {{--    <link href="{{ asset('css/pace/themes/silver/pace-theme-loading-bar.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/pace/themes/blue/pace-theme-flash.css') }}" rel="stylesheet">


    @yield('stylesheet')

<!-- Scripts -->
    {{--<script>--}}
    {{--window.Laravel = {!! json_encode([--}}
    {{--'csrfToken' => csrf_token(),--}}
    {{--]) !!};--}}
    {{--</script>--}}
</head>
<body>
<div id="app">
    {{--<header class="cd-auto-hide-header">--}}
    <nav class="navbar navbar-expand-lg navbar-fixed-top cd-primary-nav" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#000000;">
                    <img src="/img/header/logo_qingkun_white.png" alt="logo" title="青坤东方">
                    {{--{{ config('app.name', 'Laravel') }}--}}

                </a>

                <!-- Collapsed Hamburger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
                        aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{--<div class="navbar-line"></div>--}}

                <div class="navbar-subtitle">
                    @yield('subtitle')
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">首页</a>
                    </li>
                    <li class="nav-item">
                        <a id="project-link" class="nav-link" href="{{ url('/projects/type') }}">项目</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/expertise/type') }}">专长</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/employees') }}">专家团队</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/jobs') }}">职位招聘</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">关于我们</a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>
        </div>
    </nav><!-- .cd-primary-nav -->
    {{--</header> <!-- .cd-auto-hide-header -->--}}
    @yield('location')
    @yield('content')

    {{--<footer class="footer-container">--}}
        {{--<div class="col-md-8 col-md-offset-2 foot-text">--}}
            {{--<a class="foot-link" href="http://www.miitbeian.gov.cn/" target="_blank">--}}
                {{--浙ICP备18021663号--}}
            {{--</a>--}}
            {{--&nbsp--}}
            {{--<span>©2018 浙江青坤东方建筑设计有限公司</span>--}}
        {{--</div>--}}
    {{--</footer>--}}

</div>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

{{--<script src="http://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-3.3.7.min.js') }}"></script>
<script src="{{ asset('js/zh-CN.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<script src="{{ asset('js/pace.min.js') }}"></script>
<script src="{{ asset('js/auto-hiding-navigation.js') }}"></script>

<script>
    $("[data-toggle='tooltip']").tooltip();
</script>

<script>
    $('.navbar-nav').find('a').each(function () {
        if (this.href == document.location.href) {
            $(this).parent().addClass('nav-active');
        }
    });

//    var scrolling = false;
//    $(window).on('scroll', function(){
//        if( !scrolling ) {
//            scrolling = true;
//            (!window.requestAnimationFrame)
//                    ? setTimeout(autoHideHeader, 250)
//                    : requestAnimationFrame(autoHideHeader);
//        }
//    });

    window.onscroll = function() {
        var headerBar = document.getElementById('navbar');
        if(window.pageYOffset >= 80){
            headerBar.classList.add('nav-change');
        } else {
            headerBar.classList.remove('nav-change');
        }
    }
</script>

@yield('javascript')

@include('common.flash_message')

</body>
</html>
