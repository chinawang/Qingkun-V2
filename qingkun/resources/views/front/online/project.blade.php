@extends('front.online.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/project.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">
        <div class="top-bar">
            <div class="filter-bar">
                <div class=" bar-item">
                    <a href="javascript:;" class="toggle filter-title" id="menu-toggle1">
                        <h1 class="material-icons">
                            项目类型
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </h1>

                    </a>
                    <ul class="menu filter-list" data-menu data-menu-toggle="#menu-toggle1">
                        @foreach ($types as $type)
                            <li class="filter-item">
                                <a href="#">{{ $type->name }}</a>
                                <input type="hidden" name="type_id" value="{{ $type->id }}">
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class=" bar-item">
                    <a href="javascript:;" class="toggle filter-title" id="menu-toggle2">
                        <h1 class="material-icons">
                            区域
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </h1>

                    </a>
                    <ul class="menu filter-list" data-menu data-menu-toggle="#menu-toggle2">
                        @foreach ($provences as $provence)
                            <li class="filter-item">
                                <a href="#">{{ $provence->name }}</a>
                                <input type="hidden" name="provence_id" value="{{ $provence->id }}">
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>


        <h1 class="top-text">{{ $count }}个项目</h1>
    </div>

    <div class="view-grid col-md-12 col-md-offset-0">
        <ul class="view-list">
            @if (!empty($projects[0]))
                @foreach ($projects as $project)
                    <li class="view-content">
                        <a href="/project/detail/{{ $project->id }}" class="view-item">
                            <img class="view-img" src="{{ $project->photo_large_1 }}?x-oss-process=style/type">
                            <span class="view-subtext">{{ $project->provence_name }}</span>
                            <span class="view-text">{{ $project->name }}</span>
                        </a>
                        </form>
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
    <script src="{{ asset('js/menu.js') }}"></script>
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

            $('[data-menu]').menu();
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

