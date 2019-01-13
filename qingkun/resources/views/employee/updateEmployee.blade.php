@extends('layouts.app')

@section('stylesheet')
    <link href="{{ asset('css/employee/employee.css') }}" rel="stylesheet">
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
                <a href="/employee/lists">人员管理</a>
                <em>›</em>
                <span>{{ $employee['name'] }}</span>
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
                        编辑人员
                        {{--<a href="/equipment/lists" class="btn-link">返回</a>--}}
                    </div>
                    <div class="panel-body custom-panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="/employee/update/{{ $employee['id'] }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">姓名</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"
                                           value="{{ $employee['name'] }}" placeholder="请输入姓名" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                <label for="job" class="col-md-4 control-label">职位/头衔(选填)</label>

                                <div class="col-md-6">
                                    <input id="job" type="text" class="form-control" name="job"
                                           value="{{ $employee['job'] }}" placeholder="请输入职位/头衔"
                                    >

                                    @if ($errors->has('job'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('job') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('abstract') ? ' has-error' : '' }}">
                                <label for="abstract" class="col-md-4 control-label">简介(选填)</label>

                                <div class="col-md-6">
                                    <input id="abstract" type="text" class="form-control" name="abstract"
                                           value="{{ $employee['abstract'] }}" placeholder="请输入一句话简介" >

                                    @if ($errors->has('abstract'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('abstract') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                                <label for="introduction" class="col-md-4 control-label">详细介绍(选填)</label>

                                <div class="col-md-6">
                                    <textarea id="introduction" type="text" class="form-control" name="introduction"
                                            placeholder="请输入详细介绍" >{{ $employee['introduction'] }}
                                        </textarea>

                                    @if ($errors->has('introduction'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('introduction') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-md-4 control-label">照片</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="text" class="form-control" name="avatar"
                                           value="{{ $employee['avatar'] }}" placeholder="请输入照片链接" >

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
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
