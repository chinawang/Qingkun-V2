@extends('layouts.app')

@section('stylesheet')
    <link href="{{ asset('css/employee/employee.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simditor/simditor.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>工作人员管理</span>--}}
@endsection

@section('location')
    <div class="location">
        <div class="container">
            <h2>
                <a href="{{ url('/admin') }}">首页</a>
                <em>›</em>
                <a href="/expertise/lists">专长管理</a>
                <em>›</em>
                <span>添加专长</span>
            </h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default custom-panel">
                    <div class="panel-heading">
                        添加专长
                        {{--<a href="/station/lists" class="btn-link">返回</a>--}}
                    </div>
                    <div class="panel-body custom-panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/expertise/store">
                            {{ csrf_field() }}

                            {{--<div class="form-group{{ $errors->has('	type') ? ' has-error' : '' }}">--}}
                                {{--<label for="type" class="col-md-4 control-label">类型</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<select class="form-control" id="select" name="type">--}}
                                        {{--<option value="1">结构工程</option>--}}
                                        {{--<option value="2">环境工程</option>--}}
                                        {{--<option value="3">建筑设计</option>--}}
                                        {{--<option value="4">室内设计</option>--}}
                                    {{--</select>--}}
                                    {{--@if ($errors->has('	type'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('	type') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" placeholder="请输入名称">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="photo" class="col-md-4 control-label">封面图片</label>

                                <div class="col-md-6">
                                    <input id="photo" type="text" class="form-control" name="photo"
                                           value="{{ old('photo') }}" placeholder="请输入图片链接"
                                    >

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                                <label for="introduction" class="col-md-4 control-label">正文描述</label>

                                <div class="col-md-6">
                                    <textarea id="introduction" type="text" class="form-control" name="introduction"
                                              value="{{ old('introduction') }}" placeholder="请输入详细介绍" >
                                        </textarea>

                                    @if ($errors->has('introduction'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('introduction') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">--}}
                                {{--<label for="introduction" class="col-md-1 control-label">正文</label>--}}

                                {{--<div class="col-md-11">--}}
                                    {{--<textarea id="simditor" type="text" class="form-control" name="introduction"--}}
                                              {{--placeholder="请输入正文">{{ old('introduction') }}--}}
                                        {{--</textarea>--}}

                                    {{--@if ($errors->has('introduction'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('introduction') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-custom">
                                        <span class="glyphicon glyphicon-ok-sign"></span>
                                        保存
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <!--富文本simditor-->
    <script src="{{ asset('js/simditor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/simditor/module.min.js') }}"></script>
    <script src="{{ asset('js/simditor/hotkeys.min.js') }}"></script>
    <script src="{{ asset('js/simditor/uploader.min.js') }}"></script>
    <script src="{{ asset('js/simditor/simditor.min.js') }}"></script>

    <script>

        (function() {
            $(function() {
                var editor,toolbar;
                Simditor.locale = 'zh-CN';
                toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul',  'link', 'hr', '|', 'indent', 'outdent', 'alignment'];

                editor = new Simditor({
                    textarea: $('#simditor'),
                    placeholder: '这里输入文字...',
                    toolbar: toolbar,
                    upload: false
                });
            });

        }).call(this);


    </script>

@endsection
