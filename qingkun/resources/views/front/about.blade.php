@extends('front.app')

@section('stylesheet')


    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/about.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="top-banner">
            <img src="https://static-test.tezign.com/tezign-web-homepage/images/bg-1-e53c9def5958d33f63fc48949d3aa981.png"
                 alt="">
        </div>
        <div class="top-text">
            <h3>About Us.</h3>
        </div>
        <div class="overlay"></div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1 about-title">
                <h1>QingKunDongFang Design</h1>
            </div>

            <div class="col-md-10 col-md-offset-1 about-content">
                <p>Qingkun is a creative and marketing supplier platform and data intelligence solution trusted by
                    world's leading brands. So far Tezign has served over 8,000 enterprises such as Unilever, Alibaba,
                    Starbucks, Tencent, Ping An, Ant Financial, Nestle, Honeywell, Youku, Vivo, Audi and more. Tezign
                    has received series A financing led by Sequoia Capital in 2016. In March 2018, Tezign closed $10
                    million series B financing led by Hearst Ventures.</p>

                <p>Qingkun has over 30,000 qualified creative suppliers from 17 countries, covering the areas of graphic
                    design, UIUX design, illustration, animation, social marketing, etc.</p>

                <p>Qingkun has been featured on countless global media outlets such as BBC and Forbes. Ling Fan, the
                    founder of Tezign is World Economic Forum Young Global Leaders, and co-founders, Daisy Guo and Steve
                    Wang, are World Economic Forum Global Shapers.</p>
            </div>

        </div>
        <div class="row contact-container">
            <div id="map-container" class="col-md-10 col-md-offset-1">

            </div>
            <div class="address-container">
                <h1>联系我们</h1>
                <div class="content-name">浙江青坤东方建筑设计有限公司</div>
                <div class="content-phone">电话: 000-88888888</div>
                <div class="content-mail">邮箱: hi@qingkundesign.com</div>
                <div class="content-address">地址: 杭州市西湖区文一西路588号西溪首座B2-807</div>
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

    <!--引入高德地图JSAPI Web服务Key-->
    <script type="text/javascript"
            src="http://webapi.amap.com/maps?v=1.3&key=36509bf76441007d28a74ceeb81a663d"></script>
    <!--引入UI组件库（1.0版本） -->
    <script src="//webapi.amap.com/ui/1.0/main.js"></script>

    <script type="text/javascript">

        //创建地图
        var map = new AMap.Map('map-container', {
            zoom: 15,
            center: [120.068675,30.288608],
            mapStyle: 'normal',
            zoomEnable:false,
            resizeEnable: true
        });

        map.setMapStyle('amap://styles/macaron');

        //引入SimpleMarker，loadUI的路径参数为模块名中 'ui/' 之后的部分
        AMapUI.loadUI(['overlay/SimpleMarker'], function(SimpleMarker) {
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
