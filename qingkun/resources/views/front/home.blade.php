@extends('front.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/home.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div id="owl-banner" class="owl-carousel">
            <a class="item">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/burjkhalifa_1400x650.jpg" alt="">
                <div class="carousel-caption" style="margin-bottom: -10px;letter-spacing:5px">上海中心大厦</div>
            </a>
            <a class="item">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/cathedralofchristthelight_1400x650.jpg"
                     alt="">
            </a>
            <a class="item">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/jti_hq_1400x650_jti_adrienbarakat_03.jpg"
                     alt="">
            </a>

        </div>

        <div id="row-first" class="row row-card">
            <div class="title-card">
                <span>获得荣誉</span>
            </div>
            <div>
                <div class="card mb-3">
                    <a class="card-main" href="{{ url('/test/awardDetail') }}">
                        <div class="card-top">
                            <img class="card-img" style="height: 200px; width: 100%; display: block;"
                                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                 alt="Card image">
                        </div>

                    {{--<div class="card-body">--}}
                        {{--<h5 class="card-title">Special title treatment</h5>--}}
                    {{--</div>--}}
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>

                    </a>
                </div>


                <div class="card mb-3">
                    <a class="card-main" href="#">
                        <div class="card-top">
                            <img class="card-img" style="height: 200px; width: 100%; display: block;"
                                 src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/cathedralofchristthelight_1400x650.jpg"
                                 alt="Card image">
                        </div>

                    {{--<div class="card-body">--}}
                        {{--<h5 class="card-title">Special title treatment</h5>--}}
                    {{--</div>--}}
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    </a>
                </div>

                <div class="card mb-3">
                    <a class="card-main" href="#">

                        <div class="card-top">
                            <img class="card-img" style="height: 200px; width: 100%; display: block;"
                                 src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/jti_hq_1400x650_jti_adrienbarakat_03.jpg"
                                 alt="Card image">
                        </div>
                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">Special title treatment</h5>--}}
                        {{--</div>--}}
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                    </a>
                </div>


            </div>
        </div>


        <div id="row-second" class="row row-card">
            <div class="title-card">
                <span>新闻报道</span>
            </div>
            <div>
                <div class="card mb-3">
                    <a class="card-main" href="{{ url('/test/newsDetail') }}">
                        <div class="card-top">
                            <img class="card-img" style="height: 200px; width: 100%; display: block;"
                                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                 alt="Card image">
                        </div>

                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">Special title treatment</h5>--}}
                        {{--</div>--}}
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>

                    </a>
                </div>

                <div class="card mb-3">
                    <a class="card-main" href="#">
                        <div class="card-top">
                            <img class="card-img" style="height: 200px; width: 100%; display: block;"
                                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_158bd1d28ef%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_158bd1d28ef%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22129.359375%22%20y%3D%2297.35%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                 alt="Card image">
                        </div>

                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">Special title treatment</h5>--}}
                        {{--</div>--}}
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.Some quick example text to build on the card title and make up the bulk
                                of
                                the card's content.</p>
                        </div>
                    </a>
                </div>

                <div class="card mb-3">
                    <a class="card-main" href="#">

                        <div class="card-top">
                            <img class="card-img" style="height: 200px; width: 100%; display: block;"
                                 src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/jti_hq_1400x650_jti_adrienbarakat_03.jpg"
                                 alt="Card image">
                        </div>
                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">Special title treatment</h5>--}}
                        {{--</div>--}}
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                    </a>
                </div>


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

