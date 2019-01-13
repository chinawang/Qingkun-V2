@extends('layouts.app')

@section('stylesheet')
    <link href="{{ asset('css/common/home.css') }}" rel="stylesheet">
@endsection

@section('subtitle')
    {{--<span>门户</span>--}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">

                <div class="panel panel-default custom-panel">
                    <div class="panel-heading" style="color:#6f7c85;font-size:18px;background-color:#fafafa">
                        <h3 class="panel-title" style="line-height: 30px;margin-left: 10px;">官网信息管理</h3>
                    </div>
                    <div class="panel-body custom-panel-body">
                        <ul class="main-menu">
                            <li class="project">
                                <a href="/project/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/project.png">
                                    <h4>项目管理</h4>
                                </a>
                            </li>
                            <li class="expertise">
                                <a href="/expertise/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/expertise.png">
                                    <h4>专长管理</h4>
                                </a>
                            </li>
                            <li class="job">
                                <a href="/job/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/job.png">
                                    <h4>招聘管理</h4>
                                </a>
                            </li>
                            <li class="employee">
                                <a href="/employee/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/employee.png">
                                    <h4>人员管理</h4>
                                </a>
                            </li>
                            <li class="banner">
                                <a href="/banner/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/banner.png">
                                    <h4>Banner管理</h4>
                                </a>
                            </li>
                            <li class="award">
                                <a href="/award/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/award.png">
                                    <h4>荣誉管理</h4>
                                </a>
                            </li>
                            <li class="news">
                                <a href="/news/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/news.png">
                                    <h4>新闻管理</h4>
                                </a>
                            </li>
                            <li class="type">
                                <a href="/type/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/type.png">
                                    <h4>项目类型管理</h4>
                                </a>
                            </li>
                            <li class="provence">
                                <a href="/provence/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/provence.png">
                                    <h4>地区管理</h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default custom-panel">
                    <div class="panel-heading" style="color:#6f7c85;font-size:18px;background-color:#fafafa">
                        <h3 class="panel-title" style="line-height: 30px;margin-left: 10px;">系统管理</h3>
                    </div>
                    <div class="panel-body custom-panel-body">
                        <ul class="main-menu">
                            <li class="user">
                                <a href="/user/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/user.png">
                                    <h4>账号管理</h4>
                                </a>
                            </li>
                            <li class="role">
                                <a href="/role/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/role.png">
                                    <h4>角色管理</h4>
                                </a>
                            </li>
                            <li href="permission">
                                <a href="/permission/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/permission.png">
                                    <h4>行为权限管理</h4>
                                </a>
                            </li>
                            <li class="log">
                                <a href="/log/lists" class="menu-item">
                                    <img class="menu-icon" src="/img/home/large/log.png">
                                    <h4>系统日志</h4>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
