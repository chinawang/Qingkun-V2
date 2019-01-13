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
                <a href="/award/lists">荣誉管理</a>
                <em>›</em>
                <span>{{ $award['name'] }}</span>
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
                        编辑荣誉
                        {{--<a href="/equipment/lists" class="btn-link">返回</a>--}}
                    </div>
                    <div class="panel-body custom-panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="/award/update/{{ $award['id'] }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">标题</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"
                                           value="{{ $award['name'] }}" placeholder="请输入标题" >

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
                                           value="{{ $award['photo'] }}" placeholder="请输入图片链接" >

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                                <label for="time" class="col-md-4 control-label">时间(选填)</label>

                                <div class="col-md-6">
                                    <input id="time" type="text" class="form-control" name="time"
                                           value="{{ $award['time'] }}" placeholder="请输入时间" >

                                    @if ($errors->has('time'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                                <label for="remark" class="col-md-4 control-label">摘要(选填)</label>

                                <div class="col-md-6">
                                    <textarea id="remark" type="text" class="form-control" name="remark"
                                            placeholder="请输入摘要"
                                    >{{ $award['remark'] }}
                                        </textarea>

                                    @if ($errors->has('remark'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('remark') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                                <label for="introduction" class="col-md-1 control-label">正文</label>

                                <div class="col-md-11">
                                    <textarea id="simditor" type="text" class="form-control" name="introduction"
                                            placeholder="请输入正文" >{{ $award['introduction'] }}
                                        </textarea>

                                    @if ($errors->has('introduction'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('introduction') }}</strong>
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
