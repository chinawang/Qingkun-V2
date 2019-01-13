<!-- Powered by wangyx -->
<!-- Email:chinawangyx@hotmail.com -->
<!-- Wechat:ChinaWangyx -->
<!-- May the force be with you. -->

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/bootstrap-litera.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

{{--    <link href="{{ asset('css/common/layout.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/front/coding.css') }}" rel="stylesheet">

    <link href="{{ asset('css/front/footer.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 code-container">
            <img class="card-img code-img"
                 src="/img/programming.png">
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

</div>



</body>
</html>
