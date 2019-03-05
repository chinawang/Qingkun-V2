@extends('front.online.app')

@section('stylesheet')


    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/employee.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="top-banner">
            <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/som_partners_2017_1600x670_codypickens_1-v3-3.jpg"
                 alt="">
        </div>
        <div class="top-text">
            <h1>
                提供规划、建筑、景观、室内等全专业的设计服务，做到各专业的无缝衔接，为项目提供整体设计解决方案，目前，公司各项业务稳步推进，数个项目被绿城集团作为标杆推广。
            </h1>
        </div>
        <ul class="view-content">
            @if (!empty($employees[0]))
                @foreach ($employees as $employee)
                    <li class="view-card">
                        <a class="card-main" href="#" data-toggle="modal"
                           data-target="#detailModal{{ $employee['id'] }}">
                            @if (!empty($employee['avatar']))
                                <img class="view-img"
                                     src="{{ $employee['avatar'] }}"
                                     alt="Card image">
                            @else
                                <img class="view-img"
                                     src="/img/avatar_default.png"
                                     alt="Card image">
                            @endif
                            <h1 class="view-title">
                                {{ $employee['name'] }}
                            </h1>
                            <span class="view-text">
                            {{ $employee['job'] }}
                        </span>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>

        <!--详情弹框-->
        @if (!empty($employees[0]))
            @foreach ($employees as $employee)
                <div class="modal fade" id="detailModal{{ $employee['id'] }}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <div class="row inner-detail">
                                <div class=" col-md-4 col-md-offset-0 content-left">
                                    <div class="headshot">
                                        @if (!empty($employee['avatar']))
                                            <img
                                                    src="{{ $employee['avatar'] }}"
                                                    alt="{{ $employee['name'] }}" style="display: block;">
                                        @else
                                            <img
                                                    src="/img/avatar_default.png"
                                                    alt="{{ $employee['name'] }}" style="display: block;">
                                        @endif
                                    </div>
                                    <h3>{{ $employee['job'] }}</h3>
                                </div>
                                <div class="col-md-8 col-md-offset-0 content-right">
                                    <h1>{{ $employee['name'] }}</h1>
                                    <h3>{{ $employee['abstract'] }}</h3>
                                    <div class="bio">
                                        <p>
                                            {{ $employee['introduction'] }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

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

@endsection
