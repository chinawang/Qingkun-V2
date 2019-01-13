@extends('front.app')

@section('stylesheet')

    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/project-detail.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="row">
            <div class="col-md-10 col-md-offset-1 title-content">
                <h1>上海中心大厦地下广场</h1>
                <a href="javascript:history.back();" class="title-back" title="返回">
                    <img class="back-icon" src="/img/return.png"
                         onMouseOver="this.src='/img/return-blue.png'"
                         onMouseOut="this.src='/img/return.png'"
                    >
                </a>
            </div>

        </div>

        <div id="owl-banner" class="owl-carousel">
            <a class="item">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/burjkhalifa_1400x650.jpg" alt="">

            </a>
            <a class="item">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/cathedralofchristthelight_1400x650.jpg"
                     alt="">
            </a>
            <a class="item">
                <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/banner/jti_hq_1400x650_jti_adrienbarakat_03.jpg"
                     alt="">
            </a>

        </div>

        <div class="row inner-detail">
            <div class="col-md-3 col-md-offset-1 content-left">
                <div class="left-title">
                    <h3>项目概况</h3>
                </div>
                <div class="left-des">
                    <div>
                        <span>项目类型: </span><span>商业住宅</span>
                    </div>
                    <div>
                        <span>项目地址: </span><span>浙江,杭州</span>
                    </div>
                    <div>
                        <span>项目规模: </span><span>80000平方米</span>
                    </div>
                    <div>
                        <span>设计时间: </span><span>2017年9月</span>
                    </div>
                    <div>
                        <span>建成时间: </span><span>2018年5月</span>
                    </div>
                </div>
            </div>

            <div class=" col-md-7 col-md-offset-0 content-right">
                <div class="bio">
                    <p>
                        Javier Arizmendi is a design director with SOM’s San Francisco office. His diverse
                        portfolio includes work in the United States, Asia, and Latin America. Since joining
                        SOM in 1994, Arizmendi has worked on a variety of project types, from academic,
                        science, and technology buildings to public and civic institutions, mixed-use
                        high-rises, and transportation facilities.

                        Arizmendi’s interests reside in an architecture where the integration of building
                        systems, technology, and a sense of place are clearly expressed, as exemplified in
                        the Poly Real Estate Headquarters in Guangzhou. Arizmendi’s work on the San Diego
                        Courthouse and the University of California Los Angeles Teaching and Learning Center
                        for Health Sciences reflect a conviction for architecture that is fully engaged with
                        the city, enriching the public realm by leveraging and activating the social spaces
                        within a building as natural extensions of the city. His master planning work
                        includes the Treasure Island Master Plan in San Francisco and Beijing Finance
                        Street, which was recognized with the Global and Asia Pacific Awards of Excellence
                        by the Urban Land Institute.
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
//                navigation: true,
//                navigationText: ["上一个","下一个"]
            });
        });
    </script>

@endsection

