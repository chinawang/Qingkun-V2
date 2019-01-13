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
                <a href="/project/lists">项目信息管理</a>
                <em>›</em>
                <span>{{ $project['name'] }}</span>
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
                        编辑项目
                        {{--<a href="/station/lists" class="btn-link">返回</a>--}}
                    </div>
                    <div class="panel-body custom-panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="/project/update/{{ $project['id'] }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('flag') ? ' has-error' : '' }}">
                                <label for="flag" class="col-md-4 control-label">项目类型</label>

                                <div class="col-md-6">
                                    <label class="checkbox-inline">
                                        <input name="flag" type="radio" id="radio1"
                                               value="1"  {{$project['flag'] != '1'?:' checked'}}>  规划设计
                                    </label>
                                    <label class="checkbox-inline">
                                        <input name="flag" type="radio" id="radio1"
                                               value="2"  {{$project['flag'] != '2'?:' checked'}}>  建筑设计
                                    </label>

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">项目名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ $project['name'] }}" placeholder="请输入项目名称" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">建筑类型(选填)</label>

                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control" name="type"
                                           value="{{ $project['type'] }}" placeholder="请输入建筑类型" >

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">地址(选填)</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                           value="{{ $project['address'] }}" placeholder="请输入地址"
                                    >

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stage') ? ' has-error' : '' }}">
                                <label for="stage" class="col-md-4 control-label">设计阶段(选填)</label>

                                <div class="col-md-6">
                                    <input id="stage" type="text" class="form-control" name="stage"
                                           value="{{ $project['stage'] }}" placeholder="请输入设计阶段" >

                                    @if ($errors->has('stage'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stage') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('design_time') ? ' has-error' : '' }}">
                                <label for="design_time" class="col-md-4 control-label">设计时间(选填)</label>

                                <div class="col-md-6">
                                    <input id="design_time" type="text" class="form-control" name="design_time"
                                           value="{{ $project['design_time'] }}" placeholder="请输入设计时间" >

                                    @if ($errors->has('design_time'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('design_time') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('build_time') ? ' has-error' : '' }}">--}}
                                {{--<label for="build_time" class="col-md-4 control-label">建成时间(选填)</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="build_time" type="text" class="form-control" name="build_time"--}}
                                           {{--value="{{ $project['build_time'] }}" placeholder="请输入建成时间" >--}}

                                    {{--@if ($errors->has('build_time'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('build_time') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group{{ $errors->has('land_size') ? ' has-error' : '' }}">
                                <label for="land_size" class="col-md-4 control-label">总用地面积(选填)</label>

                                <div class="col-md-6">
                                    <input id="land_size" type="text" class="form-control" name="land_size"
                                           value="{{ $project['land_size'] }}" placeholder="请输入总用地面积" >

                                    @if ($errors->has('land_size'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('land_size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                                <label for="size" class="col-md-4 control-label">总建筑面积(选填)</label>

                                <div class="col-md-6">
                                    <input id="size" type="text" class="form-control" name="size"
                                           value="{{ $project['size'] }}" placeholder="请输入总建筑面积" >

                                    @if ($errors->has('size'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('abstract') ? ' has-error' : '' }}">
                                <label for="abstract" class="col-md-4 control-label">简介(选填)</label>

                                <div class="col-md-6">
                                    <input id="abstract" type="text" class="form-control" name="abstract"
                                           value="{{ $project['abstract'] }}" placeholder="请输入简介" >

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
                                            placeholder="请输入详细介绍" >{{ $project['introduction'] }}
                                        </textarea>

                                    @if ($errors->has('introduction'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('introduction') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo_large_1') ? ' has-error' : '' }}">
                                <label for="photo_large_1" class="col-md-4 control-label">图片一(选填)</label>

                                <div class="col-md-6">
                                    <input id="photo_large_1" type="text" class="form-control" name="photo_large_1"
                                           value="{{ $project['photo_large_1'] }}" placeholder="请输入图片一的链接" >

                                    @if ($errors->has('photo_large_1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo_large_1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo_large_2') ? ' has-error' : '' }}">
                                <label for="photo_large_2" class="col-md-4 control-label">图片二(选填)</label>

                                <div class="col-md-6">
                                    <input id="photo_large_2" type="text" class="form-control" name="photo_large_2"
                                           value="{{ $project['photo_large_2'] }}" placeholder="请输入图片二的链接" >

                                    @if ($errors->has('photo_large_2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo_large_2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo_large_3') ? ' has-error' : '' }}">
                                <label for="photo_large_3" class="col-md-4 control-label">图片三(选填)</label>

                                <div class="col-md-6">
                                    <input id="photo_large_3" type="text" class="form-control" name="photo_large_3"
                                           value="{{ $project['photo_large_3'] }}" placeholder="请输入图片三的链接" >

                                    @if ($errors->has('photo_large_3'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo_large_3') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo_large_4') ? ' has-error' : '' }}">
                                <label for="photo_large_4" class="col-md-4 control-label">图片四(选填)</label>

                                <div class="col-md-6">
                                    <input id="photo_large_4" type="text" class="form-control" name="photo_large_4"
                                           value="{{ $project['photo_large_4'] }}" placeholder="请输入图片四的链接" >

                                    @if ($errors->has('photo_large_4'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo_large_4') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo_large_5') ? ' has-error' : '' }}">
                                <label for="photo_large_5" class="col-md-4 control-label">图片五(选填)</label>

                                <div class="col-md-6">
                                    <input id="photo_large_5" type="text" class="form-control" name="photo_large_5"
                                           value="{{ $project['photo_large_5'] }}" placeholder="请输入图片五的链接" >

                                    @if ($errors->has('photo_large_5'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo_large_5') }}</strong>
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
