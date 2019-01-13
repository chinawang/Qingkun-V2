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
                <span>项目信息管理</span>

            </h2>
        </div>

    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default custom-panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6 col-title">
                                项目列表
                            </div>
                            @if (app('App\Http\Logic\Rbac\RbacLogic')->check(Auth::user()->id, 'employee-add'))
                                <div class="col-md-6 col-btn">
                                    <a href="/project/add" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        添加项目</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body custom-panel-body">
                        @if (!empty($projects[0]))
                            <table class="table table-hover table-bordered ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>项目类型</th>
                                    <th>项目名称</th>
                                    <th>建筑类型</th>
                                    <th>地区(省)</th>
                                    <th>地址</th>
                                    <th>设计阶段</th>
                                    <th>设计时间</th>
                                    {{--<th>建成时间</th>--}}
                                    <th>总用地面积</th>
                                    <th>总建筑面积</th>
                                    <th>简介</th>
                                    <th>详细介绍</th>

                                    @if (app('App\Http\Logic\Rbac\RbacLogic')->check(Auth::user()->id, 'employee-edit'))
                                        <th>操作</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project['id'] }}</td>
                                        <td>{{$project['flag'] != '1'?'建筑设计':'规划设计'}}</td>
                                        <td>{{ $project['name'] }}</td>
                                        <td>
                                            @if(empty($project['assignTypes']))
                                                暂无
                                            @else
                                                @foreach($project['assignTypes'] as $assignType)
                                                    <span class="label label-default">{{ $assignType['name'] }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $project['provence_name'] }}</td>
                                        <td>{{ $project['address'] }}</td>
                                        <td>{{ $project['stage'] }}</td>
                                        <td>{{ $project['design_time'] }}</td>
                                        {{--<td>{{ $project['build_time'] }}</td>--}}
                                        <td>{{ $project['land_size'] }}</td>
                                        <td>{{ $project['size'] }}</td>
                                        <td>{{ $project['abstract'] }}</td>
                                        <td><div class="wrap" title="{!! $project['introduction'] !!}">
                                                {!! $project['introduction'] !!}
                                            </div></td>

                                        @if (app('App\Http\Logic\Rbac\RbacLogic')->check(Auth::user()->id, 'employee-edit'))
                                            <td>
                                                <a href="/project/edit/{{ $project['id'] }}"
                                                   class="btn btn-link">编辑</a>
                                                <a href="#" class="btn btn-link btn-delete-station"
                                                   id="btn-delete-alert-{{ $project['id'] }}">删除</a>
                                                <form role="form" method="POST" style="display: none"
                                                      action="/project/delete/{{ $project['id'] }}">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="btn-delete-submit-{{ $project['id'] }}">
                                                    </button>
                                                </form>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="table-pagination">
                                {!! $projects->render() !!}
                            </div>
                        @else
                            <div class="well" style="text-align: center; padding: 100px;">
                                暂无内容
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    @foreach ($projects as $project)
        <script type="text/javascript">
            $('#btn-delete-alert-{{ $project['id'] }}').on("click", function () {
                swal({
                            title: "确认删除吗?",
                            text: "删除之后,将无法恢复!",
                            type: "warning",
                            showCancelButton: true,
                            cancelButtonText: "取消",
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "确认删除",
                            closeOnConfirm: false
                        },
                        function () {
                            $("#btn-delete-submit-{{ $project['id'] }}").click();
                        })
            });
        </script>
    @endforeach

@endsection
