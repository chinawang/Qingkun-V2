@extends('front.online.app')

@section('stylesheet')


    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/online/about.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="top-banner">
            <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E5%85%B3%E4%BA%8E%E6%88%91%E4%BB%AC.jpg"
                 alt="">
        </div>
        <div class="top-text">
            <h3>关于我们</h3>
            <span>
                成立5年 , 集建筑设计和城市规划于一体
            </span>
        </div>
        <div class="overlay"></div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1 row-card">
                <div class="card-right">
                    <img class="card-img"
                         src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E5%85%AC%E5%8F%B8%E4%BB%8B%E7%BB%8D.jpg?x-oss-process=style/about_img">
                </div>
                <div class="card-left">
                    <div class=" about-title">
                        <h1>公司介绍</h1>
                    </div>

                    <div class=" about-content">
                        <span>
                            浙江青坤东方建筑设计有限公司（原崇创建筑CCA）成立于2013年10月,为绿城集团控股的一家集建筑设计和城市规划于一体的专业设计公司。
                        </span>
                        <span>
                            公司秉承绿城文化理念、依托绿城品牌及管理资源，不断推进全面、健康、可持续发展。
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1 row-card">
                <div class="card-left">
                    <img class="card-img"
                         src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E4%B8%9A%E5%8A%A1%E8%8C%83%E5%9B%B4.jpg?x-oss-process=style/about_img">
                </div>
                <div class="card-right">
                    <div class=" about-title">
                        <h1>业务范围</h1>
                    </div>

                    <div class=" about-content">
                        <span>
                            提供规划、建筑、景观、室内等全专业的设计服务，做到各专业的无缝衔接，为项目提供整体设计解决方案，目前，公司各项业务稳步推进，数个项目被绿城集团作为标杆推广。
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1 row-card">
                <div class="card-right">
                    <img class="card-img"
                         src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E5%85%AC%E5%8F%B8%E5%9B%A2%E9%98%9F.jpg?x-oss-process=style/about_img">
                </div>
                <div class="card-left">
                    <div class=" about-title">
                        <h1>团队组成</h1>
                    </div>

                    <div class=" about-content">
                        <span>
                            绿城青坤建筑设计集团，旗下包含浙江青坤源景规划设计有限公司、浙江青坤房产咨询有限公司、浙江青坤装饰设计有限公司、浙江青坤东方建筑设计有限公司以及浙江青坤麦肯景观设计有限公司。
                        </span>
                        <span>
                            公司办公设经营部、规划设计部、4 个建筑组、 2 个结构组、1 个设备设计部、财务部、办公室等部门。现有团队 80 多人，骨干设计人员全程参与了绿城集团中式与现代品类产品的创新研发，并已完成多个项目的实景呈现。
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1 row-card">
                <div class="card-left">
                    <img class="card-img"
                         src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E8%AE%BE%E8%AE%A1%E7%90%86%E5%BF%B5.jpg?x-oss-process=style/about_img">
                </div>
                <div class="card-right">
                    <div class=" about-title">
                        <h1>设计理念</h1>
                    </div>

                    <div class=" about-content">
                        <span>
                            公司以崇尚建筑与自然的和谐为设计理念，为社会提供传承经典的建筑作品。
                            公司的设计源于对建筑全生命周期的思考，充分考虑项目质量、成本及运营的可行性，秉承人文设计理念，以持续不断的专业化与创新精神，坚持为客户提供高品质的设计作品和精品化的专业服务。
                        </span>
                        <span>
                            公司以创建学习型企业为着力点，在“真诚、善意、精致、完美”的理念指导下，争创集团体系中优秀品牌设计公司。
                        </span>
                    </div>
                </div>

            </div>

            <div class="col-md-10 col-md-offset-1 row-card">
                <div class="card-right">
                    <img class="card-img"
                         src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/%E5%85%AC%E5%8F%B8%E6%84%BF%E6%99%AF.jpg?x-oss-process=style/about_img">
                </div>
                <div class="card-left">
                    <div class=" about-title">
                        <h1>公司愿景</h1>
                    </div>

                    <div class=" about-content">
                        <span>
                            公司秉承“真诚、善意”的企业理念。绿城于2007年首创绿城园区生活服务体系，该体系包括健康、文化教育、生活三大服务系统，全方位关爱居住者身心健康。
                        </span>
                        <span>
                            2011年，绿城启动的以提供高品质的老年教育产品为特色的颐乐学堂，则又彰显着绿城对社会责任与人文责任的深刻理解与实践。
                        </span>
                    </div>
                </div>

            </div>

        </div>


        <div class="row contact-container">
            <div id="map-container" class="col-md-10 col-md-offset-1">

            </div>
            <div class="address-container">
                <h1>联系我们</h1>
                <div class="content-name">浙江青坤东方建筑设计有限公司</div>
                <div class="content-phone">电话: 0571-81103512</div>
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
