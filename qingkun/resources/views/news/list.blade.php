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
                <span>新闻管理</span>

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
                                新闻列表
                            </div>
                            @if (app('App\Http\Logic\Rbac\RbacLogic')->check(Auth::user()->id, 'employee-add'))
                                <div class="col-md-6 col-btn">
                                    <a href="/news/add" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                        添加新闻</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body custom-panel-body">
                        @if (!empty($posts[0]))
                            <table class="table table-hover table-bordered ">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>摘要</th>
                                    <th>封面图片</th>
                                    <th>时间</th>
                                    <th>正文</th>

                                    @if (app('App\Http\Logic\Rbac\RbacLogic')->check(Auth::user()->id, 'employee-edit'))
                                        <th>操作</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post['id'] }}</td>
                                        <td>{{ $post['name'] }}</td>
                                        <td>
                                            <div class="wrap" title="{{ $post['remark'] }}">
                                                {{ $post['remark'] }}
                                            </div>
                                        </td>
                                        <td>{{ $post['photo'] }}</td>
                                        <td>{{ $post['time'] }}</td>
                                        <td>
                                            <div class="wrap" title="{!! $post['introduction'] !!}">
                                                {{--{{ $post['introduction'] }}--}}
                                                {!! $post['introduction'] !!}
                                            </div>
                                        </td>

                                        @if (app('App\Http\Logic\Rbac\RbacLogic')->check(Auth::user()->id, 'employee-edit'))
                                            <td>
                                                <a href="/news/edit/{{ $post['id'] }}"
                                                   class="btn btn-link">编辑</a>
                                                <a href="#" class="btn btn-link btn-delete-station"
                                                   id="btn-delete-alert-{{ $post['id'] }}">删除</a>
                                                <form role="form" method="POST" style="display: none"
                                                      action="/news/delete/{{ $post['id'] }}">
                                                    {{ csrf_field() }}
                                                    <button type="submit" id="btn-delete-submit-{{ $post['id'] }}">
                                                    </button>
                                                </form>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="table-pagination">
                                {!! $posts->render() !!}
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

    @foreach ($posts as $post)
        <script type="text/javascript">
            $('#btn-delete-alert-{{ $post['id'] }}').on("click", function () {
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
                            $("#btn-delete-submit-{{ $post['id'] }}").click();
                        })
            });
        </script>
    @endforeach

@endsection
