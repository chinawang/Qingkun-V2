@extends('front.online.app')

@section('stylesheet')


    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/job.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="top-banner">
            <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E5%B7%A5%E4%BD%9C%E6%9C%BA%E4%BC%9A.jpg"
                 alt="">
        </div>
        <div class="top-text">
            <h3>工作机会</h3>
            <p>
                开放办公环境,轻松工作氛围,清晰职业规划
            </p>
        </div>
        <div class="overlay"></div>

        <div class="row row-card">
            @if (!empty($jobs[0]))
                @foreach ($jobs as $job)
                    <div class="card">
                        <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal{{ $job['id'] }}">
                            <h1 class="item-title">{{ $job['job'] }}</h1>
                            <div class="item-subtitle">
                                <span class="item-depart">{{ $job['department'] }}</span>
                                <span class="item-address">浙江,杭州</span>
                                <span class="item-link">查看详情</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <!--详情弹框-->
        @if (!empty($jobs[0]))
            @foreach ($jobs as $job)
                <div class="modal fade" id="detailModal{{ $job['id'] }}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <div class="row inner-detail">
                                <div class="col-md-12 col-md-offset-0 content">
                                    <h1 class="content-title">{{ $job['job'] }}</h1>
                                    <div class="content-subtitle">
                                        <span class="content-depart">{{ $job['department'] }}</span>
                                        <span class="content-address">浙江,杭州</span>
                                    </div>
                                    <div class="content-first">
                                        <div class="first-title">
                                            <span>岗位介绍</span>
                                        </div>
                                        <div class="first-content">
                                            <p>
                                                {{--{{ $job['introduction'] }}--}}
                                                {!! $job['introduction'] !!}
                                            </p>

                                        </div>
                                    </div>

                                    <div class="content-second">
                                        <div class="second-title">
                                            <span>岗位要求</span>
                                        </div>
                                        <div class="second-content">
                                            <p>
{{--                                                {{ $job['requirement'] }}--}}
                                                {!! $job['requirement'] !!}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="content-footer">
                                        <span>投递简历请发送邮件至：jobs@qingkundesign.com</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

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

    <script>
        $(document).ready(function () {
            $('#myModal').modal('show');
        })
    </script>

@endsection
