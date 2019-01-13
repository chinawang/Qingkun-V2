@extends('front.app')

@section('stylesheet')


    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/employee.css') }}" rel="stylesheet">
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
            <h3>A global network of experts.</h3>
            <p>Our Partners and Directors are world-renowned leaders in their respective fields. Bringing together
                creative, technical, and management expertise, their holistic approach enhances the design and
                construction process, and contributes to the success of each project.</p>
        </div>
        <div class="overlay"></div>

        <div class="row row-card">

            <div class="card mb-3">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/arizmendi_javier_800x800_codypickens_0667.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/behr_thomas_800x800_codypickens_01.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/boswell_keith_800x800_codypickens_0121.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/danna_paul_800x800_codypickens_00238.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/duncan_michael_800x800_codypickens_0563.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/fu_xuan_800x800_codypickens_0571.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/lee_brian_800x800_codypickens_01.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/mckenzie_olin_800x800_codypickens_01.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/arizmendi_javier_800x800_codypickens_0667.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/behr_thomas_800x800_codypickens_01.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/boswell_keith_800x800_codypickens_0121.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/danna_paul_800x800_codypickens_00238.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/duncan_michael_800x800_codypickens_0563.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/fu_xuan_800x800_codypickens_0571.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/lee_brian_800x800_codypickens_01.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

            <div class="card mb-3">
                <a class="card-main" href="#">
                    <div class="card-top">
                        <img class="card-img"
                             src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/avatar/mckenzie_olin_800x800_codypickens_01.jpg"
                             alt="Card image">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Feona</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            设计总监</p>
                    </div>
                </a>
            </div>

        </div>

        <!--详情弹框-->

        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <div class="row inner-detail">
                        <div class=" col-md-4 col-md-offset-0 content-left">
                            <div class="headshot"><img
                                        src="https://www.som.com/china/FILE/26982/apking_stephen_800x800_codypickens_01.jpg"
                                        alt="Stephen Apking" style="display: block;"></div>
                            <h3>设计总监</h3>
                        </div>
                        <div class="col-md-8 col-md-offset-0 content-right">
                            <h1>Stephen Apking</h1>
                            <h3>美国建筑师协会杰出会员，室内设计合伙人</h3>
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

    <script>
        $(document).ready(function () {
            $('#myModal').modal('show');
        })
    </script>

@endsection
