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
                <a href="/job/lists">招聘信息管理</a>
                <em>›</em>
                <span>添加招聘</span>
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
                        添加招聘
                        {{--<a href="/station/lists" class="btn-link">返回</a>--}}
                    </div>
                    <div class="panel-body custom-panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/job/store">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                <label for="job" class="col-md-4 control-label">职位名称</label>

                                <div class="col-md-6">
                                    <input id="job" type="text" class="form-control" name="job"
                                           value="{{ old('job') }}" placeholder="请输入职位名称" >

                                    @if ($errors->has('job'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('job') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                                <label for="department" class="col-md-4 control-label">部门(选填)</label>

                                <div class="col-md-6">
                                    <input id="department" type="text" class="form-control" name="department"
                                           value="{{ old('department') }}" placeholder="请输入所属部门" >

                                    @if ($errors->has('department'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                                <label for="introduction" class="col-md-4 control-label">岗位介绍</label>

                                <div class="col-md-6">
                                    <textarea id="simditor" type="text" class="form-control" name="introduction"
                                           value="{{ old('introduction') }}" placeholder="请输入岗位介绍"
                                    >
                                        </textarea>

                                    @if ($errors->has('introduction'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('introduction') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('requirement') ? ' has-error' : '' }}">
                                <label for="requirement" class="col-md-4 control-label">岗位要求</label>

                                <div class="col-md-6">
                                    <textarea id="simditorP" type="text" class="form-control" name="requirement"
                                           value="{{ old('requirement') }}" placeholder="岗位要求" >
                                        </textarea>

                                    @if ($errors->has('requirement'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('requirement') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

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
                var editor,editorP,toolbar;
                Simditor.locale = 'zh-CN';
                toolbar = [ 'ol', 'ul', ];

                editor = new Simditor({
                    textarea: $('#simditor'),
                    placeholder: '这里输入文字...',
                    toolbar: toolbar,
                    upload: false
                });

                editorP = new Simditor({
                    textarea: $('#simditorP'),
                    placeholder: '这里输入文字...',
                    toolbar: toolbar,
                    upload: false
                });
            });

        }).call(this);


    </script>

@endsection
