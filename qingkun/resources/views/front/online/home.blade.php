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

        @if (!empty($awards[0]))
            <div id="row-first" class="row row-card">
                <div class="title-card">
                    <span>获得荣誉</span>
                </div>
                <div>

                    @foreach ($awards as $award)
                        <div class="card mb-3">
                            <a class="card-main" href="/award/detail/{{ $award['id'] }}">
                                <div class="card-top">
                                    @if (!empty($award['photo']))
                                        <img class="card-img"
                                             src="{{ $award['photo'] }}" alt="Card image">
                                    @else
                                        <img class="card-img"
                                             src="/img/photo_default.png" alt="Card image">
                                    @endif

                                </div>

                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $award['name'] }}
                                    </p>
                                </div>

                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif


        @if (!empty($posts[0]))
            <div id="row-second" class="row row-card">
                <div class="title-card">
                    <span>新闻报道</span>
                </div>
                <div>

                    @foreach ($posts as $post)
                        <div class="card mb-3">
                            <a class="card-main" href="/news/detail/{{ $post['id'] }}">
                                <div class="card-top">
                                    @if (!empty($post['photo']))
                                        <img class="card-img"
                                             src="{{ $post['photo'] }}" alt="Card image">
                                    @else
                                        <img class="card-img"
                                             src="/img/photo_default.png" alt="Card image">
                                    @endif

                                </div>

                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $post['name'] }}
                                    </p>
                                </div>

                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif

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

