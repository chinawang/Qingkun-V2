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
                <span>添加项目</span>
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
                        添加项目
                        {{--<a href="/station/lists" class="btn-link">返回</a>--}}
                    </div>
                    <div class="panel-body custom-panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/project/store">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('flag') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">项目类型</label>

                                <div class="col-md-6">
                                    <label class="checkbox-inline">
                                        <input name="flag" type="radio" id="radio1"
                                               value="1"  checked>  规划设计
                                    </label>
                                    <label class="checkbox-inline">
                                        <input name="flag" type="radio" id="radio1"
                                               value="2"  >  建筑设计
                                    </label>

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">项目名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="" placeholder="请输入项目名称" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">建筑类型</label>

                                <div class="col-md-6">
                                    @foreach ($types as $type)
                                        <label class="checkbox-inline">
                                            <input name="types[]" type="checkbox" id="inlineCheckbox{{$type['id']}}"
                                                   value="{{$type['id']}}">{{$type['name']}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('provence') ? ' has-error' : '' }}">
                                <label for="provence" class="col-md-4 control-label">地区(省)</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="select" name="provence" required>
                                        <option value="" selected="selected" style="display: none">选择地区</option>
                                        @foreach ($provences as $provence)
                                            <option value="{{ $provence['id'] }}">{{ $provence['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('provence'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('provence') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{--<div class="col-md-6">--}}
                                    {{--<select class="form-control" id="select" name="provence">--}}
                                        {{--<option value="1">北京</option>--}}
                                        {{--<option value="2">天津</option>--}}
                                        {{--<option value="3">上海</option>--}}
                                        {{--<option value="4">重庆</option>--}}
                                        {{--<option value="5">河北</option>--}}
                                        {{--<option value="6">山西</option>--}}
                                        {{--<option value="7">辽宁</option>--}}
                                        {{--<option value="8">吉林</option>--}}
                                        {{--<option value="9">黑龙江</option>--}}
                                        {{--<option value="10">江苏</option>--}}
                                        {{--<option value="11">浙江</option>--}}
                                        {{--<option value="12">安徽</option>--}}
                                        {{--<option value="13">福建</option>--}}
                                        {{--<option value="14">江西</option>--}}
                                        {{--<option value="15">山东</option>--}}
                                        {{--<option value="16">河南</option>--}}
                                        {{--<option value="17">湖南</option>--}}
                                        {{--<option value="18">湖北</option>--}}
                                        {{--<option value="19">广东</option>--}}
                                        {{--<option value="20">海南</option>--}}
                                        {{--<option value="21">四川</option>--}}
                                        {{--<option value="22">贵州</option>--}}
                                        {{--<option value="23">云南</option>--}}
                                        {{--<option value="24">陕西</option>--}}
                                        {{--<option value="25">甘肃</option>--}}
                                        {{--<option value="26">青海</option>--}}
                                        {{--<option value="27">内蒙古</option>--}}
                                        {{--<option value="28">广西</option>--}}
                                        {{--<option value="29">宁夏</option>--}}
                                        {{--<option value="30">西藏</option>--}}
                                        {{--<option value="31">新疆</option>--}}
                                        {{--<option value="32">香港</option>--}}
                                        {{--<option value="33">澳门</option>--}}
                                        {{--<option value="34">台湾</option>--}}
                                    {{--</select>--}}
                                    {{--@if ($errors->has('	provence'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('	provence') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">地址</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                           value="{{ old('address') }}" placeholder="请输入地址"
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
                                           value="{{ old('stage') }}" placeholder="请输入设计阶段" >

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
                                           value="{{ old('design_time') }}" placeholder="请输入设计时间" >

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
                                           {{--value="{{ old('build_time') }}" placeholder="请输入建成时间" >--}}

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
                                           value="{{ old('land_size') }}" placeholder="请输入总用地面积" >

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
                                           value="{{ old('size') }}" placeholder="请输入总建筑面积" >

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
                                           value="{{ old('abstract') }}" placeholder="请输入简介" >

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
                                           value="{{ old('introduction') }}" placeholder="请输入详细介绍" >
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
                                           value="{{ old('photo_large_1') }}" placeholder="请输入图片一的链接" >

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
                                           value="{{ old('photo_large_2') }}" placeholder="请输入图片二的链接" >

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
                                           value="{{ old('photo_large_3') }}" placeholder="请输入图片三的链接" >

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
                                           value="{{ old('photo_large_4') }}" placeholder="请输入图片四的链接" >

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
                                           value="{{ old('photo_large_5') }}" placeholder="请输入图片五的链接" >

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
