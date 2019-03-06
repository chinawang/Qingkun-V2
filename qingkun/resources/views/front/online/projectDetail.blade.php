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

        {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1 title-content">--}}
        {{--<h1>{{ $project['name'] }}</h1>--}}
        {{--<a href="javascript:history.back();" class="title-back" title="返回">--}}
        {{--<img class="back-icon" src="/img/return.png"--}}
        {{--onMouseOver="this.src='/img/return-blue.png'"--}}
        {{--onMouseOut="this.src='/img/return.png'"--}}
        {{-->--}}
        {{--</a>--}}
        {{--</div>--}}

        {{--<div class="col-md-10 col-md-offset-1 subtitle-content">--}}
        {{--<span>{{ $project['abstract'] }}</span>--}}
        {{--</div>--}}

        {{--</div>--}}

        <div id="owl-banner" class="owl-carousel">
            @if (!empty($project['photo_large_1']))
                <a class="item">
                    <img src="{{ $project['photo_large_1'] }}" alt="">
                </a>
            @else
                <a class="item">
                    <img src="/img/photo_default.png" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_2']))
                <a class="item">
                    <img src="{{ $project['photo_large_2'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_3']))
                <a class="item">
                    <img src="{{ $project['photo_large_3'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_4']))
                <a class="item">
                    <img src="{{ $project['photo_large_4'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_5']))
                <a class="item">
                    <img src="{{ $project['photo_large_5'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_6']))
                <a class="item">
                    <img src="{{ $project['photo_large_6'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_7']))
                <a class="item">
                    <img src="{{ $project['photo_large_7'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_8']))
                <a class="item">
                    <img src="{{ $project['photo_large_8'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_9']))
                <a class="item">
                    <img src="{{ $project['photo_large_9'] }}" alt="">
                </a>
            @endif
            @if (!empty($project['photo_large_10']))
                <a class="item">
                    <img src="{{ $project['photo_large_10'] }}" alt="">
                </a>
            @endif

        </div>
        <span class="view-subtext">{{ $project['provence_name'] }} / {{ $project['address'] }}</span>
        <span class="view-text">{{ $project['name'] }}</span>
        <div class="view-tag">
            @foreach($project['assignTypes'] as $assignType)
                <a href="/projects/?type_id={{ $assignType['id'] }}" class="tag-item">
                    {{ $assignType['name'] }}
                </a>
            @endforeach
        </div>

        <div class="row inner-detail">
                <div class="top-text">
                    <h1>
                        {{--{{ $project['introduction'] }}--}}
                        {!! $project['introduction'] !!}
                    </h1>
                </div>

            <div class="content-title">
                <h3>项目概况</h3>
            </div>
            <div class="content-container">
                <ul>
                    @if (!empty($project['type']))
                        <li class="content-item">
                            <span class="item-title">建筑类型: </span><span class="item-detail">{{ $project['type'] }}</span>
                        </li>
                    @endif
                    @if (!empty($project['address']))
                        <li class="content-item">
                            <span class="item-title">项目地址: </span><span class="item-detail">{{ $project['address'] }}</span>
                        </li>
                    @endif
                    @if (!empty($project['land_size']))
                        <li class="content-item">
                            <span class="item-title">总用地面积: </span><span class="item-detail">{{ $project['land_size'] }}</span>
                        </li>
                    @endif
                    @if (!empty($project['size']))
                        <li class="content-item">
                            <span class="item-title">总建筑面积: </span><span class="item-detail">{{ $project['size'] }}</span>
                        </li>
                    @endif
                    @if (!empty($project['stage']))
                        <li class="content-item">
                            <span class="item-title">设计阶段: </span><span class="item-detail">{{ $project['stage'] }}</span>
                        </li>
                    @endif
                    @if (!empty($project['design_time']))
                        <li class="content-item">
                            <span class="item-title">设计时间: </span><span class="item-detail">{{ $project['design_time'] }}</span>
                        </li>
                    @endif
                    @if (!empty($project['build_time']))
                        <li class="content-item">
                            <span class="item-title">建成时间: </span><span class="item-detail">{{ $project['build_time'] }}</span>
                        </li>
                    @endif
                </ul>
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

