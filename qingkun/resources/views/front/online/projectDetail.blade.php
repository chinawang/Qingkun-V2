@extends('front.online.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/project-detail.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="row">
            <div class="col-md-10 col-md-offset-1 title-content">
                <h1>{{ $project['name'] }}</h1>
                <a href="javascript:history.back();" class="title-back" title="返回">
                    <img class="back-icon" src="/img/return.png"
                         onMouseOver="this.src='/img/return-blue.png'"
                         onMouseOut="this.src='/img/return.png'"
                    >
                </a>
            </div>

            {{--<div class="col-md-10 col-md-offset-1 subtitle-content">--}}
            {{--<span>{{ $project['abstract'] }}</span>--}}
            {{--</div>--}}

        </div>

        <div id="owl-banner" class="owl-carousel">
            @if (!empty($project['photo_large_1']))
                <a class="item">
                    <img src="{{ $project['photo_large_1'] }}?x-oss-process=style/project_big" alt="">
                </a>
            @else
                <a class="item">
                    <img src="/img/photo_default.png" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_2']))
                <a class="item">
                    <img src="{{ $project['photo_large_2'] }}?x-oss-process=style/project_big" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_3']))
                <a class="item">
                    <img src="{{ $project['photo_large_3'] }}?x-oss-process=style/project_big" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_4']))
                <a class="item">
                    <img src="{{ $project['photo_large_4'] }}?x-oss-process=style/project_big" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_5']))
                <a class="item">
                    <img src="{{ $project['photo_large_5'] }}?x-oss-process=style/project_big" alt="">
                </a>
            @endif

        </div>

        <div class="row inner-detail">
            <div class="col-md-3 col-md-offset-1 content-left">
                <div class="left-title">
                    <h3>项目概况</h3>
                </div>
                <div class="left-des">
                    @if (!empty($project['type']))
                        <div>
                            <span>建筑类型: </span><span>{{ $project['type'] }}</span>
                        </div>
                    @endif
                    @if (!empty($project['address']))
                        <div>
                            <span>项目地址: </span><span>{{ $project['address'] }}</span>
                        </div>
                    @endif
                    @if (!empty($project['land_size']))
                        <div>
                            <span>总用地面积: </span><span>{{ $project['land_size'] }}</span>
                        </div>
                    @endif
                    @if (!empty($project['size']))
                        <div>
                            <span>总建筑面积: </span><span>{{ $project['size'] }}</span>
                        </div>
                    @endif
                    @if (!empty($project['stage']))
                        <div>
                            <span>设计阶段: </span><span>{{ $project['stage'] }}</span>
                        </div>
                    @endif
                    @if (!empty($project['design_time']))
                        <div>
                            <span>设计时间: </span><span>{{ $project['design_time'] }}</span>
                        </div>
                    @endif
                    @if (!empty($project['build_time']))
                        <div>
                            <span>建成时间: </span><span>{{ $project['build_time'] }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class=" col-md-7 col-md-offset-0 content-right">
                <div class="bio">
                    <p>
                        {{--{{ $project['introduction'] }}--}}
                        {!! $project['introduction'] !!}
                    </p>
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
                navigation: false,
//                navigationText: ["<",">"]
            });
        });
    </script>

@endsection

