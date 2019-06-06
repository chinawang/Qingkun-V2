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
            {{--<div class="overlay"></div>--}}
            <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/employ-banner.jpg"
                 alt="">
        </div>
        <div class="top-text">
            <h1>
                公司办公设经营部、规划设计部、4 个建筑组、 2 个结构组、1 个设备设计部、财务部、办公室等部门。现有团队 80 多人，骨干设计人员全程参与了绿城集团中式与现代品类产品的创新研发，并已完成多个项目的实景呈现。
            </h1>
        </div>
        <div class="overlay"></div>
        <ul class="view-content">
            @if (!empty($employees[0]))
                @foreach ($employees as $employee)
                    <li class="view-card">
                        <a class="card-main" href="#" data-toggle="modal"
                           data-target="#detailModal{{ $employee->id }}">
                            @if (!empty($employee->avatar))
                                <img class="view-img"
                                     src="{{ $employee->avatar }}"
                                     alt="Card image">
                            @else
                                <img class="view-img"
                                     src="/img/avatar_default.png"
                                     alt="Card image">
                            @endif
                            <h1 class="view-title">
                                {{ $employee->name }}
                            </h1>
                            <span class="view-text">
                            {{ $employee->job }}
                        </span>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>

        <!--详情弹框-->
        @if (!empty($employees[0]))
            @foreach ($employees as $employee)
                <div class="modal fade" id="detailModal{{ $employee->id }}" tabindex="-1" role="dialog"
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
                                        @if (!empty($employee->avatar))
                                            <img
                                                    src="{{ $employee->avatar }}"
                                                    alt="{{ $employee->name }}" style="display: block;">
                                        @else
                                            <img
                                                    src="/img/avatar_default.png"
                                                    alt="{{ $employee->name }}" style="display: block;">
                                        @endif
                                    </div>
                                    <h3>{{ $employee->job }}</h3>
                                </div>
                                <div class="col-md-8 col-md-offset-0 content-right">
                                    <h1>{{ $employee->name }}</h1>
                                    <h3>{{ $employee->abstract }}</h3>
                                    <div class="bio">
                                        <p>
                                            {{ $employee->introduction }}
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
