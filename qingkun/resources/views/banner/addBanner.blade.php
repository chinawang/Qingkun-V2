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
                <a href="/banner/lists">Banner信息管理</a>
                <em>›</em>
                <span>添加Banner</span>
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
                        添加Banner
                        {{--<a href="/station/lists" class="btn-link">返回</a>--}}
                    </div>
                    <div class="panel-body custom-panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/banner/store">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">名称(选填)</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" placeholder="请输入名称" >

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                                <label for="remark" class="col-md-4 control-label">备注(选填)</label>

                                <div class="col-md-6">
                                    <input id="remark" type="text" class="form-control" name="remark"
                                           value="{{ old('remark') }}" placeholder="请输入备注" >

                                    @if ($errors->has('remark'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('remark') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="photo" class="col-md-4 control-label">图片</label>

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

                            <div class="form-group{{ $errors->has('project_id') ? ' has-error' : '' }}">
                                <label for="project_id" class="col-md-4 control-label">关联项目ID(选填)</label>

                                <div class="col-md-6">
                                    <input id="project_id" type="text" class="form-control" name="project_id"
                                           value="{{ old('project_id') }}" placeholder="请输入所关联的项目ID" >

                                    @if ($errors->has('project_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('project_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('index') ? ' has-error' : '' }}">
                                <label for="index" class="col-md-4 control-label">排序</label>

                                <div class="col-md-6">
                                    <input id="index" type="text" class="form-control" name="index"
                                           value="{{ old('index') }}" placeholder="请输入展示序号"
                                    >

                                    @if ($errors->has('index'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('index') }}</strong>
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
