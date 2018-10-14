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
        @if($flag == '1')
            <div class="top-banner">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E8%A7%84%E5%88%92%E8%AE%BE%E8%AE%A1.jpg"
                     alt="">
            </div>
            <div class="top-text">
                <h3>Large Scale / 规划设计</h3>
                <p>
                    在对项目进行精准定位的基础上，对其进行较具体的规划及总体上的设计，使其功能、风格符合其定位。
                    包含：项目定位及策划、各类基地现状问题的技术性解决、区域及地块各功能系统的合理规划、规划形态形态与景观环境的塑造、人居环境可持续发展等方面内容。

                </p>
            </div>
            <div class="overlay"></div>
            @elseif($flag == '2')
            <div class="top-banner">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E5%BB%BA%E7%AD%91%E8%AE%BE%E8%AE%A1.jpg"
                     alt="">
            </div>
            <div class="top-text">
                <h3>Architecture / 建筑设计</h3>
                <p>
                    建筑项目具有很高的完成度，在实现建筑完整性的同时，满足业主需求，帮助业主提升品牌价值。
                    目前，公司各项业务稳步推进，数个项目被绿城集团作为标杆推广，目前的设计业务已涵盖住宅、酒店、商业、学校、综合体等品类。

                </p>
            </div>
            <div class="overlay"></div>
            @endif



        <div id="project-view" class="row row-card">
            <div class="title-card">
                <span>我们的成果</span>
            </div>
            <div>
                @if (!empty($projects[0]))
                    @foreach ($projects as $project)
                        <div class="card mb-3">
                            <a class="card-main" href="/project/detail/{{ $project['id'] }}">
                                <div class="card-top">
                                    @if (!empty($project['photo_large_1']))
                                        <img class="card-img"
                                             src="{{ $project['photo_large_1'] }}?x-oss-process=style/project_small"
                                             alt="Card image">
                                    @else
                                        <img class="card-img"
                                             src="/img/photo_default.png"
                                             alt="Card image">
                                    @endif
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $project['name'] }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $project['address'] }}
                                    </p>
                                </div>

                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
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

