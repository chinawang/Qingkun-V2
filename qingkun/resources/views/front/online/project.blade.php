@extends('front.online.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/project.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

    </div>

    {{--<footer class="footer-container">--}}
        {{--<div class="col-md-8 col-md-offset-2 foot-text">--}}
            {{--<a class="foot-link" href="http://www.miitbeian.gov.cn/" target="_blank">--}}
                {{--浙ICP备18021663号--}}
            {{--</a>--}}
            {{--&nbsp--}}
            {{--<span>©2018 浙江青坤东方建筑设计有限公司</span>--}}
        {{--</div>--}}
    {{--</footer>--}}


@endsection

@section('javascript')

    <!--轮播Banner-->
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script>
        $(function () {
            $('#owl-banner').owlCarousel({
                items: 1,
                autoPlay: 3000,
                stopOnHover: true,
                lazyLoad: true,
//                navigation: true,
//                navigationText: ["上一个","下一个"]
            });
        });
    </script>

    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function() {--}}
            {{--$("#project-link").click(function() {--}}
                {{--$("html, body").animate({--}}
                    {{--scrollTop: $("#project-view").offset().top }, {duration: 500,easing: "swing"});--}}
                {{--return false;--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

@endsection

