@extends('front.online.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/news-detail.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="row">
            <div class="col-md-10 col-md-offset-1 title-content">
                <h1>{{ $post['name'] }}</h1>
                <a href="javascript:history.back();" class="title-back" title="返回">
                    <img class="back-icon" src="/img/return.png"
                         onMouseOver="this.src='/img/return-blue.png'"
                         onMouseOut="this.src='/img/return.png'">
                </a>
            </div>

            <div class="col-md-10 col-md-offset-1 subtitle-content">
                <span>{{ $post['time'] }}</span>
            </div>

        </div>

        <div id="owl-banner" class="owl-carousel">
            <a class="item">
                @if (!empty($post['photo']))
                    <img src="{{ $post['photo'] }}" alt="">
                @else
                    <img src="/img/photo_default.png" alt="">
                @endif
            </a>
        </div>

        <div class="row inner-detail">
            <div class="col-md-10 col-md-offset-1 abs">
                <p>
                    {{ $post['remark'] }}
                </p>
            </div>
            <div class="col-md-10 col-md-offset-1 bio">
                <p>
{{--                    {{ $post['introduction'] }}--}}
                    {!! $post['introduction'] !!}
                </p>
            </div>

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

