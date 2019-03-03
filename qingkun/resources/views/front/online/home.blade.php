@extends('front.online.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/online/home.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div id="owl-banner" class="owl-carousel">
            @if (!empty($banners[0]))
                @foreach ($banners as $banner)
                    @if (!empty($banner['project_id']))
                        <a class="item" href="project/detail/{{ $banner['project_id'] }}">
                            @if (!empty($banner['photo']))
                                <img src="{{ $banner['photo'] }}" alt="">
                            @else
                                <img src="/img/banner_default.png" alt="">
                            @endif

                            <div class="carousel-caption"
                                 style="margin-bottom: -10px;letter-spacing:5px">{{ $banner['name'] }}</div>
                        </a>
                    @else
                        <a class="item">
                            @if (!empty($banner['photo']))
                                <img src="{{ $banner['photo'] }}" alt="">
                            @else
                                <img src="/img/banner_default.png" alt="">
                            @endif
                            <div class="carousel-caption"
                                 style="margin-bottom: -10px;letter-spacing:5px">{{ $banner['name'] }}</div>
                        </a>
                    @endif
                @endforeach
            @endif
        </div>

    </div>

    <footer class="footer-container">
        <div class="col-md-8 col-md-offset-2 foot-text">
            <a class="foot-link" href="http://www.miitbeian.gov.cn/" target="_blank">
                浙ICP备18021663号
            </a>
            &nbsp
            <span>©2018 浙江青坤东方建筑设计有限公司</span>
        </div>
    </footer>


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


@endsection

