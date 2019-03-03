@extends('front.online.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/type.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">
        <div class="top-bar">
            <h1 class="top-title">项目类型</h1>
            <a href="/projects" class="top-all">浏览所有项目</a>
        </div>

        <div class="view-grid col-md-12 col-md-offset-0">
            <ul class="view-list">
                @if (!empty($types[0]))
                    @foreach ($types as $type)
                <li class="view-content">
                    <a href="/projects/{{ $type['id'] }}" class="view-item">
                        <div class="view-img">
                            <img  src="{{ $type['photo'] }}">
                        </div>
                        <div class="view-header">
                            <span>{{ $type['name'] }}</span>
                        </div>

                    </a>
                </li>
                    @endforeach
                @endif
            </ul>

        </div>
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

