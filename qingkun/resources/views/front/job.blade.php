@extends('front.app')

@section('stylesheet')


    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/job.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="main">

        <div class="top-banner">
            <img src="https://qingkun-img.oss-cn-hangzhou.aliyuncs.com/static/som_careers_1600x670_codypickens_01-2.jpg"
                 alt="">
        </div>
        <div class="top-text">
            <h3>Work at Qingkun.</h3>
            <p>Qingkun offers a rewarding career experience, a collaborative interdisciplinary environment, and the opportunity
                to work on some of the world’s most exciting and progressive projects in architecture, engineering,
                urban planning, interior design, and environmental graphics.</p>
        </div>
        <div class="overlay"></div>

        <div class="row row-card">
            <div class="card">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <h1 class="item-title">设计总监</h1>
                    <div class="item-subtitle">
                        <span class="item-depart">研发部</span>
                        <span class="item-address">浙江,杭州</span>
                        <span class="item-link">查看详情</span>
                    </div>
                </a>
            </div>

            <div class="card">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <h1 class="item-title">设计总监</h1>
                    <div class="item-subtitle">
                        <span class="item-depart">研发部</span>
                        <span class="item-address">浙江,杭州</span>
                        <span class="item-link">查看详情</span>
                    </div>
                </a>
            </div>

            <div class="card">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <h1 class="item-title">设计总监</h1>
                    <div class="item-subtitle">
                        <span class="item-depart">研发部</span>
                        <span class="item-address">浙江,杭州</span>
                        <span class="item-link">查看详情</span>
                    </div>
                </a>
            </div>

            <div class="card">
                <a class="card-main" href="#" data-toggle="modal" data-target="#detailModal">
                    <h1 class="item-title">设计总监</h1>
                    <div class="item-subtitle">
                        <span class="item-depart">研发部</span>
                        <span class="item-address">浙江,杭州</span>
                        <span class="item-link">查看详情</span>
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
                        <div class="col-md-12 col-md-offset-0 content">
                            <h1 class="content-title">设计总监</h1>
                            <div class="content-subtitle">
                                <span class="content-depart">研发部</span>
                                <span class="content-address">浙江,杭州</span>
                            </div>
                            <div class="content-first">
                                <div class="first-title">
                                    <span>岗位介绍</span>
                                </div>
                                <div class="first-content">
                                    <p>1.负责建立和维护与国内外相关媒体，领馆商会、政府机构等的沟通渠道和良好的互动合作关系，有计划的开展各项公关活动</p>
                                    <p>2.媒体关系拓展，维护以及优化，在重点国内外市场建立有效的媒体关系和评估体系，为建立品牌创造良好的环境</p>
                                    <p>3.负责策划和实施新闻发布会或公共关系专业活动，独立撰写公司品牌及产品新闻稿件，提高品牌影响力</p>
                                    <p>4.根据公司发展战略，制定相应的媒体策略并管理执行，对效果负责</p>
                                    <p>5.整合公司内部资源，通过公关手段提升公司在社会各层的认知度。配合自媒体团队开发、建设互联网媒体及社交媒体关系，建设广泛的合作，并与自媒体团队合作策划互联网公关活动及执行；</p>
                                    <p>6.应对与处理负面新闻，进行危机公关。</p>

                                </div>
                            </div>

                            <div class="content-second">
                                <div class="second-title">
                                    <span>岗位要求</span>
                                </div>
                                <div class="second-content">
                                    <p>1.全日制本科及以上学历，企业管理，公共关系等相关专业毕业，海外留学/工作经历优先，英语口语及书写能力强</p>
                                    <p>2.3年以上互联网行业相关工作经验，媒体从业经验优先</p>
                                    <p>3.了解互联网传播特性，具有较强的信息搜索，捕捉，整合及分析能力</p>
                                    <p>4. 形象气质好，情商高，具备较强的观察力和应变能力，人际交往和协调能力佳</p>
                                    <p>5.认同公司文化和发展方向，愿意与公司共同成长</p>
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
