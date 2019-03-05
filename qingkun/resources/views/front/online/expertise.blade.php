@extends('front.online.app')

@section('stylesheet')


    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/expertise.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="top-banner">
            <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E5%BB%BA%E7%AD%91%E8%AE%BE%E8%AE%A1.jpg"
                 alt="">
        </div>
        <div class="top-text">
            <h1>
                提供规划、建筑、景观、室内等全专业的设计服务，做到各专业的无缝衔接，为项目提供整体设计解决方案，目前，公司各项业务稳步推进，数个项目被绿城集团作为标杆推广。
            </h1>
        </div>
        {{--<div class="overlay"></div>--}}
        <ul class="view-content">
            @if (!empty($expertises[0]))
                @foreach ($expertises as $expertise)
                    <li class="view-card">
                        <img class="view-img" src="{{ $expertise['photo'] }}">
                        <h1 class="view-title">
                            {{ $expertise['name'] }}
                        </h1>
                        <span class="view-text">
                            {{ $expertise['introduction'] }}
                        </span>
                    </li>
                @endforeach
            @endif

            <div class="view-bottom">
                <a href="/projects" class="view-btn">浏览所有项目</a>
            </div>
        </ul>

    </div>
@endsection

@section('javascript')

    <!--引入高德地图JSAPI Web服务Key-->
    <script type="text/javascript"
            src="http://webapi.amap.com/maps?v=1.3&key=36509bf76441007d28a74ceeb81a663d"></script>
    <!--引入UI组件库（1.0版本） -->
    <script src="//webapi.amap.com/ui/1.0/main.js"></script>

    <script type="text/javascript">

        //创建地图
        var map = new AMap.Map('map-container', {
            zoom: 15,
            center: [120.068675, 30.288608],
            mapStyle: 'normal',
            zoomEnable: false,
            resizeEnable: true
        });

        map.setMapStyle('amap://styles/macaron');

        //引入SimpleMarker，loadUI的路径参数为模块名中 'ui/' 之后的部分
        AMapUI.loadUI(['overlay/SimpleMarker'], function (SimpleMarker) {
            //启动页面
            initPage(SimpleMarker);
        });

        function initPage(SimpleMarker) {

            //创建SimpleMarker实例
            new SimpleMarker({

                //前景文字
//                iconLabel: '',

                //图标主题
                iconTheme: 'default',

                //背景图标样式
                iconStyle: 'gray',

                //...其他Marker选项...，不包括content
                map: map,
                position: [120.073323, 30.288055]
            });
        }

        // 创建一个 Marker 实例：
        //        var marker = new AMap.Marker({
        //            iconStyle:'black',
        //            position: new AMap.LngLat(120.073323, 30.288055),
        //
        //        });

        // 将创建的点标记添加到已有的地图实例：
        //        map.add(marker);

    </script>

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
